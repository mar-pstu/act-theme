<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_cources",
    array(
        'title'            => __( 'Курсы', ACT_THEME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Секция главной страницы. Якорь #cources.', ACT_THEME_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    'cources_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cources_flag',
    array(
        'section'           => "{$slug}_cources",
        'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    'cources_title',
    array(
        'default'           => __( 'Курсы', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cources_title',
    array(
        'section'           => "{$slug}_cources",
        'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    'cources_subtitle',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_textarea_field',
    )
);
$wp_customize->add_control(
    'cources_subtitle',
    array(
        'section'           => "{$slug}_cources",
        'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'textarea',
    )
); /**/



$wp_customize->add_setting(
    'cources_type',
    array(
        'default'           => 'list',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cources_type',
    array(
        'section'           => "{$slug}_cources",
        'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => array(
            'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
            'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
        ),
    )
); /**/



$wp_customize->add_setting(
    'cources_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'cources_page_id',
    array(
        'section'           => "{$slug}_cources",
        'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    'cources_label',
    array(
        'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'cources_label',
    array(
        'section'           => "{$slug}_cources",
        'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/