<?php
// Подключение стилей и скриптов
function my_custom_theme_enqueue_styles() {
    add_theme_support('automatic-feed-links');
    wp_enqueue_style('main-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'my_custom_theme_enqueue_styles');





// Поддержка темы
function my_custom_theme_setup() {

    // Регистрация меню
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'modernview')
    ));

    // Поддержка миниатюр изображений
    add_theme_support('post-thumbnails');

    // Поддержка заголовков
    add_theme_support('title-tag');

    // Поддержка логотипа
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'my_custom_theme_setup');



function mytheme_customize_register($wp_customize) {
    // Добавляем секцию в кастомайзер
    $wp_customize->add_section('mytheme_header_section', array(
        'title' => __('Header Settings', 'modernview'),
        'priority' => 30,
    ));

    // Настройка для заголовка H1
    $wp_customize->add_setting('mytheme_header_text', array(
        'default' => 'Main Text',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mytheme_header_text_control', array(
        'label' => __('Header Text (H1)', 'modernview'),
        'section' => 'mytheme_header_section',
        'settings' => 'mytheme_header_text',
        'type' => 'text',
    ));

    // Настройка для ширины контейнера H1
    $wp_customize->add_setting('mytheme_header_width', array(
        'default' => '80%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mytheme_header_width_control', array(
        'label' => __('Header Width (H1) (e.g., 50%, 800px)', 'modernview'),
        'section' => 'mytheme_header_section',
        'settings' => 'mytheme_header_width',
        'type' => 'text',
    ));

    // Настройка для заголовка H2
    $wp_customize->add_setting('mytheme_subheader_text', array(
        'default' => 'Sub Header',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mytheme_subheader_text_control', array(
        'label' => __('Sub Header Text (H2)', 'modernview'),
        'section' => 'mytheme_header_section',
        'settings' => 'mytheme_subheader_text',
        'type' => 'text',
    ));

    // Настройка для ширины H2
    $wp_customize->add_setting('mytheme_subheader_width', array(
        'default' => '60%',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('mytheme_subheader_width_control', array(
        'label' => __('Sub Header Width (H2) (e.g., 50%, 600px)', 'modernview'),
        'section' => 'mytheme_header_section',
        'settings' => 'mytheme_subheader_width',
        'type' => 'text',
    ));

    $wp_customize->add_section('button_section', array(
        'title'    => __('Buttons Settings', 'modernview'),
        'priority' => 30,
    ));

    // Добавляем настройку для URL кнопки
    $wp_customize->add_setting('button_url', array(
        'default'   => '#',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control('button_url', array(
        'label'    => __('Menu button URL', 'modernview'),
        'section'  => 'button_section',
        'settings' => 'button_url',
        'type'     => 'url',
    ));
    // Добавляем настройку для текста кнопки
    $wp_customize->add_setting('button_text', array(
        'default'   => 'Click Me',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('button_text', array(
        'label'    => __('Menu button text', 'modernview'),
        'section'  => 'button_section',
        'settings' => 'button_text',
        'type'     => 'text',
        'sanitize_callback' => 'sanitize_text_field',
    ));


//header button
$wp_customize->add_setting('next_button_url', array(
    'default'   => '#',
    'transport' => 'refresh',
    'sanitize_callback' => 'esc_url',
));

$wp_customize->add_control('next_button_url', array(
    'label'    => __('Header button url', 'modernview'),
    'section'  => 'button_section',
    'settings' => 'next_button_url',
    'type'     => 'url',
    'sanitize_callback' => 'esc_url',
));

// Добавляем настройку для текста кнопки Next
$wp_customize->add_setting('next_button_text', array(
    'default'   => 'Next',
    'transport' => 'refresh',
    'sanitize_callback' => 'sanitize_text_field',
));

$wp_customize->add_control('next_button_text', array(
    'label'    => __('Header button text', 'modernview'),
    'section'  => 'button_section',
    'settings' => 'next_button_text',
    'type'     => 'text',
    'sanitize_callback' => 'sanitize_text_field',
));




// Секция для настройки блоков
    $wp_customize->add_section('blocks_section', array(
        'title'    => __('Blocks Settings', 'modernview'),
        'priority' => 30,
        'sanitize_callback' => 'esc_url',
    ));

    // Настройка количества блоков (2 или 3)
    $wp_customize->add_setting('number_of_blocks', array(
        'default'   => '3',
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('number_of_blocks', array(
        'label'    => __('Number of Blocks', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'number_of_blocks',
        'type'     => 'select',
        'choices'  => array(
            '2' => __('2 Blocks', 'modernview'),
            '3' => __('3 Blocks', 'modernview'),
        ),
    ));

    // Настройки для блока 1
    $wp_customize->add_setting('block1_image', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_setting('block1_image_size', array(
        'default'   => 'medium', // Значение по умолчанию
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_setting('block1_header', array(
        'default'   => __('Block 1 Header', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('block1_text', array(
        'default'   => __('Block 1 Text', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'block1_image', array(
        'label'    => __('Block 1 Image', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block1_image',
    )));
    $wp_customize->add_control('block1_image_size', array(
        'label'    => __('Block 1 Image Size', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block1_image_size',
        'type'     => 'select',
        'choices'  => array(
            'thumbnail' => __('Thumbnail', 'modernview'),
            'medium'    => __('Medium', 'modernview'),
            'large'     => __('Large', 'modernview'),
            'full'      => __('Full Size', 'modernview'),
        ),
    ));
    $wp_customize->add_control('block1_header', array(
        'label'    => __('Block 1 Header', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block1_header',
        'type'     => 'text',
    ));
    $wp_customize->add_control('block1_text', array(
        'label'    => __('Block 1 Text', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block1_text',
        'type'     => 'textarea',
    ));

    // Повторите для блоков 2 и 3 аналогично

    // Настройки для блока 2
    $wp_customize->add_setting('block2_image', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_setting('block2_image_size', array(
        'default'   => 'medium', // Значение по умолчанию
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_setting('block2_header', array(
        'default'   => __('Block 2 Header', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',

    ));
    $wp_customize->add_setting('block2_text', array(
        'default'   => __('Block 2 Text', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'block2_image', array(
        'label'    => __('Block 2 Image', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block2_image',
    )));
    $wp_customize->add_control('block2_image_size', array(
        'label'    => __('Block 2 Image Size', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block2_image_size',
        'type'     => 'select',
        'choices'  => array(
            'thumbnail' => __('Thumbnail', 'modernview'),
            'medium'    => __('Medium', 'modernview'),
            'large'     => __('Large', 'modernview'),
            'full'      => __('Full Size', 'modernview'),
        ),
    ));
    $wp_customize->add_control('block2_header', array(
        'label'    => __('Block 2 Header', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block2_header',
        'type'     => 'text',
    ));
    $wp_customize->add_control('block2_text', array(
        'label'    => __('Block 2 Text', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block2_text',
        'type'     => 'textarea',
    ));

    // Настройки для блока 3
    $wp_customize->add_setting('block3_image', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_setting('block3_image_size', array(
        'default'   => 'medium', // Значение по умолчанию
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_setting('block3_header', array(
        'default'   => __('Block 3 Header', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_setting('block3_text', array(
        'default'   => __('Block 3 Text', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'block3_image', array(
        'label'    => __('Block 3 Image', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block3_image',
    )));
    $wp_customize->add_control('block3_image_size', array(
        'label'    => __('Block 3 Image Size', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block3_image_size',
        'type'     => 'select',
        'choices'  => array(
            'thumbnail' => __('Thumbnail', 'modernview'),
            'medium'    => __('Medium', 'modernview'),
            'large'     => __('Large', 'modernview'),
            'full'      => __('Full Size', 'modernview'),
        ),
    ));
    $wp_customize->add_control('block3_header', array(
        'label'    => __('Block 3 Header', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block3_header',
        'type'     => 'text',
    ));
    $wp_customize->add_control('block3_text', array(
        'label'    => __('Block 3 Text', 'modernview'),
        'section'  => 'blocks_section',
        'settings' => 'block3_text',
        'type'     => 'textarea',
    ));

}
add_action('customize_register', 'mytheme_customize_register');


function mytheme_custom_background_setup() {
    add_theme_support('custom-background', array(
        'default-image' => '', // Путь к изображению по умолчанию
        'default-color' => '000000', // Цвет фона по умолчанию
        'wp-head-callback' => 'mytheme_custom_background_cb', // Callback для вывода стилей
    ));
}
add_action('after_setup_theme', 'mytheme_custom_background_setup');


function mytheme_custom_background_cb() {
    // Получение фонового изображения
    $background = get_background_image();

    // Получение фонового цвета
    $color = get_background_color();

    // Если нет изображения или цвета, ничего не делаем
    if (!$background && !$color) {
        return;
    }

    $style = '';

    // Если установлено изображение фона
    if ($background) {
        $style .= "background-image: url('" . esc_url($background) . "');";
        $style .= "background-size: cover;";
        $style .= "background-attachment: fixed;"; // Фиксированное фоновое изображение
        $style .= "background-position: center center;";
        $style .= "background-repeat: no-repeat;";
    }

    // Если установлен цвет фона
    if ($color) {
        $style .= "background-color: #" . esc_attr($color) . ";";
    }

    // Выводим стили для тега body
    echo "<style type='text/css'> body { $style } </style>";
}






function mytheme_customize_register_team_section($wp_customize) {

    // Секция "Команда"
    $wp_customize->add_section('team_section', array(
        'title'      => __('Team Section', 'modernview'),
        'priority'   => 30,
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Заголовок секции команды
    $wp_customize->add_setting('team_section_title', array(
        'default'   => __('Our Team', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('team_section_title', array(
        'label'    => __('Team Section Title', 'modernview'),
        'section'  => 'team_section',
        'type'     => 'text',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    //текст
    $wp_customize->add_setting('team_section_description', array(
        'default'   => __('Meet our team of experts', 'modernview'),
        'transport' => 'refresh',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('team_section_description', array(
        'label'    => __('Team Section Description', 'modernview'),
        'section'  => 'team_section',
        'settings' => 'team_section_description',
        'type'     => 'textarea',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    // Изображения членов команды
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("team_member_image_$i", array(
            'default'   => '',
            'transport' => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "team_member_image_$i", array(
            'label'    => __("Team Member $i Image", 'modernview'),
            'section'  => 'team_section',
            'settings' => "team_member_image_$i",
            'sanitize_callback' => 'sanitize_text_field',
        )));
    }
}
add_action('customize_register', 'mytheme_customize_register_team_section');



function team_contact_section_customize_register($wp_customize) {
    // Раздел для настройки секции
    $wp_customize->add_section('team_contact_section', array(
        'title' => __('Contact US Section', 'modernview'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Настройка для заголовка
    $wp_customize->add_setting('contact_header', array(
        'default' => __('Find a skilled individual to do the job', 'modernview'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_header_control', array(
        'label' => __('Header Text', 'modernview'),
        'section' => 'team_contact_section',
        'settings' => 'contact_header',
        'type' => 'text',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Настройка для текста
    $wp_customize->add_setting('contact_text', array(
        'default' => __('Green cube let to find you right individual for any challange for development  to a marketing promotion', 'modernview'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_text_control', array(
        'label' => __('Body Text', 'modernview'),
        'section' => 'team_contact_section',
        'settings' => 'contact_text',
        'type' => 'textarea',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Настройка для текста кнопки
    $wp_customize->add_setting('contact_button_text', array(
        'default' => __('Lets connect', 'modernview'),
        'sanitize_callback' => 'sanitize_text_field',

    ));
    $wp_customize->add_control('contact_button_text_control', array(
        'label' => __('Button Text', 'modernview'),
        'section' => 'team_contact_section',
        'settings' => 'contact_button_text',
        'type' => 'text',
        'sanitize_callback' => 'sanitize_text_field',

    ));

    // Настройка для ссылки кнопки

    $wp_customize->add_setting('contact_button_link', array(
        'default' => '#', // Ссылка по умолчанию
        'sanitize_callback' => 'esc_url',
    ));
    $wp_customize->add_control('contact_button_link_control', array(
        'label' => __('Button Link', 'modernview'),
        'section' => 'team_contact_section',
        'settings' => 'contact_button_link',
        'type' => 'url', // Устанавливает тип поля как URL
        'sanitize_callback' => 'esc_url',
    ));

    // Настройка для изображения
    $wp_customize->add_setting('contact_image', array(
        'sanitize_callback' => 'esc_url' // Добавьте коллбэк для санитизации
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'contact_image_control', array(
        'label' => __('Contact Image', 'modernview'),
        'section' => 'team_contact_section',
        'settings' => 'contact_image',
        'sanitize_callback' => 'esc_url',
    )));
}
add_action('customize_register', 'team_contact_section_customize_register');




function register_footer_menu() {
    register_nav_menus(array(
        'footer_menu' => __('Footer Menu', 'modernview')
    ));
}
add_action('init', 'register_footer_menu');
function customize_footer_settings($wp_customize) {
    // Настройка для названия сайта
    $wp_customize->add_section('footer_section', array(
        'title' => __('Footer Settings', 'modernview'),
        'priority' => 30,
    ));

    // Настройка для названия сайта
    $wp_customize->add_setting('site_name', array(
        'default' => __('My Website', 'modernview'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('site_name', array(
        'label' => __('Site Name', 'modernview'),
        'section' => 'footer_section',
        'type' => 'text',
    ));

    // Настройка для текста в футере
    $wp_customize->add_setting('footer_text', array(
        'default' => __('All rights reserved', 'modernview'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text', array(
        'label' => __('Footer Text', 'modernview'),
        'section' => 'footer_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'customize_footer_settings');


?>
