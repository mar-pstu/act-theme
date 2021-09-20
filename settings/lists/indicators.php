<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_list_indicators",
	array(
		'title'            => __( 'Показатели работы', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список показателей работы, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



for ( $i=0; $i < 4; $i++ ) {
	$wp_customize->add_setting(
		"indicators[{$i}][logo]",
			array(
				'default'           => ACT_THEME_URL . 'images/business.png',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_url',
			)
		);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			"indicators[{$i}][logo]",
			array(
				'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'section'    => "{$slug}_list_indicators",
				'settings'   => "indicators[{$i}][logo]",
			)
		)
	);
	$wp_customize->add_setting(
		"indicators[{$i}][label]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"indicators[{$i}][label]",
		array(
			'section'           => "{$slug}_list_indicators",
			'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"indicators[{$i}][value]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"indicators[{$i}][value]",
		array(
			'section'           => "{$slug}_list_indicators",
			'label'             => sprintf( __( 'значение №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
}