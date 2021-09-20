<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_steps",
    array(
        'title'            => __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Пятая секция главной страницы. Якорь #steps', ACT_THEME_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    'steps_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'steps_flag',
    array(
        'section'           => "{$slug}_steps",
        'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    'steps_title',
    array(
        'default'           => __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'steps_title',
    array(
        'section'           => "{$slug}_steps",
        'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    'steps_subtitle',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'steps_subtitle',
    array(
        'section'           => "{$slug}_steps",
        'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    'steps_type',
    array(
        'default'           => 'list',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'steps_type',
    array(
        'section'           => "{$slug}_steps",
        'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => array(
            'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
            'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
        ),
    )
); /**/



$wp_customize->add_setting(
    'steps_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'steps_page_id',
    array(
        'section'           => "{$slug}_steps",
        'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    'steps_label',
    array(
        'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'steps_label',
    array(
        'section'           => "{$slug}_steps",
        'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/