<?php

/* Template Name: Page Builder */

?>

<?php if (have_rows("flexible_content")):
    while (have_rows("flexible_content")):
        the_row();
        if (get_row_layout() == 'center_content_section'):
            $content = get_sub_field('content');
?>
            <section class="center-content-section bg-FAFAFA">
                <div class="container">
                    <div class="col-8 mx-auto">
                        <div class="tk-articulat-cf font64 leading70 fw-light text-212121 text-center">
                            <?php echo $content; ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'left_right_section'):
            $section_id = get_sub_field('section_id');
            $left_right_selection = get_sub_field('left_right_selection');
            $images = get_sub_field('images');
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button_1 = get_sub_field('button_1');
            $button_2 = get_sub_field('button_2');
        ?>
            <section id="<?php echo $section_id; ?>" class="left-right-section bg-FAFAFA">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if ($left_right_selection == 'Left'): ?>
                            <div class="col-lg-6 pe-lg-2">
                                <?php if (!empty($images)): ?>
                                    <div class="left-right-img radius20 overflow-hidden">
                                        <img src="<?php echo $images['sizes']['medium'] ?>" alt="<?php echo $images['title'] ?>"
                                            class="w-100 h-100 object-cover">
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-6">
                            <div class="col-10 <?php echo $left_right_selection == 'Left' ? 'pe-4 ms-auto' : '' ?>">
                                <?php if (!empty($heading)): ?>
                                    <div class="tk-articulat-cf font26 leading34 fw-normal text-212121 dmb-30">
                                        <?php echo $heading; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($description)): ?>
                                    <div class="tk-articulat-cf font18 leading28 fw-normal text-212121 dmb-30">
                                        <?php echo $description; ?>
                                    </div>
                                <?php endif; ?>
                                <div class="d-flex align-items-center">
                                    <?php if (!empty($button_1)): ?>
                                        <a href="<?php echo $button_1['url']; ?>" data-bs-toggle="offcanvas" role="button" aria-controls="aboutOffcanvas" class="text-decoration-none btnA bg-212121-btn tk-articulat-cf fw-normal font20 leading22 radius5 d-inline-flex align-items-center justify-content-center transition me-5">
                                            <?php echo $button_1['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if (!empty($button_2)): ?>
                                        <a href="<?php echo $button_2['url']; ?>" class="text-decoration-none btnB tk-articulat-cf fw-normal font20 leading22 radius5 text-212121 d-inline-flex align-items-center justify-content-center transition me-5">
                                            <?php echo $button_2['title']; ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php if ($left_right_selection == 'Right'): ?>
                            <div class="col-lg-6 ps-lg-2">
                                <?php if (!empty($images)): ?>
                                    <div class="left-right-img radius20 overflow-hidden">
                                        <img src="<?php echo $images['sizes']['medium'] ?>" alt="<?php echo $images['title'] ?>"
                                            class="w-100 h-100 object-cover">
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'left_right_modal'):
            $heading = get_sub_field('heading');
            $description = get_sub_field('description');
            $button = get_sub_field('button');
        ?>
            <div class="offcanvas about-offcanvas offcanvas-end" tabindex="-1" id="aboutOffcanvas" aria-labelledby="aboutOffcanvasLabel">
                <div class="offcanvas-body">
                    <button type="button" class="close-btn bg-transparent border-0 p-0" data-bs-dismiss="offcanvas" aria-label="Close">
                        <img src="" alt="">
                    </button>
                    <?php if (!empty($heading)): ?>
                        <div class="tk-articulat-cf font30 leading34 fw-normal text-212121 dmb-40">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($description)): ?>
                        <div class="tk-articulat-cf font18 leading28 fw-normal text-black dmb-25">
                            <?php echo $description; ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty($button)): ?>
                        <a href="<?php echo $button['url']; ?>" data-bs-toggle="offcanvas" role="button" aria-controls="aboutOffcanvas" class="text-decoration-none btnA bg-212121-btn tk-articulat-cf fw-normal font20 leading22 radius5 d-inline-flex align-items-center justify-content-center transition me-5">
                            <?php echo $button['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

        <?php elseif (get_row_layout() == 'brand_slider_section'):
            $brand_logos = get_sub_field('brand_logos');
        ?>
            <section class="brand-slider-section bg-FAFAFA position-relative overflow-hidden">
                <div class="container">
                    <div class="brand-slider col-10 mx-auto">
                        <?php if (!empty($brand_logos)):
                            foreach ($brand_logos as $logo):
                                $brand_logo = $logo['brand_logo']; ?>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="brand-logo">
                                        <img src="<?php echo  $brand_logo['url']; ?>" alt="" class="w-100 h-100">
                                    </div>
                                </div>
                        <?php endforeach;
                        endif; ?>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'service_section'):
            $section_id = get_sub_field('section_id');
            $main_title = get_sub_field('main_title');
        ?>
            <section id="<?php echo $section_id; ?>" class="sevice-section">
                <div class="container">
                    <div class="row">
                        <div class="col-3">
                            <div class="service-menus position-sticky top-0 w-100 h-vh dpt-150">
                                <?php if (!empty($main_title)): ?>
                                    <div class="tk-articulat-cf font26 leading34 fw-normal text-212121 dmb-30">
                                        <?php echo $main_title; ?>
                                    </div>
                                <?php endif; ?>
                                <ul id="serviceMenuList" class="list-none mb-0 ps-0">

                                </ul>

                                <script id="service-list-template" type="text/x-handlebars-template">
                                    {{#each posts}}
                                        <li class="dmb-15">
                                            <a href="#{{id}}" class="text-decoration-none tk-articulat-cf font18 leading28 fw-normal text-212121">{{{title}}}</a>
                                        </li>
                                    {{/each}}
                                </script>
                            </div>
                        </div>
                        <div class="col-9 ps-5 dpt-150">
                            <div class="service-cards col-12 ps-2">
                                <div class="service-container" id="serviceContainer">

                                </div>

                                <script id="service-template" type="text/x-handlebars-template">
                                    {{#each posts}}
                                        <div class="service-card bg-white radius20 dmb-30" id="{{id}}">
                                            <div class="d-flex align-items-center">
                                                <div class="col-6 pe-5">
                                                    <div class="service-img radius20 overflow-hidden">
                                                        <img src="{{image}}" alt="" class="w-100 h-100 object-cover">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="tk-articulat-cf font26 leading34 fw-normal text-212121 dmb-35">
                                                        {{{title}}}
                                                    </div>
                                                    <div class="tk-articulat-cf font18 leading28 fw-normal text-212121 dmb-45">
                                                        {{{content}}}
                                                    </div>
                                                    <a href="{{button_url}}" class="text-decoration-none btnA bg-212121-btn tk-articulat-cf fw-normal font20 leading22 radius5 d-inline-flex align-items-center justify-content-center transition">
                                                        {{button_title}}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    {{/each}}
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'news_slider_section'):
            $main_title = get_sub_field('main_title');
            $buttons = get_sub_field('buttons');
            $card_or_slider = get_sub_field('card_or_slider');
            $news_post = get_sub_field('news_post');
        ?>
            <section class="resources-section">
                <div class="container">
                    <div class="d-flex align-items-end justify-content-between <?php echo $card_or_slider == "Slider" ? 'dmb-35' : 'dmb-10' ?> ">
                        <?php if (!empty($main_title)): ?>
                            <div class="col-6 tk-articulat-cf font64 leading70 fw-light text-212121">
                                <?php echo $main_title; ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($buttons)): ?>
                            <a href="<?php echo $buttons['url']; ?>" class="text-decoration-none btnA bg-212121-btn tk-articulat-cf fw-normal font20 leading22 radius5 d-inline-flex align-items-center justify-content-center transition">
                                <?php echo $buttons['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if (!empty($card_or_slider) && $card_or_slider == "Slider"): ?>
                        <div class="resource-slider">
                            <?php if ($news_post):
                                foreach ($news_post as $post):
                                    setup_postdata($post);
                                    $post_id = get_the_ID();
                                    $post_title = get_the_title($post_id);
                                    $post_excerpt = get_the_excerpt($post_id);
                                    $post_permalink = get_permalink($post_id);
                                    $post_thumbnail = get_the_post_thumbnail_url($post_id, 'thumbnail');
                                    $categories = get_the_category($post_id);

                                    if (have_rows('news_post', $post_id)) {
                                        while (have_rows('news_post', $post_id)) {
                                            the_row();
                                            $post_time = get_sub_field("post_time");
                                        }
                                    }
                            ?>
                                    <div class="resource-cards">
                                        <a href="<?php echo $post_permalink; ?>" class="resource-card text-decoration-none">
                                            <div class="resource-img radius15 overflow-hidden dmb-25">
                                                <img src="<?php echo $post_thumbnail; ?>" alt="" class="w-100 h-100 object-cover">
                                            </div>
                                            <div class="d-flex dmb-20">
                                                <?php if (!empty($categories)):
                                                    foreach ($categories as $cate):
                                                ?>
                                                        <div
                                                            class="prefix tk-articulat-cf fw-medium text-black font14 space-0_14 leading14 px-3 py-2 radius5 me-2">
                                                            <?php echo $cate->name; ?>
                                                        </div>
                                                <?php endforeach;
                                                endif; ?>
                                                <?php if (!empty($post_time)): ?>
                                                    <div
                                                        class="tk-articulat-cf border-707070 fw-medium text-black font14 space-0_14 leading14 px-3 py-2 radius5">
                                                        <?php echo $post_time; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <?php if (!empty($post_title)): ?>
                                                <div class="tk-articulat-cf font22 space-0_22 leading30 fw-medium text-black pe-4">
                                                    <?php echo $post_title; ?>
                                                </div>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                            <?php endforeach;
                                wp_reset_postdata();
                            endif; ?>
                        </div>
                    <?php else:
                        $main_title = get_sub_field('main_title');
                        $args = array(
                            'taxonomy' => 'category',
                            'orderby' => 'name',
                            'order' => 'DESC',
                            'hide_empty' => 1,
                        );
                        $cats = get_categories($args); ?>
                        <div class="filter-button-wrapper dmb-50">
                            <button
                                class="filter-button blog-filter-button bg-transparent roboto-medium fw-medium font14 space-0_14 leading16 px-3 py-2 radius5 text-black border-707070 transition me-2 active"
                                data-tag="all">View
                                all</button>
                            <?php if (!empty($cats)):
                                foreach ($cats as $cat): ?>
                                    <button
                                        class="filter-button blog-filter-button bg-transparent roboto-medium fw-medium font14 space-0_14 leading16 px-3 py-2 radius5 text-black border-707070 transition me-2"
                                        data-tag="<?php echo $cat->slug; ?>"> <?php echo $cat->name; ?></button>
                            <?php endforeach;
                            endif; ?>
                        </div>

                        <div class="row row8 px-p-p posts-container" id="postsContainer">
                        </div>

                        <script id="post-template" type="text/x-handlebars-template">
                            {{#each posts}}
                                <div class="col-4 resource-cards dmb-130">
                                    <a href="{{link}}" class="resource-card text-decoration-none">
                                        <div class="resource-img radius15 overflow-hidden dmb-25">
                                            <img src="{{thumbnail}}" alt="" class="w-100 h-100 object-cover">
                                        </div>
                                        <div class="d-flex dmb-20">
                                            {{#each categories}}
                                                <div
                                                    class="prefix tk-articulat-cf fw-medium text-black font14 space-0_14 leading14 px-3 py-2 radius5 me-2">
                                                    {{name}}
                                                </div>
                                            {{/each}}
                                            <div
                                                class="tk-articulat-cf border-707070 fw-medium text-black font14 space-0_14 leading14 px-3 py-2 radius5">
                                                {{posttime}}
                                            </div>
                                        </div>
                                        <div class="tk-articulat-cf font22 space-0_22 leading30 fw-medium text-black pe-4">
                                            {{title}}
                                        </div>
                                    </a>
                                </div>
                            {{/each}}
                        </script>

                        <div class="d-flex justify-content-center">
                            <button id="loadMoreButton"
                                class="text-decoration-none btnA bg-212121-btn tk-articulat-cf fw-normal font20 leading22 radius5 align-items-center justify-content-center transition">
                                Load More +
                            </button>
                        </div>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'contact_form_section'):
            $main_title = get_sub_field('main_title');
            $mail = get_sub_field('mail');
            $contact = get_sub_field('contact');
            $social_medias = get_sub_field('social_medias');
            $contact_form_title = get_sub_field('contact_form_title');
        ?>
            <section class="contact-section">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-4">
                            <?php if (!empty($main_title)): ?>
                                <div class="tk-articulat-cf fw-light font64 leading70 text-black dmb-20">
                                    <?php echo $main_title; ?>
                                </div>
                            <?php endif; ?>
                            <div class="dmb-20">
                                <?php if (!empty($mail)): ?>
                                    <a class="tk-articulat-cf fw-normal font28 space-0_56 leading34 text-black text-decoration-none" href="mailto:<?php echo $mail; ?>">
                                        <?php echo $mail; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="dmb-20">
                                <?php if (!empty($contact)): ?>
                                    <a class="tk-articulat-cf fw-normal font28 space-0_56 leading34 text-black text-decoration-none" href="tel:<?php echo $contact; ?>">
                                        <?php echo $contact; ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="social-icon-content d-flex">
                                <?php if (!empty($social_medias)):
                                    foreach ($social_medias as $social):
                                        $social_icon = $social['social_icon'];
                                        $social_link = $social['social_link'];
                                ?>
                                        <a href="<?php echo $social_link; ?>" class="social-icons radius5 d-flex justify-content-center align-items-center me-2">
                                            <div class="d-flex align-items-center" href="">
                                                <img class="" src=" <?php echo $social_icon['url']; ?>" alt="">
                                            </div>
                                        </a>
                                <?php endforeach;
                                endif; ?>

                            </div>
                        </div>
                        <div class="col-8 ps-5">
                            <?php if (!empty($contact_form_title)): ?>
                                <div class="tk-articulat-cf fw-regular font28 space-0_56 leading34 text-black text-center dmb-25">
                                    <?php echo $contact_form_title; ?>
                                </div>
                            <?php endif; ?>
                            <?php echo do_shortcode('[contact-form-7 id="841ac77" title="Contact Form"]'); ?>
                        </div>
                    </div>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'privacy_section'):
            $privacy_content = get_sub_field('privacy_content');
        ?>
            <section class="privacy-section">
                <div class="container">
                    <div class="row">
                        <div class="col-3 left-content d-flex flex-column">
                            <ul class="list-none privacy-links position-sticky ps-0 dmb-0" id="privacy-links">
                                <?php if (!empty($privacy_content)):
                                    foreach ($privacy_content as $menu):
                                        $privacy_id = $menu['id'];
                                        $heading = $menu['heading'];
                                ?>
                                        <li class="dmb-25 transition">
                                            <a class="tk-articulat-cf fw-medium font14 space-0_14 leading14 text-212121 border-707070 px-4 py-2 text-decoration-none radius5 transition"
                                                href="#<?php echo $privacy_id; ?>"><?php echo $heading; ?></a>
                                        </li>
                                <?php endforeach;
                                endif; ?>
                            </ul>
                        </div>
                        <div class="col-7">
                            <?php if (!empty($privacy_content)):
                                foreach ($privacy_content as $menu):
                                    $privacy_id = $menu['id'];
                                    $description = $menu['description'];
                            ?>
                                    <div class="single-content dpt-150" id="<?php echo $privacy_id; ?>">
                                        <?php if (!empty($description)): ?>
                                            <?php echo $description; ?>
                                        <?php endif; ?>
                                    </div>
                            <?php endforeach;
                            endif; ?>
                        </div>
                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'spacing'):
            $background_color = get_sub_field('background_color');
            $desktop = get_sub_field('desktop');
            $tablet = get_sub_field('tablet');
            $mobile = get_sub_field('mobile');
            $desktop_mb = $desktop['margin_bottom'];
            $desktop_mb_main = !empty($desktop['margin_bottom']) ? " dpb-" : "";
            $tablet_mb = $tablet['margin_bottom'];
            $tablet_mb_main = !empty($tablet['margin_bottom']) ? " tpb-" : "";
            $mobile_mb = $mobile['margin_bottom'];
            $mobile_mb_main = !empty($mobile['margin_bottom']) ? " mpb-" : "";
        ?>
            <div class="position-relative z-3 spacing<?php
                                                        echo $desktop_mb_main;
                                                        echo $desktop_mb;
                                                        echo $tablet_mb_main;
                                                        echo $tablet_mb;
                                                        echo $mobile_mb_main;
                                                        echo $mobile_mb;
                                                        ?> <?php echo $background_color == "White" ? 'bg-FAFAFA' : '' ?> "></div>
<?php endif;
    endwhile;
endif; ?>