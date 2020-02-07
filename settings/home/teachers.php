<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_teachers",
    array(
        'title'            => __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Шестая секция главной страницы. Якорь #teachers', ACT_THEME_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_teachers_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_teachers_flag",
    array(
        'section'           => "{$slug}_teachers",
        'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_teachers_title",
    array(
        'default'           => __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_teachers_title",
    array(
        'section'           => "{$slug}_teachers",
        'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_teachers_excerpt",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_teachers_excerpt",
    array(
        'section'           => "{$slug}_teachers",
        'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_teachers_subtitle",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_teachers_subtitle",
    array(
        'section'           => "{$slug}_teachers",
        'label'             => __( 'Заголовок более расширеного описания', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_teachers_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_teachers_page_id",
    array(
        'section'           => "{$slug}_teachers",
        'label'             => __( 'Выбор страницы с описанием', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_teachers_label",
    array(
        'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_teachers_label",
    array(
        'section'           => "{$slug}_teachers",
        'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_teachers_socials",
    array(
        'default'           => __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_teachers_socials",
    array(
        'section'           => "{$slug}_teachers",
        'label'             => __( 'Заголовок блока со ссылками на социальные сети', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/