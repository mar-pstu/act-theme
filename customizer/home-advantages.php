<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_advantages( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_advantages',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Преимущества', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 110,
			'description'      => __( 'Секция главной страницы. Якорь #advantages.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'advantages_flag',
		array(
			'default'           => false,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advantages_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_advantages',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'advantages_flag', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'advantages_title',
		array(
			'default'           => __( 'Преимущества обучения на кафедре', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advantages_title',
		array(
			'section'           => ACT_THEME_SLUG . '_advantages',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'advantages_title', [
		'selector'         => '#advantages-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'advantages_title' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'advantages_subtitle',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'advantages_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_advantages',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'advantages_subtitle', [
		'selector'         => '#advantages-subtitle',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'advantages_subtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'advantages_type',
		array(
			'default'           => 'list',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advantages_type',
		array(
			'section'           => ACT_THEME_SLUG . '_advantages',
			'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => array(
				'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
				'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
			),
		)
	);
	$wp_customize->selective_refresh->add_partial( 'advantages_type', [
		'selector'         => '#advantages-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'advantages_page_id',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'advantages_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_advantages',
			'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'advantages_page_id', [
		'selector'         => '#advantages-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'advantages_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advantages_label',
		array(
			'section'           => ACT_THEME_SLUG . '_advantages',
			'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'advantages_label', [
		'selector'         => '#advantages-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'advantages_label' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_advantages', 10, 1 );