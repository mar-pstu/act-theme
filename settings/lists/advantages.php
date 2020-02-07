<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_list_advantages",
	array(
		'title'            => __( 'Преимущества', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Преимущества обучения на кафедре, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_advantages_number",
	array(
		'default'           => 6,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_advantages_number",
	array(
		'section'           => "{$slug}_list_advantages",
		'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => '3',
			'min'             => '12',
		),
	)
); /**/



for ( $i = 0; $i < get_theme_mod( "{$slug}_advantages_number", 3 ); $i++ ) {
	$wp_customize->add_setting(
		"{$slug}_advantages[{$i}][icon]",
			array(
				'default'           => ACT_THEME_URL . 'images/business.png',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_url',
			)
		);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			"{$slug}_advantages[{$i}][icon]",
			array(
				'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'section'    => "{$slug}_list_advantages",
				'settings'   => "{$slug}_advantages[{$i}][icon]",
			)
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_advantages[{$i}][title]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_advantages[{$i}][title]",
		array(
			'section'           => "{$slug}_list_advantages",
			'label'             => sprintf( __( 'заголовок №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_advantages[{$i}][excerpt]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_advantages[{$i}][excerpt]",
		array(
			'section'           => "{$slug}_list_advantages",
			'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'textarea',
		)
	); /**/
}