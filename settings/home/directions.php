<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_directions",
	array(
		'title'            => __( 'Направления работы', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #directions. В секции выводится список преимуществ, перечень которых настраивается отдельно.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_directions_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_directions_flag",
	array(
		'section'           => "{$slug}_directions",
		'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_directions_title",
	array(
		'default'           => __( 'Направления работы', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_directions_title",
	array(
		'section'           => "{$slug}_directions",
		'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_directions_subtitle",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_directions_subtitle",
	array(
		'section'           => "{$slug}_directions",
		'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_directions_type",
	array(
		'default'           => 'list',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_directions_type",
	array(
		'section'           => "{$slug}_directions",
		'label'             => __( 'Тип содержимого', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'select',
		'choices'           => array(
			'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
			'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
		),
	)
); /**/


$wp_customize->add_setting(
    "{$slug}_directions_page_id",
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    "{$slug}_directions_page_id",
    array(
        'section'           => "{$slug}_directions",
        'label'             => __( 'Выбор страницы с описанием', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/