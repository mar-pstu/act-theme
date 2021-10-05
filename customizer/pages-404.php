<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_pages_404( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_pages_404',
		array(
			'title'            => __( 'Страница ошибки 404', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 10,
			'description'      => __( 'Якорь #error404', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'page_templates',
		)
	); /**/

	$wp_customize->add_setting(
		'error404_title',
		array(
			'default'           => __( 'Ошибка 404', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'error404_title',
		array(
			'section'           => ACT_THEME_SLUG . '_pages_404',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'error404_description',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'error404_description',
		array(
			'section'           => ACT_THEME_SLUG . '_pages_404',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_pages_404', 10, 1 );