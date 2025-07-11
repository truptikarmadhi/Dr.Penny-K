<?php
$footer_mail = get_field('footer_mail', 'options');
$footer_button = get_field('footer_button', 'options');
$footer_copyright = get_field('footer_copyright', 'options');
$footer_menus = get_field('footer_menus', 'options');
$footer_socials = get_field('footer_socials', 'options');
?>

<footer class="footer dpt-55 dpb-30">
    <div class="container">
        <div class="d-flex flex-column align-items-center dmb-105">
            <?php if (!empty($footer_mail)): ?>
                <a class="tk-articulat-cf fw-light font64 leading70 text-center text-black text-decoration-none dmb-20"
                    href="mailto:<?php echo $footer_mail; ?>">
                    <?php echo $footer_mail; ?>
                </a>
            <?php endif; ?>
            <?php if (!empty($footer_button)): ?>
                <a class="btnA bg-212121-btn arrow-btn radius5 d-inline-flex justify-content-center align-items-center tk-articulat-cf fw-normal font20 leading22 text-decoration-none transition"
                    href="<?php echo $footer_button['url']; ?>">
                    <span>
                        <?php echo $footer_button['title']; ?>
                    </span>
                    <div class="arrow-icon ms-2">
                        <img class="w-100 transition" src="<?php echo get_template_directory_uri(); ?>/templates/icons/white-arrow.svg" alt="white-arrow">
                    </div>
                </a>
            <?php endif; ?>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="">
                <?php if (!empty($footer_copyright)): ?>
                    <div class="tk-articulat-cf fw-normal font14 space-0_14 leading20">
                        <?php echo $footer_copyright; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="d-flex align-items-center">
                <ul class="list-none mb-0 ps-0">
                    <?php if (!empty($footer_menus)):
                        foreach ($footer_menus as $menu):
                            $footer_menu = $menu['footer_menu'];
                    ?>
                            <li class="me-4">
                                <a class="tk-articulat-cf font14 leading20 text-black text-decoration-none" href="<?php echo $footer_menu['url']; ?>"> <?php echo $footer_menu['title']; ?></a>
                            </li>
                    <?php endforeach;
                    endif; ?>
                </ul>
                <div class="social-icon-content d-flex">
                    <?php if (!empty($footer_socials)):
                        foreach ($footer_socials as $social):
                            $social_icons = $social['social_icons'];
                            $social_links = $social['social_links'];
                    ?>
                            <a href="<?php echo $social_links; ?>" class="social-icons radius5 d-flex justify-content-center align-items-center me-2">
                                <div class="d-flex align-items-center">
                                    <img class="" src="<?php echo $social_icons['url']; ?>" alt="">
                                </div>
                            </a>
                    <?php endforeach;
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>