<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_questions",
	array(
		'title'            => __( 'Контаактная форма', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #questions. Если шорткод формы не установлен, то используется стандартная форма темы, письмо с которой приходит на почту администратора сайта.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_questions_flag",
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_questions_flag",
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_questions_title",
	array(
		'default'           => __( 'Остались вопросы?', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_questions_title",
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_questions_subtitle",
	array(
		'default'           => __( 'Напишите нам, мы с Вами обязательно свяжемся.', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	"{$slug}_questions_subtitle",
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
	"{$slug}_questions_shortcode",
	array(
		'default'           => __( 'Напишите нам, мы с Вами обязательно свяжемся.', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_questions_shortcode",
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Шорткод формы', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/