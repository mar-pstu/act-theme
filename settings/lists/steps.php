<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_list_steps",
	array(
		'title'            => __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список специальностей, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



$wp_customize->add_setting(
	'steps_number',
	array(
		'default'           => 3,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'steps_number',
	array(
		'section'           => "{$slug}_list_steps",
		'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'number',
		'input_attrs'       => array(
			'min'             => '1',
			'min'             => '10',
		),
	)
); /**/



for ( $i=0; $i < get_theme_mod( 'steps_number', 3 ); $i++ ) {
	$wp_customize->add_setting(
		"steps[{$i}][thumbnail]",
			array(
				'default'           => ACT_THEME_URL . 'images/thumbnail.png',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_url',
			)
		);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			"steps[{$i}][thumbnail]",
			array(
				'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'section'    => "{$slug}_list_steps",
				'settings'   => "steps[{$i}][thumbnail]",
			)
		)
	);
	$wp_customize->add_setting(
		"steps[{$i}][title]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"steps[{$i}][title]",
		array(
			'section'           => "{$slug}_list_steps",
			'label'             => sprintf( __( 'заголовок №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
	$wp_customize->add_setting(
		"steps[{$i}][excerpt]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		"steps[{$i}][excerpt]",
		array(
			'section'           => "{$slug}_list_steps",
			'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'textarea',
		)
	); /**/
	$wp_customize->add_setting(
		"steps[{$i}][link]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		"steps[{$i}][link]",
		array(
			'section'           => "{$slug}_list_steps",
			'label'             => sprintf( __( 'ссылка №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
			'type'              => 'text',
		)
	); /**/
}