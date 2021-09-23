<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_cources( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_cources',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Курсы', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 90,
			'description'      => __( 'Секция главной страницы. Якорь #cources.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'cources_flag',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cources_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_cources',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'cources_title',
		array(
			'default'           => __( 'Курсы', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cources_title',
		array(
			'section'           => ACT_THEME_SLUG . '_cources',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'cources_subtitle',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'cources_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_cources',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	); /**/

	$wp_customize->add_setting(
		'cources_type',
		array(
			'default'           => 'list',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cources_type',
		array(
			'section'           => ACT_THEME_SLUG . '_cources',
			'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => array(
				'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
				'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
			),
		)
	); /**/

	$wp_customize->add_setting(
		'cources_page_id',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'cources_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_cources',
			'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	); /**/

	$wp_customize->add_setting(
		'cources_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cources_label',
		array(
			'section'           => ACT_THEME_SLUG . '_cources',
			'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_cources', 10, 1 );