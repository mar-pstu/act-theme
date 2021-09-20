<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_indicators",
	array(
		'title'            => __( 'Показатели работы', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #indicators. В секции выводится список показателей работы, перечень которых настраивается отдельно.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	'indicators_flag',
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'indicators_flag',
	array(
		'section'           => "{$slug}_indicators",
		'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	'indicators_bgi',
	array(
		'default'           => ACT_THEME_URL . 'images/indicators.jpg',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
	new \WP_Customize_Image_Control(
		$wp_customize,
		'indicators_bgi',
		array(
			'label'      => __( 'Фон блока', ACT_THEME_TEXTDOMAIN ),
			'section'    => "{$slug}_indicators",
			'settings'   => 'indicators_bgi',
		)
	)
);



$wp_customize->add_setting(
	'indicators_text_color',
	array(
		'default'           => '#ffffff',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);
$wp_customize->add_control( 
    new \WP_Customize_Color_Control( 
    $wp_customize, 
    'indicators_text_color',
    array(
        'label'      => __( 'Цвет текста', ACT_THEME_TEXTDOMAIN ),
        'section'    => "{$slug}_indicators",
        'settings'   => 'indicators_text_color',
    ) ) 
);