<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_advantages( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_advantages',
		array(
			'title'            => __( 'Преимущества', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 100,
			'description'      => __( 'Преимущества обучения на кафедре, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	$wp_customize->add_setting(
		'advantages_number',
		array(
			'default'           => 6,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advantages_number',
		array(
			'section'           => ACT_THEME_SLUG . '_list_advantages',
			'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => array(
				'min'             => '3',
				'min'             => '12',
			),
		)
	); /**/

	for ( $i = 0; $i < get_theme_mod( 'advantages_number', 3 ); $i++ ) {
		$wp_customize->add_setting(
			"advantages[{$i}][icon]",
				array(
					'default'           => ACT_THEME_URL . 'images/business.png',
					'transport'         => 'reset',
					'sanitize_callback' => 'sanitize_url',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"advantages[{$i}][icon]",
				array(
					'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_advantages',
					'settings'   => "advantages[{$i}][icon]",
				)
			)
		); /**/
		$wp_customize->add_setting(
			"advantages[{$i}][title]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"advantages[{$i}][title]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_advantages',
				'label'             => sprintf( __( 'заголовок №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
		$wp_customize->add_setting(
			"advantages[{$i}][excerpt]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);
		$wp_customize->add_control(
			"advantages[{$i}][excerpt]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_advantages',
				'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'textarea',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_advantages', 10, 1 );