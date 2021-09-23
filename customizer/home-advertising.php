<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_advertising( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_advertising',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Рекламное видео', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 40,
			'description'      => __( 'Секция главной страницы. Якорь #advertising', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
		'advertising_flag',
		array(
			'default'           => false,
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advertising_flag',
		array(
			'section'           => ACT_THEME_SLUG . '_advertising',
			'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'checkbox',
		)
	); /**/

	$wp_customize->add_setting(
		'advertising_title',
		array(
			'default'           => get_bloginfo( 'name' ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advertising_title',
		array(
			'section'           => ACT_THEME_SLUG . '_advertising',
			'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'advertising_excerpt',
		array(
			'default'           => get_bloginfo( 'description' ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'advertising_excerpt',
		array(
			'section'           => ACT_THEME_SLUG . '_advertising',
			'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'textarea',
		)
	); /**/

	$wp_customize->add_setting(
		'advertising_label',
		array(
			'default'           => __( 'Нажмите, чтобы воспроизвести видео', ACT_THEME_TEXTDOMAIN ),
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'advertising_label',
		array(
			'section'           => ACT_THEME_SLUG . '_advertising',
			'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'advertising_video',
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_url',
		)
	);
	$wp_customize->add_control(
		'advertising_video',
		array(
			'section'           => ACT_THEME_SLUG . '_advertising',
			'label'             => __( 'Ссылка на Youtube видео', ACT_THEME_TEXTDOMAIN ),
			'type'              => 'text',
		)
	); /**/

	$wp_customize->add_setting(
		'advertising_bgi',
			array(
				'default'           => ACT_THEME_URL . 'images/advertising.jpg',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_url',
			)
		);
	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'advertising_bgi',
			array(
				'label'      => __( 'Фон', ACT_THEME_TEXTDOMAIN ),
				'section'    => ACT_THEME_SLUG . '_advertising',
				'settings'   => 'advertising_bgi',
			)
		)
	); /**/

	$wp_customize->add_setting(
		'advertising_text_color',
		array(
			'default'           => '#ffffff',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_hex_color',
		)
	);
	$wp_customize->add_control( 
		new \WP_Customize_Color_Control( 
		$wp_customize, 
		'advertising_text_color',
		array(
			'label'      => __( 'Цвет текста и кнопки Play', ACT_THEME_TEXTDOMAIN ),
			'section'    => ACT_THEME_SLUG . '_advertising',
			'settings'   => 'advertising_text_color',
		) ) 
	);

}

add_action( 'customize_register', 'act_theme\customizer_register_home_advertising', 10, 1 );