<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_socials( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_socials',
		array(
			'title'            => __( 'Социальные сети', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 50,
			'description'      => __( 'Список ссылок на страницы социальных сетей организации', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	foreach ( array(
		'facebook'  => __( 'Facebook', ACT_THEME_TEXTDOMAIN ),
		'linkedin'  => __( 'LinkedIn', ACT_THEME_TEXTDOMAIN ),
		'instagram' => __( 'Instagram', ACT_THEME_TEXTDOMAIN ),
		'youtube'   => __( 'YouTube', ACT_THEME_TEXTDOMAIN ),
	) as $key => $label ) {
		$wp_customize->add_setting(
			"socials[{$key}]",
			array(
				'default'           => '',
				'transport'         => 'reset',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			"socials[{$key}]",
			array(
				'section'           => ACT_THEME_SLUG . '_list_socials',
				'label'             => $label,
				'type'              => 'text',
			)
		); /**/
	}

}

add_action( 'customize_register', 'act_theme\customizer_register_list_socials', 10, 1 );