<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_steps( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_steps',
		array(
			'title'            => __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 70,
			'description'      => __( 'Список шагов к поступлению, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
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
			'section'           => ACT_THEME_SLUG . '_list_steps',
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
					'sanitize_callback' => 'esc_url_raw',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"steps[{$i}][thumbnail]",
				array(
					'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_steps',
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
				'section'           => ACT_THEME_SLUG . '_list_steps',
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
				'section'           => ACT_THEME_SLUG . '_list_steps',
				'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'textarea',
			)
		); /**/
		$wp_customize->add_setting(
			"steps[{$i}][link]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			"steps[{$i}][link]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_steps',
				'label'             => sprintf( __( 'ссылка №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_steps', 10, 1 );