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
			'transport'         => 'postMessage',
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
	);
	$wp_customize->selective_refresh->add_partial( 'graduates_flag', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'graduates_title',
		array(
			'default'           => __( 'Выпускники', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
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
	);
	$wp_customize->selective_refresh->add_partial( 'graduates_title', [
		'selector'         => '#graduates-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'graduates_title' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'graduates_subtitle',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'graduates_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_graduates',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'graduates_subtitle', [
		'selector'         => '#graduates-subtitle',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'graduates_subtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'graduates_type',
		array(
			'default'           => 'list',
			'transport'         => 'postMessage',
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
	);
	$wp_customize->selective_refresh->add_partial( 'graduates_type', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'graduates_page_id',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
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
	);
	$wp_customize->selective_refresh->add_partial( 'graduates_page_id', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'graduates_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
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
	);
	$wp_customize->selective_refresh->add_partial( 'graduates_label', [
		'selector'         => '#graduates-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'graduates_label' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_graduates', 10, 1 );