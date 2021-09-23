<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_jumbotron( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_jumbotron',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Первый экран', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 10,
			'description'      => __( 'Секция главной страницы. Якорь #jumbotron', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_flag',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'jumbotron_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_jumbotron',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_title',
		array(
			'default'           => get_bloginfo( 'name' ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'jumbotron_title',
		array(
			'section'           => ACT_THEME_SLUG . '_jumbotron',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_description',
		array(
			'default'           => get_bloginfo( 'description' ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'jumbotron_description',
		array(
			'section'           => ACT_THEME_SLUG . '_jumbotron',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_text_color',
		array(
			'default'           => '#ffffff',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new \WP_Customize_Color_Control( 
		$wp_customize, 
		'jumbotron_text_color',
		array(
			'label'             => __( 'Цвет текста', ACT_THEME_TEXTDOMAIN ),
			'section'           => ACT_THEME_SLUG . '_jumbotron',
			'settings'          => 'jumbotron_text_color',
		) ) 
	);

	$wp_customize->add_setting(
		'jumbotron_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'jumbotron_label',
		array(
			'section'           => ACT_THEME_SLUG . '_jumbotron',
			'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotron_permalink',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'jumbotron_permalink',
		array(
			'section'           => ACT_THEME_SLUG . '_jumbotron',
			'label'             => __( 'Ссылка', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'jumbotronbgisrc',
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'jumbotronbgisrc',
			array(
				'label'      => __( 'Фон', ACT_THEME_TEXTDOMAIN ),
				'section'    => ACT_THEME_SLUG . '_jumbotron',
				'settings'   => 'jumbotronbgisrc',
			)
		)
	); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_jumbotron', 10, 1 );