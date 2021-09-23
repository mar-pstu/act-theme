<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_about( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_about',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'О нас', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 20,
			'description'      => __( 'Вторая секция главной страницы. Якорь #about', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'about_flag',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'about_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_about',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'about_page_id',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'about_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_about',
			'label'             => __( 'Выбор страницы с описанием', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	); /**/

	$wp_customize->add_setting(
		'about_title',
		array(
			'default'           => __( 'О нас', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'about_title',
		array(
			'section'           => ACT_THEME_SLUG . '_about',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'about_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'about_label',
		array(
			'section'           => ACT_THEME_SLUG . '_about',
			'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'about_thumbnail',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
	   new \WP_Customize_Image_Control(
		   $wp_customize,
		   'about_thumbnail',
		   array(
			   'label'      => __( 'Превью', ACT_THEME_TEXTDOMAIN ),
			   'section'    => ACT_THEME_SLUG . '_about',
			   'settings'   => 'about_thumbnail',
		   )
	   )
	);

}

add_action( 'customize_register', 'act_theme\customizer_register_home_about', 10, 1 );