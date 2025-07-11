<?php
$curious_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php'  // Theme wrapper class
];

foreach ($curious_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');

if (function_exists('acf_add_options_page')) {

  acf_add_options_page(
    array(
      'page_title' => 'Header',
      'menu_title' => 'Header',
      'menu_slug' => 'header-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Footer',
      'menu_title' => 'Footer',
      'menu_slug' => 'footer-options',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
  acf_add_options_page(
    array(
      'page_title' => 'Theme setting',
      'menu_title' => 'Theme setting',
      'menu_slug' => 'theme-setting',
      'capability' => 'edit_posts',
      'redirect' => false
    )
  );
}


// Service Custom Post Type Start
add_action('init', 'Services_custom_post_type');
function Services_custom_post_type()
{
  register_post_type(
    'service',
    array(
      'labels' => array(
        'name' => __("Services", 'textdomain'),
        'singular_name' => __("Service", 'textdomain'),
        'add_new' => __("Add Service"),
        'add_new_item' => __("Add Service"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'service', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
      'menu_icon' => 'dashicons-hammer', // Match icon for Services
    )
  );
}
// Service Custom Post Type End
// 

add_action('init', 'testimonials');
function testimonials()
{
  register_post_type(
    'testimonial',
    array(
      'labels' => array(
        'name' => __("Testimonials", 'textdomain'),
        'singular_name' => __("Testimonials", 'textdomain'),
        'add_new' => __("Add testimonial"),
        'add_new_item' => __("Add testimonial"),
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'testimonial', 'with_front' => false),
      'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
    )
  );
}


function enqueue_custom_scripts()
{
  wp_enqueue_script('jquery');
  wp_enqueue_script('custom-ajax', get_template_directory_uri('/resources/assets/scripts/parts/handlebar.js'), ['jquery'], '1.0', true);

  wp_localize_script('custom-ajax', 'ajax_params', [
    'ajax_url' => admin_url('admin-ajax.php'),
  ]);
}

add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


function load_service()
{
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;

  $args = [
    'post_type'      => 'service',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];


  $query = new WP_Query($args);
  $service = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $service_id = get_the_ID();

      if (have_rows('service_post', $service_id)) {
        while (have_rows('service_post', $service_id)) {
          the_row();
          $service_button = get_sub_field("service_button"); // Assuming "location" is a subfield
        }
      }

      $service[] = [
        'title'        => get_the_title(),
        'content' => get_the_content(),
        'image'        => get_the_post_thumbnail_url($service_id, 'gallery thumb'),
        'button_url'      =>  $service_button['url'],
        'button_title'      =>  $service_button['title'],
      ];
    }
    wp_reset_postdata();
  }

  wp_send_json_success(['posts' => $service]);
}
add_action('wp_ajax_load_service', 'load_service');
add_action('wp_ajax_nopriv_load_service', 'load_service');



function load_posts()
{
  $category = isset($_POST['category']) ? sanitize_text_field($_POST['category']) : 'all';
  $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
  $posts_per_page = isset($_POST['posts_per_page']) ? intval($_POST['posts_per_page']) : 6;

  $args = [
    'post_type'      => 'post',
    'posts_per_page' => $posts_per_page,
    'paged'          => $paged,
    'orderby'        => 'date',
    'order'          => 'DESC',
  ];

  if ($category !== 'all') {
    $args['tax_query'] = [
      [
        'taxonomy' => 'category',
        'field'    => 'slug',
        'terms'    => $category,
      ],
    ];
  }

  $query = new WP_Query($args);
  $posts = [];

  if ($query->have_posts()) {
    while ($query->have_posts()) {
      $query->the_post();
      $id = get_the_ID();
      $categories = get_the_terms($id, 'category');
      $category_data = [];
      if (!empty($categories) && !is_wp_error($categories)) {
        foreach ($categories as $category) {
          $category_data[] = [
            'name' => $category->name,
            'slug' => $category->slug,
          ];
        }
      }

      if (have_rows('news_post', $id)) {
        while (have_rows('news_post', $id)) {
          the_row();
          $post_time = get_sub_field("post_time"); // Assuming "location" is a subfield
        }
      }

      $posts[] = [
        'title'      => get_the_title(),
        'content'    => get_the_content(),
        'link'       => get_permalink($id),
        'thumbnail'  => get_the_post_thumbnail_url($id, 'thumbnail'),
        'categories' => $category_data,
        'posttime' => $post_time,
      ];
    }
    wp_reset_postdata();
  }
  wp_send_json_success(['posts' => $posts]);
}

add_action('wp_ajax_load_posts', 'load_posts');
add_action('wp_ajax_nopriv_load_posts', 'load_posts');




add_filter('wpcf7_autop_or_not', '__return_false');

add_image_size('gallery-thumb', 400, 0, true);
add_image_size('medium', 1200, 0, true);
add_image_size('fullscreen', 2700, 0, true);
