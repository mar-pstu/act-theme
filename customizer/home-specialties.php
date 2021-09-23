<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_home_specialties( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_specialties',
		array(
			'title'            => sprintf( '%s - %s', __( 'Главная страница', ACT_THEME_TEXTDOMAIN ), __( 'Специальности', ACT_THEME_TEXTDOMAIN ) ),
			'priority'         => 50,
			'description'      => __( 'Пятая секция главной страницы. Якорь #specialties', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_parts',
		)
	); /**/

	$wp_customize->add_setting(
        'specialties_flag',
        array(
            'default'           => false,
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'specialties_flag',
        array(
            'section'           => ACT_THEME_SLUG . '_specialties',
            'label'             => __( 'Использовать секцию', ACT_THEME_TEXTDOMAIN ),
            'type'              => 'checkbox',
        )
    ); /**/

    $wp_customize->add_setting(
        'specialties_title',
        array(
            'default'           => __( 'Специальности', ACT_THEME_TEXTDOMAIN ),
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'specialties_title',
        array(
            'section'           => ACT_THEME_SLUG . '_specialties',
            'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
            'type'              => 'text',
        )
    ); /**/

    $wp_customize->add_setting(
        'specialties_subtitle',
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        'specialties_subtitle',
        array(
            'section'           => ACT_THEME_SLUG . '_specialties',
            'label'             => __( 'Подзаголовок', ACT_THEME_TEXTDOMAIN ),
            'type'              => 'textarea',
        )
    ); /**/

    $wp_customize->add_setting(
        'specialties_type',
        array(
            'default'           => 'list',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'specialties_type',
        array(
            'section'           => ACT_THEME_SLUG . '_specialties',
            'label'             => __( 'Тип содержимого', ACT_THEME_TEXTDOMAIN ),
            'type'              => 'select',
            'choices'           => array(
                'list'            => __( 'список', ACT_THEME_TEXTDOMAIN ),
                'content'         => __( 'контент', ACT_THEME_TEXTDOMAIN ),
            ),
        )
    ); /**/

    $wp_customize->add_setting(
        'specialties_page_id',
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'specialties_page_id',
        array(
            'section'           => ACT_THEME_SLUG . '_specialties',
            'label'             => __( 'Выбор страницы', ACT_THEME_TEXTDOMAIN ),
            'type'              => 'dropdown-pages',
        )
    ); /**/

    $wp_customize->add_setting(
        'specialties_label',
        array(
            'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'specialties_label',
        array(
            'section'           => ACT_THEME_SLUG . '_specialties',
            'label'             => __( 'Текст кнопки', ACT_THEME_TEXTDOMAIN ),
            'type'              => 'text',
        )
    ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_specialties', 10, 1 );