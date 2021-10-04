<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_questions( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_questions',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Контактная форма', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 120,
			'description'      => __( 'Секция главной страницы. Якорь #questions. Если шорткод формы не установлен, то используется стандартная форма темы, письмо с которой приходит на почту администратора сайта.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'questions_flag',
		array(
			'default'           => false,
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'questions_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_questions',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'questions_flag', [
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'questions_title',
		array(
			'default'           => __( 'Остались вопросы?', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'questions_title',
		array(
			'section'           => ACT_THEME_SLUG . '_questions',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'questions_title', [
		'selector'         => '#questions-title',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'questions_title' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'questions_subtitle',
		array(
			'default'           => __( 'Напишите нам, мы с Вами обязательно свяжемся.', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'questions_subtitle',
		array(
			'section'           => ACT_THEME_SLUG . '_questions',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'questions_subtitle', [
		'selector'         => '#questions-subtitle',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'questions_subtitle' ); },
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'questions_type',
		array(
			'default'           => 'shortcode',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'questions_type',
		array(
			'section'           => ACT_THEME_SLUG . '_questions',
			'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'select',
			'choices'           => array(
				'shortcode'       => __( 'шорткод', ACT_THEME_TEXTDOMAIN ),
				'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
			),
		)
	);
	$wp_customize->selective_refresh->add_partial( 'questions_type', [
		'selector'         => '#questions-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'questions_shortcode',
		array(
			'default'           => '[contacts_form]',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'questions_shortcode',
		array(
			'section'           => ACT_THEME_SLUG . '_questions',
			'label'             => __( 'Шорткод формы', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'questions_shortcode', [
		'selector'         => '#questions-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'questions_page_id',
		array(
			'default'           => '',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control(
		'questions_page_id',
		array(
			'section'           => ACT_THEME_SLUG . '_questions',
			'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'dropdown-pages',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'questions_page_id', [
		'selector'         => '#questions-content',
		'render_callback'  => '__return_false',
		'fallback_refresh' => true,
	] ); /**/

	$wp_customize->add_setting(
		'questions_label',
		array(
			'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'questions_label',
		array(
			'section'           => ACT_THEME_SLUG . '_questions',
			'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	);
	$wp_customize->selective_refresh->add_partial( 'questions_label', [
		'selector'         => '#questions-permalink',
		'render_callback'  => function () { return customizer_get_text_theme_mod( 'questions_label' ); },
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_questions', 10, 1 );