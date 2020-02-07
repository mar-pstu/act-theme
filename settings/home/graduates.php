<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_graduates",
	array(
		'title'            => __( 'Выпускники', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #graduates. В секции выводится список преимуществ, перечень которых настраивается отдельно.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_graduates_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_graduates_flag",
	array(
		'section'           => "{$slug}_graduates",
		'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_graduates_title",
	array(
		'default'           => __( 'Выпускники', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_graduates_title",
	array(
		'section'           => "{$slug}_graduates",
		'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_graduates_subtitle",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_graduates_subtitle",
	array(
		'section'           => "{$slug}_graduates",
		'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
    "{$slug}_graduates_type",
    array(
        'default'           => 'list',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_graduates_type",
    array(
        'section'           => "{$slug}_graduates",
        'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => array(
            'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
            'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
        ),
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_graduates_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_graduates_page_id",
    array(
        'section'           => "{$slug}_graduates",
        'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
    "{$slug}_graduates_label",
    array(
        'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_graduates_label",
    array(
        'section'           => "{$slug}_graduates",
        'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'text',
    )
); /**/