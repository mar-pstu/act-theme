<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_questions",
	array(
		'title'            => __( 'Контактная форма', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #questions. Если шорткод формы не установлен, то используется стандартная форма темы, письмо с которой приходит на почту администратора сайта.', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/



$wp_customize->add_setting(
	'questions_flag',
	array(
		'default'           => false,
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'questions_flag',
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'checkbox',
	)
); /**/



$wp_customize->add_setting(
	'questions_title',
	array(
		'default'           => __( 'Остались вопросы?', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'questions_title',
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
	'questions_subtitle',
	array(
		'default'           => __( 'Напишите нам, мы с Вами обязательно свяжемся.', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_textarea_field',
	)
);
$wp_customize->add_control(
	'questions_subtitle',
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'textarea',
	)
); /**/



$wp_customize->add_setting(
    'questions_type',
    array(
        'default'           => 'shortcode',
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'questions_type',
    array(
        'section'           => "{$slug}_questions",
        'label'             => __( 'Тип контента', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'select',
        'choices'           => array(
            'shortcode'       => __( 'шорткод', ACT_THEME_TEXTDOMAIN ),
            'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
        ),
    )
); /**/



$wp_customize->add_setting(
	'questions_shortcode',
	array(
		'default'           => '[contacts_form]',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'questions_shortcode',
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Шорткод формы', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/



$wp_customize->add_setting(
    'questions_page_id',
    array(
        'default'           => '',
        'transport'         => 'reset',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'questions_page_id',
    array(
        'section'           => "{$slug}_questions",
        'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'dropdown-pages',
    )
); /**/



$wp_customize->add_setting(
	'questions_label',
	array(
		'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	'questions_label',
	array(
		'section'           => "{$slug}_questions",
		'label'             => __( 'Текст кнопки внизу секции', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/