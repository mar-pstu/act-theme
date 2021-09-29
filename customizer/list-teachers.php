<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_teachers( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_teachers',
		array(
			'title'            => __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 40,
			'description'      => __( 'Список преподавателей, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	$wp_customize->add_setting(
		'teachers_number',
		array(
			'default'           => 2,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'teachers_number',
		array(
			'section'           => ACT_THEME_SLUG . '_list_teachers',
			'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'number',
			'input_attrs'       => array(
				'min'             => '1',
				'max'             => '20',
			),
		)
	); /**/

	for ( $i=0; $i < get_theme_mod( 'teachers_number', 2 ); $i++ ) {
		$wp_customize->add_setting(
			"teachers[{$i}][foto]",
				array(
					'default'           => ACT_THEME_URL . 'images/teacher.png',
					'transport'         => 'reset',
					'sanitize_callback' => 'sanitize_url',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"teachers[{$i}][foto]",
				array(
					'label'      => sprintf( __( 'фото №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_teachers',
					'settings'   => "teachers[{$i}][foto]",
				)
			)
		);
		$wp_customize->add_setting(
			"teachers[{$i}][name]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"teachers[{$i}][name]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_teachers',
				'label'             => sprintf( __( 'имя №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
		$wp_customize->add_setting(
			"teachers[{$i}][excerpt]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		);
		$wp_customize->add_control(
			"teachers[{$i}][excerpt]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_teachers',
				'label'             => sprintf( __( 'краткое описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'textarea',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_teachers', 10, 1 );