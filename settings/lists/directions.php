<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_list_directions",
	array(
		'title'            => __( 'Направления работы', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список направлений работы, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_directions_number",
	array(
		'default'           => 4,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_directions_number",
	array(
		'section'           => "{$slug}_list_directions",
		'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => '2',
			'min'             => '8',
		),
	)
); /**/



for ( $i = 0; $i < get_theme_mod( "{$slug}_directions_number", 4 ); $i++ ) {
	$wp_customize->add_setting(
		"{$slug}_directions[{$i}][icon]",
			array(
				'default'           => ACT_THEME_URL . 'images/business.png',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_url',
			)
		);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			"{$slug}_directions[{$i}][icon]",
			array(
				'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'section'    => "{$slug}_list_directions",
				'settings'   => "{$slug}_directions[{$i}][icon]",
			)
		)
	);
	$wp_customize->add_setting(
		"{$slug}_directions[{$i}][title]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_directions[{$i}][title]",
		array(
			'section'           => "{$slug}_list_directions",
			'label'             => sprintf( __( 'заголовок №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"{$slug}_directions[{$i}][excerpt]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_directions[{$i}][excerpt]",
		array(
			'section'           => "{$slug}_list_directions",
			'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'textarea',
		)
	); /**/
}