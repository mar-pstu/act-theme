<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_advantages",
    array(
        'title'            => __( 'Преимущества', ACT_THEME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Пятая секция главной страницы. Якорь #advantages', ACT_THEME_TEXTDOMAIN ),
        'panel'            => "{$slug}_home",
    )
); /**/



$wp_customize->add_setting(
    'advantages_flag',
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'advantages_flag',
    array(
        'section'           => "{$slug}_advantages",
        'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/



$wp_customize->add_setting(
    'advantages_title',
    array(
        'default'           => __( 'Преимущества обучения на кафедре', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'advantages_title',
    array(
        'section'           => "{$slug}_advantages",
        'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    'advantages_subtitle',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'advantages_subtitle',
    array(
        'section'           => "{$slug}_advantages",
        'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/



$wp_customize->add_setting(
    'advantages_type',
    array(
        'default'           => 'list',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'advantages_type',
    array(
        'section'           => "{$slug}_advantages",
        'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => array(
            'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
            'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
        ),
    )
); /**/



$wp_customize->add_setting(
    'advantages_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'advantages_page_id',
    array(
        'section'           => "{$slug}_advantages",
        'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    'advantages_label',
    array(
        'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'advantages_label',
    array(
        'section'           => "{$slug}_advantages",
        'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/