<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_features( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_features',
		array(
			'title'            => __( 'Особенности', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Шорткод [features]', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/


	for ( $i = 0; $i < 3; $i++ ) {
		$wp_customize->add_setting(
			"features[{$i}][logo]",
				array(
					'default'           => ACT_THEME_URL . 'images/business.png',
					'transport'         => 'reset',
					'sanitize_callback' => 'sanitize_url',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"features[{$i}][logo]",
				array(
					'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_features',
					'settings'   => "features[{$i}][logo]",
				)
			)
		);
		$wp_customize->add_setting(
			"features[{$i}][title]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"features[{$i}][title]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_features',
				'label'             => sprintf( __( 'особенность №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_features', 10, 1 );