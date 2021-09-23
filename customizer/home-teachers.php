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
            'transport'         => 'reset',
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
    ); /**/

    $wp_customize->add_setting(
        'teachers_title',
        array(
            'default'           => __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ),
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        'teachers_title',
        array(
            'section'           => ACT_THEME_SLUG . '_teachers',
            'label'             => __( 'Заголовок', ACT_THEME_TEXTDOMAIN ),
            'type'              => 'textarea',
        )
    ); /**/

    $wp_customize->add_setting(
        'teachers_excerpt',
        array(
            'default'           => '',
            'transport'         => 'reset',
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
    ); /**/

    $wp_customize->add_setting(
        'teachers_subtitle',
        array(
            'default'           => '',
            'transport'         => 'reset',
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
    ); /**/

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

    $wp_customize->add_setting(
        'teachers_page_id',
        array(
            'default'           => '',
            'transport'         => 'reset',
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
    ); /**/

    $wp_customize->add_setting(
        'teachers_label',
        array(
            'default'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
            'transport'         => 'reset',
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
    ); /**/

    $wp_customize->add_setting(
        'teachers_socials',
        array(
            'default'           => __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ),
            'transport'         => 'reset',
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
    ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_home_teachers', 10, 1 );