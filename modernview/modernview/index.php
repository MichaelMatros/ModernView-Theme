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
    <?php wp_body_open(); ?>
    <?php get_header(); ?>

<!-- main content -->
    <div class="blocks-container">
        <?php
        $number_of_blocks = get_theme_mod('number_of_blocks', '3');

        for ($i = 1; $i <= $number_of_blocks; $i++) {
            $image = get_theme_mod("block{$i}_image");
            $header = get_theme_mod("block{$i}_header");
            $text = get_theme_mod("block{$i}_text");

            if ($image || $header || $text) { // Вывод блока только если есть содержимое
                ?>
                <div class="block">
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($header); ?>">
                    <?php endif; ?>
                    <?php if ($header): ?>
                        <h3><?php echo esc_html($header); ?></h3>
                    <?php endif; ?>
                    <?php if ($text): ?>
                        <p><?php echo esc_html($text); ?></p>
                    <?php endif; ?>
                </div>
                <?php
            }
        }
        ?>
    </div>



<!-- team block -->

<section class="team-section">
    <div class="team-container">
        <!-- Текст о команде -->
        <div class="team-text">
            <h2><?php echo esc_html(get_theme_mod('team_section_title', __('Our Team', 'modernview'))); ?></h2>


        </div>

        <!-- Изображения команды в виде кругов -->
        <div class="team-members" style="display: flex; align-items: center;">
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <div class="team-member" style="display: flex; align-items: center;">
                <img src="<?php echo esc_url(get_theme_mod('team_member_image_' . $i, 'path-to-default-image.jpg')); ?>" alt="<?php echo esc_attr(get_theme_mod('team_member_name_' . $i, '')); ?>">
                </div>
            <?php endfor; ?>
        </div>

        <p class='tt2'><?php echo esc_html(get_theme_mod('team_section_description', __('Meet our team of experts', 'modernview'))); ?></p>

    </div>
</section>

<div id="main-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . __('Pages:', 'modernview'),
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
            ));
            ?>
        </div>
    <?php endwhile; endif; ?>
</div>

<section class="contact-team-section">
    <div class="contact-team-container">
        <div class="contact-image">
            <?php
                $image = get_theme_mod('contact_image');
                if ($image) {
                    echo '<img src="' . esc_url($image) . '" alt="Contact Team Image">';
                }
            ?>
        </div>
        <div class="contact-details">
            <h2><?php echo esc_html(get_theme_mod('contact_header')); ?></h2>
            <p><?php echo esc_html(get_theme_mod('contact_text')); ?></p>
            <a class="conbut" href="<?php echo esc_url(get_theme_mod('contact_button_link')); ?>" class="contact-button">
                <?php echo esc_html(get_theme_mod('contact_button_text')); ?>
            </a>
        </div>
    </div>
</section>
<!-- footer -->
<?php get_footer(); ?>
</body>
</html>
