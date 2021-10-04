<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_indicators( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_indicators',
		array(
			'title'            => __( 'Показатели работы', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 60,
			'description'      => __( 'Список ссылок на страницы социальных сетей организации', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	for ( $i=0; $i < 4; $i++ ) {
		$wp_customize->add_setting(
			"indicators[{$i}][logo]",
				array(
					'default'           => ACT_THEME_URL . 'images/business.png',
					'transport'         => 'reset',
					'sanitize_callback' => 'esc_url_raw',
				)
			);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				"indicators[{$i}][logo]",
				array(
					'label'      => sprintf( __( 'лого №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
					'section'    => ACT_THEME_SLUG . '_list_indicators',
					'settings'   => "indicators[{$i}][logo]",
				)
			)
		);
		$wp_customize->add_setting(
			"indicators[{$i}][label]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"indicators[{$i}][label]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_indicators',
				'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
		$wp_customize->add_setting(
			"indicators[{$i}][value]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"indicators[{$i}][value]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_indicators',
				'label'             => sprintf( __( 'значение №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
				'type'              => 'text',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_indicators', 10, 1 );