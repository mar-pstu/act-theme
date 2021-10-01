<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


function customizer_register_list_graduates( $wp_customize ) {

	$wp_customize->add_section(
		ACT_THEME_SLUG . '_list_graduates',
		array(
			'title'            => __( 'Выпускники', ACT_THEME_TEXTDOMAIN ),
			'priority'         => 90,
			'description'      => __( 'Список выпускников, выводится на главной странице.', ACT_THEME_TEXTDOMAIN ),
			'panel'            => 'template_lists',
		)
	); /**/

	$wp_customize->add_setting(
		'graduates',
		[
			'transport'         => 'postMessage',
			'sanitize_callback' => function ( $data ) {
				$result = array_filter( array_map( function ( $value ) {
					return parse_only_allowed_args(
						[ 'usedby' => '', 'title' => '', 'foto' => [], 'page_id' => '' ],
						$value,
						[ 'act_theme\sanitize_checkbox', 'sanitize_text_field', 'act_theme\sanitize_attachment_data', 'sanitize_text_field', 'sanitize_textarea_field' ]
					);
				}, json_decode( $data, true ) ) );
				return ( is_array( $result ) ) ? wp_json_encode( $result, JSON_UNESCAPED_UNICODE ) : '[]';
			},
		]
	);
	$wp_customize->add_control(
		new WP_Customize_Control_list(
			$wp_customize,
			'graduates',
			[
				'label'      => __( 'Список', ACT_THEME_TEXTDOMAIN ),
				'section'    => ACT_THEME_SLUG . '_list_graduates',
				'type'       => 'list',
				'controls'   => [
					'foto'      => [
						'type'     => 'image',
						'label'    => __( 'Фото с соотношением сторон 3:4', ACT_THEME_TEXTDOMAIN ),
					],
					'specialty' => [
						'type'     => 'text',
						'label'    => __( 'Специальность', ACT_THEME_TEXTDOMAIN ),
						'post_type' => 'pages',
					],
					'excerpt' => [
						'type'     => 'textarea',
						'label'    => __( 'Описание', ACT_THEME_TEXTDOMAIN ),
						'post_type' => 'pages',
					],
				],
			]
		)
	);
	$wp_customize->selective_refresh->add_partial( 'graduates', [
		'selector'         => '#graduates-list',
		'render_callback'  => function () {
			return customizer_render_parts_element_by_id( 'parts/home', 'graduates', [], 'graduates-list' );
		},
		'container_inclusive' => true,
		'fallback_refresh' => true,
	] ); /**/

}

add_action( 'customize_register', 'act_theme\customizer_register_list_graduates', 10, 1 );