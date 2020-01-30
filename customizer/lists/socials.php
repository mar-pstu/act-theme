<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



$wp_customize->add_section(
	"{$slug}_socials",
	array(
		'title'            => __( 'Социальные сети', ACT_THEME_TEXTDOMAIN ),
		'priority'         => 10,
		'description'      => __( 'Список ссылок на страницы социальных сетей организации', ACT_THEME_TEXTDOMAIN ),
		'panel'            => "{$slug}_lists",
	)
); /**/



foreach ( array(
	'facebook'  => __( 'Facebook', ACT_THEME_TEXTDOMAIN ),
	'linkedin'  => __( 'LinkedIn', ACT_THEME_TEXTDOMAIN ),
	'instagram' => __( 'Instagram', ACT_THEME_TEXTDOMAIN ),
	'youtube'   => __( 'YouTube', ACT_THEME_TEXTDOMAIN ),
) as $key => $label ) {
	$wp_customize->add_setting(
		"{$slug}_socials[{$key}]",
		array(
			'default'           => '',
			'transport'         => 'reset',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		"{$slug}_socials[{$key}]",
		array(
			'section'           => "{$slug}_socials",
			'label'             => $label,
			'type'              => 'text',
		)
	); /**/
}