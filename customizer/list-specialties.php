<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_specialties( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_specialties',
		array(
			'title'            => __( 'Специальности', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 30,
			'description'      => __( 'Список специальностей, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	$wp_customize->add_setting(
		'specialties_number',
		array(
			'default'           => 4,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'specialties_number',
		array(
			'section'           => ACT_THEME_SLUG . '_list_specialties',
			'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => array(
				'min'             => '1',
				'min'             => '9',
			),
		)
	); /**/

	for ( $i=0; $i < get_theme_mod( 'specialties_number', 3 ); $i++ ) {
		$wp_customize->add_setting(
			"specialties[{$i}][thumbnail]",
				array(
					'default'           => ACT_THEME_URL . 'images/thumbnail.png',
					'transport'         => 'reset',
					'sanitize_callback' => 'sanitize_url',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"specialties[{$i}][thumbnail]",
				array(
					'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_specialties',
					'settings'   => "specialties[{$i}][thumbnail]",
				)
			)
		);
		$wp_customize->add_setting(
			"specialties[{$i}][title]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"specialties[{$i}][title]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_specialties',
				'label'             => sprintf( __( 'заголовок №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
		$wp_customize->add_setting(
			"specialties[{$i}][link]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_url',
			)
		);
		$wp_customize->add_control(
			"specialties[{$i}][link]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_specialties',
				'label'             => sprintf( __( 'ссылка №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_specialties', 10, 1 );