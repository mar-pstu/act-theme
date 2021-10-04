<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_steps( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_steps',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 80,
			'description'      => __( 'Секция главной страницы. Якорь #steps', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'steps_flag',
		array(
			'default'           => false,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'steps_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_steps',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'steps_flag', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'steps_title',
		array(
			'default'           => __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'steps_title',
		array(
			'section'           => ACT_THEME_SLUG . '_steps',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'steps_title', [
		'selector'         => '#steps-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'steps_title' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'steps_subtitle',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'steps_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_steps',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'steps_subtitle', [
		'selector'         => '#steps-subtitle',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'steps_subtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'steps_type',
		array(
			'default'           => 'list',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'steps_type',
		array(
			'section'           => ACT_THEME_SLUG . '_steps',
			'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => array(
				'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
				'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
			),
		)
	);
	$wp_customize->selective_refresh->add_partial( 'steps_type', [
		'selector'         => '#steps-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'steps_page_id',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'steps_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_steps',
			'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'steps_page_id', [
		'selector'         => '#steps-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'steps_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'steps_label',
		array(
			'section'           => ACT_THEME_SLUG . '_steps',
			'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'steps_label', [
		'selector'         => '#steps-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'steps_label' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_steps', 10, 1 );