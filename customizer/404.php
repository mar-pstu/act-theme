<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };




$wp_customize->add_section(
    ACT_THEME_SLUG . '_error404',
    array(
        'title'            => __( 'Страница ошибки 404', ACT_THEME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Якорь #error404', ACT_THEME_TEXTDOMAIN ),
        'panel'            => ACT_THEME_SLUG
    )
); /**/



$wp_customize->add_setting(
    ACT_THEME_SLUG . '_error404_title',
    array(
        'default'           => __( 'Ошибка 404', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    ACT_THEME_SLUG . '_error404_title',
    array(
        'section'           => ACT_THEME_SLUG . '_error404',
        'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    ACT_THEME_SLUG . '_error404_description',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    ACT_THEME_SLUG . '_error404_description',
    array(
        'section'           => ACT_THEME_SLUG . '_error404',
        'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/


