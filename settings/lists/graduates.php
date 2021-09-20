<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
    "{$slug}_list_graduates",
    array(
        'title'            => __( 'Выпускники', ACT_THEME_TEXTDOMAIN ),
        'priority'         => 10,
        'description'      => __( 'Список выпускников, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
        'panel'            => "{$slug}_lists",
    )
); /**/



$wp_customize->add_setting(
    'graduates_number',
    array(
        'default'           => 3,
        'transport'         => 'reset',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'graduates_number',
    array(
        'section'           => "{$slug}_list_graduates",
        'label'             => __( 'Количество записей', ACT_THEME_TEXTDOMAIN ),
        'type'              => 'number',
        'input_attrs'       => array(
            'min'             => '1',
            'min'             => '10',
        ),
    )
); /**/



for ( $i=0; $i < get_theme_mod( 'graduates_number', 3 ); $i++ ) {
    $wp_customize->add_setting(
        "graduates[{$i}][foto]",
            array(
                'default'           => ACT_THEME_URL . 'images/user.png',
                'transport'         => 'reset',
                'sanitize_callback' => 'sanitize_url',
            )
        );
    $wp_customize->add_control(
        new \WP_Customize_Image_Control(
            $wp_customize,
            "graduates[{$i}][foto]",
            array(
                'label'      => sprintf( __( 'фото №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
                'section'    => "{$slug}_list_graduates",
                'settings'   => "graduates[{$i}][foto]",
            )
        )
    ); /**/
    $wp_customize->add_setting(
        "graduates[{$i}][name]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        "graduates[{$i}][name]",
        array(
            'section'           => "{$slug}_list_graduates",
            'label'             => sprintf( __( 'имя №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
            'type'              => 'text',
        )
    ); /**/
    $wp_customize->add_setting(
        "graduates[{$i}][specialty]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        "graduates[{$i}][specialty]",
        array(
            'section'           => "{$slug}_list_graduates",
            'label'             => sprintf( __( 'специальность №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
            'type'              => 'text',
        )
    ); /**/
    $wp_customize->add_setting(
        "graduates[{$i}][excerpt]",
        array(
            'default'           => '',
            'transport'         => 'reset',
            'sanitize_callback' => 'sanitize_textarea_field',
        )
    );
    $wp_customize->add_control(
        "graduates[{$i}][excerpt]",
        array(
            'section'           => "{$slug}_list_graduates",
            'label'             => sprintf( __( 'описание №%d', ACT_THEME_TEXTDOMAIN ), ( $i + 1 ) ),
            'type'              => 'textarea',
        )
    ); /**/
}