<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


$wp_customize->add_section(
	"{$slug}_advertising",
	array(
		'title'            => __( 'Рекламное видео', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Секция главной страницы. Якорь #advertising', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_home",
	)
); /**/


$wp_customize->add_setting(
    "{$slug}_advertising_flag",
    array(
        'default'           => false,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    "{$slug}_advertising_flag",
    array(
        'section'           => "{$slug}_advertising",
        'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'checkbox',
    )
); /**/


$wp_customize->add_setting(
	"{$slug}_advertising_title",
	array(
		'default'           => get_bloginfo( 'name' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_advertising_title",
	array(
		'section'           => "{$slug}_advertising",
		'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_advertising_excerpt",
	array(
		'default'           => get_bloginfo( 'description' ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_advertising_excerpt",
	array(
		'section'           => "{$slug}_advertising",
		'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_advertising_label",
	array(
		'default'           => __( 'Нажмите, чтобы воспроизвести видео', ACT_THEME_TEXTDOMAIN ),
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control(
	"{$slug}_advertising_label",
	array(
		'section'           => "{$slug}_advertising",
		'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_advertising_video",
	array(
		'default'           => '',
		'transport'         => 'reset',
		'sanitize_callback' => 'sanitize_url',
	)
);
$wp_customize->add_control(
	"{$slug}_advertising_video",
	array(
		'section'           => "{$slug}_advertising",
		'label'             => __( 'Ссылка на видео', ACT_THEME_TEXTDOMAIN ),
		'type'              => 'text',
	)
); /**/


$wp_customize->add_setting(
	"{$slug}_advertising_bgi",
		array(
			'default'           => ACT_THEME_URL . 'images/advertising.jpg',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
$wp_customize->add_control(
	new \WP_Customize_Image_Control(
		$wp_customize,
		"{$slug}_advertising_bgi",
		array(
			'label'      => __( 'Фон', ACT_THEME_TEXTDOMAIN ),
			'section'    => "{$slug}_advertising",
			'settings'   => "{$slug}_advertising_bgi",
		)
	)
); /**/