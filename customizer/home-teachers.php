<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_teachers( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_teachers',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 60,
			'description'      => __( 'Шестая секция главной страницы. Якорь #teachers', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'teachers_flag',
		array(
			'default'           => false,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'teachers_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_flag', [
		'selector'         => '#teachers',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'teachers_title',
		array(
			'default'           => __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'teachers_title',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_title', [
		'selector'         => '#teachers-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'teachers_title' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'teachers_excerpt',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'teachers_excerpt',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_excerpt', [
		'selector'         => '#teachers-excerpt',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'teachers_excerpt' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'teachers_subtitle',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'teachers_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Заголовок более расширенного описания', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_subtitle', [
		'selector'         => '#teachers-subtitle',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'teachers_subtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'teachers_type',
		array(
			'default'           => 'shortcode',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'teachers_type',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => array(
				'shortcode'       => __( 'шорткод', ACT_THEME_TEXTDOMAIN ),
				'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
			),
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_type', [
		'selector'         => '#teachers-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'hometeachersdescription',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => 'wp_kses_post',
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_Tinymce_Editor(
			$wp_customize,
			'hometeachersdescription',
			[
				'label'                 => __( 'Описание расширенное', ACT_THEME_TEXTDOMAIN ),
				'section'               => ACT_THEME_SLUG . '_teachers',
				'settings'              => 'hometeachersdescription'
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'hometeachersdescription', [
        'selector'         => '#teachers-description',
        'render_callback'  => function () { return customizer_get_editor_theme_mod( 'hometeachersdescription' ); },
        'fallback_refresh' => true,
    ] ); /**/

	$wp_customize->add_setting(
		'teachers_page_id',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'teachers_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Выбор страницы с описанием', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_page_id', [
		'selector'         => '#teachers-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'teachers_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'teachers_label',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_label', [
		'selector'         => '#teachers-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'teachers_label' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'teachers_socials',
		array(
			'default'           => __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'teachers_socials',
		array(
			'section'           => ACT_THEME_SLUG . '_teachers',
			'label'             => __( 'Заголовок блока со ссылками на социальные сети', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'teachers_socials', [
		'selector'         => '#teachers-socials-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'teachers_socials' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_teachers', 10, 1 );