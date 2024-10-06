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
    <header>

        <!-- top menu -->
        <div class="header-container">
            <div class="logo">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo(); // Выводим логотип
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>'; // Если логотипа нет, выводим название сайта
                }
                ?>
            </div>

            <div class="menu-toggle">
                <input type="checkbox" id="menu-toggle-checkbox" />
                <label for="menu-toggle-checkbox">&#9776;</label>
            </div>

        <nav class="main-menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'header-menu',
                'container' => 'div',
                'container_class' => 'menu-container',
                'menu_class' => 'menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ));
            ?>
        </nav>

        <div class="header-button">
            <a href="<?php echo esc_url(get_theme_mod('button_url', '#')); ?>" class="button">
                <?php echo esc_html(get_theme_mod('button_text', 'Click Me')); ?>
            </a>
        </div>
        </div>




    <!-- main content -->
    <div class='header-content' style='width: <?php echo esc_attr(get_theme_mod('mytheme_header_width', '80%')); ?>;'>
            <div class="text-center">
                <h1 class='main-text'><?php echo esc_html(get_theme_mod('mytheme_header_text', 'Main Text')); ?></h1>
                <h2 class='sub-header' style='width: <?php echo esc_attr(get_theme_mod('mytheme_subheader_width', '60%')); ?>;'>
                    <?php echo esc_html(get_theme_mod('mytheme_subheader_text', 'Sub Header')); ?>
                </h2>
                <div class="header-button">
                    <a href="<?php echo esc_url(get_theme_mod('next_button_url', '#')); ?>" class="button">
                        <?php echo esc_html(get_theme_mod('next_button_text', 'Click Me')); ?>
                    </a>
                </div>
            </div>
        </div>
    </header>


</body>
</html>
