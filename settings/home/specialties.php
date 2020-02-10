<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_specialties",
    array(
        'title'            => __( 'Специальности', ACT_THEME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Пятая секция главной страницы. Якорь #specialties', ACT_THEME_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_specialties_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_specialties_flag",
    array(
        'section'           => "{$slug}_specialties",
        'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_specialties_title",
    array(
        'default'           => __( 'Специальности', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_specialties_title",
    array(
        'section'           => "{$slug}_specialties",
        'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_specialties_subtitle",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    "{$slug}_specialties_subtitle",
    array(
        'section'           => "{$slug}_specialties",
        'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_specialties_type",
    array(
        'default'           => 'list',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_specialties_type",
    array(
        'section'           => "{$slug}_specialties",
        'label'             => __( 'Тип содержимого', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => array(
            'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
            'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
        ),
    )
); /**/


$wp_customize->add_setting(
    "{$slug}_specialties_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_specialties_page_id",
    array(
        'section'           => "{$slug}_specialties",
        'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_specialties_label",
    array(
        'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_specialties_label",
    array(
        'section'           => "{$slug}_specialties",
        'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/