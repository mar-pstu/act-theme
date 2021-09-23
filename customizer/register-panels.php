<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_panels( $wp_customize ) {
	
	/**
	 * Настройки блоков темы
	 **/
	$wp_customize->add_panel(
		'template_parts',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки темы', ACT_THEME_TEXTDOMAIN ),
		]
	);

	/**
	 * Настройки шаблонов страниц
	 **/
	$wp_customize->add_panel(
		'page_templates',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Шаблоны страниц', ACT_THEME_TEXTDOMAIN ),
		]
	);

	/**
	 * Настройки списки темы
	 **/
	$wp_customize->add_panel(
		'template_lists ',
		[
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', ACT_THEME_TEXTDOMAIN ),
		]
	);

}

add_action( 'customize_register', 'act_theme\customizer_register_panels', 10, 1 );