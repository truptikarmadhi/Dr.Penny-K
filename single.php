<?php
$master = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
    'tax_query' => [
        [
            'taxonomy' => 'category',
            'field' => 'term_id',
        ],
    ],
]);

$id = get_the_ID();
$excerpt = get_the_excerpt();
$title = get_the_title();
$image = get_the_post_thumbnail_url($id, 'thumbnail');
$categories = get_the_terms($id, 'category');
$date = get_the_date('d.m.Y', $id);

if (have_rows('news_post', $id)) {
    while (have_rows('news_post', $id)) {
        the_row();
        $post_time = get_sub_field("post_time");
        $description = get_sub_field("description");
        $two_image_section = get_sub_field("two_image_section");
        $content = get_sub_field("content");
        $buttons = get_sub_field("buttons");
        $articles = get_sub_field("articles");
    }
}
?>

<section class="resources-open-section">
    <div class="container">
        <div class="row">
            <div class="col-3 d-flex flex-column justify-content-between">
                <div class="position-sticky top-0 left-content d-flex flex-column justify-content-between dpt-190">
                    <div class="">
                        <a class="tk-articulat-cf fw-normal font14 space-0_14 leading22 text-050505 text-decoration-none"
                            href="">Back to all</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php if (!empty($articles)): ?>
                            <div class="article-img radius5 overflow-hidden me-3">
                                <img class="w-100 h-100 object-cover" src="<?php echo $articles['article_image']['url']; ?>"
                                    alt="Article Image">
                            </div>
                            <div class="d-flex flex-column">
                                <div class="tk-articulat-cf fw-normal font16 space-0_16 text-4A4A4A leading22">
                                    Article by
                                </div>
                                <div class="tk-articulat-cf fw-normal font18 space-0_16 text-050505 leading22">
                                    <?php echo $articles['article_name']; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-8 dpt-190">
                <div class="d-flex dmb-30">
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
                <?php if (!empty($title)): ?>
                    <div class="tk-articulat-cf font54 leading60 fw-light text-black dmb-35 pe-4">
                        <?php echo $title; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($excerpt)): ?>
                    <div class="tk-articulat-cf font22 leading30 space-0_22 fw-normal text-050505 dmb-30">
                        <?php echo $excerpt; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($image)): ?>
                    <div class="resources-open-img radius10 overflow-hidden dmb-60">
                        <img class="w-100 h-100 object-cover" src="<?php echo $image; ?>" alt="">
                    </div>
                <?php endif; ?>
                <?php if (!empty($description)): ?>
                    <div class="resource-description tk-articulat-cf font22 leading30 space-0_22 fw-normal text-050505 dmb-70">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
                <div class="row row8 dmb-65">
                    <?php if (!empty($two_image_section)):
                        foreach ($two_image_section as $img):
                            $images = $img['images'];
                    ?>
                            <div class="col-6 two-img">
                                <img src="<?php echo $images['url']; ?>" alt="Two-images" class="w-100 h-100 object-cover radius5">
                            </div>
                    <?php endforeach;
                    endif; ?>
                </div>
                <?php if (!empty($content)): ?>
                    <div class="resource-content tk-articulat-cf font22 leading30 space-0_22 fw-normal text-050505 dmb-40 pe-5">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($buttons)): ?>
                    <a href="<?php echo $buttons['url']; ?>"
                        class="text-decoration-none btnA bg-212121-btn tk-articulat-cf fw-normal font20 leading22 radius5 d-inline-flex align-items-center justify-content-center transition">
                        <?php echo $buttons['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div class="sapcing dmb-265"></div>

<?php include 'templates/page-builder.php'; ?>