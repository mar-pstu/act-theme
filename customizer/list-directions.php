<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_directions( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_directions',
		array(
			'title'            => __( 'Направления работы', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 20,
			'description'      => __( 'Список направлений работы, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	$wp_customize->add_setting(
		'directions_number',
		array(
			'default'           => 4,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'directions_number',
		array(
			'section'           => ACT_THEME_SLUG . '_list_directions',
			'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => array(
				'min'             => '2',
				'min'             => '8',
			),
		)
	); /**/

	for ( $i = 0; $i < get_theme_mod( 'directions_number', 4 ); $i++ ) {
		$wp_customize->add_setting(
			"directions[{$i}][icon]",
				array(
					'default'           => ACT_THEME_URL . 'images/business.png',
					'transport'         => 'reset',
					'sanitize_callback' => 'sanitize_url',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"directions[{$i}][icon]",
				array(
					'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_directions',
					'settings'   => "directions[{$i}][icon]",
				)
			)
		);
		$wp_customize->add_setting(
			"directions[{$i}][title]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"directions[{$i}][title]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_directions',
				'label'             => sprintf( __( 'заголовок №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
		$wp_customize->add_setting(
			"directions[{$i}][excerpt]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);
		$wp_customize->add_control(
			"directions[{$i}][excerpt]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_directions',
				'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'textarea',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_directions', 10, 1 );