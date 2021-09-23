<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_graduates( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_graduates',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Выпускники', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 100,
			'description'      => __( 'Секция главной страницы. Якорь #graduates. В секции выводится список преимуществ, перечень которых настраивается отдельно.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'graduates_flag',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'graduates_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_graduates',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'graduates_title',
		array(
			'default'           => __( 'Выпускники', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'graduates_title',
		array(
			'section'           => ACT_THEME_SLUG . '_graduates',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'graduates_subtitle',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'graduates_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_graduates',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'graduates_type',
		array(
			'default'           => 'list',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'graduates_type',
		array(
			'section'           => ACT_THEME_SLUG . '_graduates',
			'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => array(
				'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
				'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
			),
		)
	); /**/

	$wp_customize->add_setting(
		'graduates_page_id',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'graduates_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_graduates',
			'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	); /**/

	$wp_customize->add_setting(
		'graduates_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'graduates_label',
		array(
			'section'           => ACT_THEME_SLUG . '_graduates',
			'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_graduates', 10, 1 );