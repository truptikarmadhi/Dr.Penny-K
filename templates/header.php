<?php
$header_logo = get_field('header_logo', 'options');
$menu_items = get_field('menu_items', 'options');
$header_button = get_field('header_button', 'options');
?>

<header class="header position-fixed dpt-45 dpb-45 top-0 w-100 transition">
    <div class="container">
        <div class="row">
            <div class="col-3 brand-logo">
                <a href="">
                    <img src="<?php echo $header_logo; ?>" alt="">
                </a>
            </div>
            <div class="col-9 d-flex justify-content-between align-items-center">
                <div class="col-9 d-flex justify-content-end align-items-center">
                    <nav class="d-flex justify-content-end align-items-center">
                        <ul class="list-none d-flex mb-0 ps-0">
                            <?php if (!empty($menu_items)):
                                foreach ($menu_items as $menus):
                                    $menu_item = $menus['menu_item'];
                            ?>
                                    <li class="me-5">
                                        <a class="tk-articulat-cf fw-normal font20 leading20 text-212121 text-capitalize text-decoration-none"
                                            href="<?php echo $menu_item['url']; ?>"><?php echo $menu_item['title']; ?></a>
                                    </li>
                            <?php endforeach;
                            endif; ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-3 d-flex justify-content-end">
                    <?php if (!empty($header_button)): ?>
                        <a class="btnA bg-212121-btn arrow-btn radius5 d-inline-flex justify-content-center align-items-center tk-articulat-cf fw-normal font20 leading22 text-decoration-none transition"
                            href="<?php echo $header_button['url']; ?>">
                            <span>
                                <?php echo $header_button['title']; ?>
                            </span>
                            <div class="arrow-icon ms-2">
                                <img class="w-100 transition" src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-arrow.svg" alt="white-arrow">
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>