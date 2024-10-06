<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_footer(); ?>

<footer class="site-footer">
<div class="footer-content">
    <h2><?php echo esc_html(get_theme_mod('site_name', 'My Website')); ?></h2>
    <nav class="footer-menu">
        <?php
            // Выводим меню, выбранное в админке
            wp_nav_menu(array(
                'theme_location' => 'footer_menu', // Указание на зарегистрированное меню
                'container' => false, // Убирает контейнер
                'menu_class' => 'footer-menu-list', // Класс для ul меню
            ));
        ?>
    </nav>
    <p><?php echo esc_html(get_theme_mod('footer_text', 'All rights reserved')); ?></p>
</div>
</footer>

</body>
</html>
