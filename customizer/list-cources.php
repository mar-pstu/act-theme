<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_cources( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_cources',
		array(
			'title'            => __( 'Курсы', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 80,
			'description'      => __( 'Список дополнительных курсов, которые преподаются на кафедре. Выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	$wp_customize->add_setting(
		'cources_number',
		array(
			'default'           => 4,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cources_number',
		array(
			'section'           => ACT_THEME_SLUG . '_list_cources',
			'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => array(
				'min'             => '1',
				'min'             => '9',
			),
		)
	); /**/

	for ( $i=0; $i < get_theme_mod( 'cources_number', 3 ); $i++ ) {
		$wp_customize->add_setting(
			"cources[{$i}][thumbnail]",
				array(
					'default'           => ACT_THEME_URL . 'images/thumbnail.png',
					'transport'         => 'reset',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"cources[{$i}][thumbnail]",
				array(
					'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_cources',
					'settings'   => "cources[{$i}][thumbnail]",
				)
			)
		); /**/
		$wp_customize->add_setting(
			"cources[{$i}][title]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"cources[{$i}][title]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_cources',
				'label'             => sprintf( __( 'заголовок №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
		$wp_customize->add_setting(
			"cources[{$i}][excerpt]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);
		$wp_customize->add_control(
			"cources[{$i}][excerpt]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_cources',
				'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'textarea',
			)
		); /**/
		$wp_customize->add_setting(
			"cources[{$i}][link]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			"cources[{$i}][link]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_cources',
				'label'             => sprintf( __( 'ссылка №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_cources', 10, 1 );