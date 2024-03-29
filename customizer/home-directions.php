<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_directions( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_directions',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Направления работы', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 30,
			'description'      => __( 'Секция главной страницы. Якорь #directions. В секции выводится список преимуществ, перечень которых настраивается отдельно.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'directions_flag',
		array(
			'default'           => false,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'directions_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_directions',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'directions_flag', [
		'selector'         => '#directions',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'directions_title',
		array(
			'default'           => __( 'Направления работы', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'directions_title',
		array(
			'section'           => ACT_THEME_SLUG . '_directions',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'directions_title', [
		'selector'         => '#directions-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'directions_title' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'directions_subtitle',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'directions_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_directions',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'directions_subtitle', [
		'selector'         => '#directions-subtitle',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'directions_subtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'directions_type',
		array(
			'default'           => 'list',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'directions_type',
		array(
			'section'           => ACT_THEME_SLUG . '_directions',
			'label'             => __( 'Тип содержимого', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => array(
				'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
				'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
			),
		)
	);
	$wp_customize->selective_refresh->add_partial( 'directions_type', [
		'selector'         => '#directions-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'directions_page_id',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'directions_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_directions',
			'label'             => __( 'Выбор страницы с описанием', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'directions_page_id', [
        'selector'         => '#directions-content',
        'render_callback'  => '__return_false',
        'fallback_refresh' => true,
    ] ); /**/

	$wp_customize->add_setting(
		'directions_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'directions_label',
		array(
			'section'           => ACT_THEME_SLUG . '_directions',
			'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'directions_label', [
		'selector'         => '#directions-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'directions_label' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_directions', 10, 1 );