<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



/**
 * Перевод сблоков
 * */
foreach ( array(
    'error404_title'        => __( 'Ошибка 404', ACT_THEME_TEXTDOMAIN ),
    'error404_description'  => '',
    'about_title'           => __( 'О нас', ACT_THEME_TEXTDOMAIN ),
    'about_label'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'advantages_title'      => __( 'Преимущества обучения на кафедре', ACT_THEME_TEXTDOMAIN ),
    'advantages_subtitle'   => '',
    'advantages_label'      => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'advertising_title'     => get_bloginfo( 'name' ),
    'advertising_excerpt'   => get_bloginfo( 'description' ),
    'advertising_label'     => __( 'Нажмите, чтобы воспроизвести видео', ACT_THEME_TEXTDOMAIN ),
    'cources_title'         => __( 'Курсы', ACT_THEME_TEXTDOMAIN ),
    'cources_subtitle'      => '',
    'cources_label'         => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'directions_title'      => __( 'Направления работы', ACT_THEME_TEXTDOMAIN ),
    'directions_subtitle'   => '',
    'directions_label'      => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'graduates_title'       => __( 'Выпускники', ACT_THEME_TEXTDOMAIN ),
    'graduates_subtitle'    => '',
    'graduates_label'       => '',
    'jumbotron_title'       => get_bloginfo( 'name' ),
    'jumbotron_description' => get_bloginfo( 'description' ),
    'jumbotron_label'       => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'jumbotron_permalink'   => '',
    'questions_title'       => __( 'Остались вопросы?', ACT_THEME_TEXTDOMAIN ),
    'questions_subtitle'    => __( 'Напишите нам, мы с Вами обязательно свяжемся.', ACT_THEME_TEXTDOMAIN ),
    'questions_shortcode'   => '[contacts_form]',
    'questions_label'       => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'specialties_title'     => __( 'Специальности', ACT_THEME_TEXTDOMAIN ),
    'specialties_subtitle'  => '',
    'steps_title'           => __( 'Шаги к поступлению', ACT_THEME_TEXTDOMAIN ),
    'steps_subtitle'        => '',
    'steps_label'           => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'teachers_title'        => __( 'Преподаватели', ACT_THEME_TEXTDOMAIN ),
    'teachers_excerpt'      => '',
    'teachers_subtitle'     => '',
    'teachers_label'        => __( 'Подробней', ACT_THEME_TEXTDOMAIN ),
    'teachers_socials'      => __( 'Мы в социальных сетях', ACT_THEME_TEXTDOMAIN ),
) as $key => $default ) {
    $value = wp_strip_all_tags( get_theme_mod( ACT_THEME_SLUG . '_' . $key, $default ) );
    if ( ! empty( $value ) ) {
        pll_register_string( $key, $value, ACT_THEME_TEXTDOMAIN, false );
    }
}



/**
 * Перевод "списков"
 **/
foreach ( array(
	'advantages' => array(
		'fields'     => array( 'title', 'excerpt' ),
		'number'     => 3,
	),
	'cources'    => array(
		'fields'     => array( 'title', 'excerpt', 'link' ),
		'number'     => 4,
	),
	'directions' => array(
		'fields'     => array( 'title', 'excerpt' ),
		'number'     => 4,
	),
	'features'   => array(
		'fields'     => array( 'title' ),
		'number'     => 3,
	),
	'graduates'  => array(
		'fields'     => array( 'name', 'specialty', 'excerpt' ),
		'number'     => 3,
	),
	'indicators' => array(
		'fields'     => array( 'label', 'value' ),
		'number'     => 4,
	),
	'specialties'=> array(
		'fields'     => array( 'title', 'link' ),
		'number'     => 3,
	),
	'steps'      => array(
		'fields'     => array( 'title', 'excerpt', 'link' ),
		'number'     => 3,
	),
	'teachers'   => array(
		'fields'     => array( 'name', 'excerpt' ),
		'number'     => 3,
	),
) as $key => $args ) {
	$items = get_theme_mod( ACT_THEME_SLUG . '_' . $key, __return_empty_array() );
	if ( is_array( $items ) && ! empty( $items ) ) {
		for ( $i = 0; $i < get_theme_mod( ACT_THEME_SLUG . '_' . $key . '_number', $args[ 'number' ] ); $i++ ) {
			foreach ( $args[ 'fields' ] as $field ) {
				if ( isset( $items[ $i ][ $field ] ) && ! empty( trim( $items[ $i ][ $field ] ) ) ) {
					pll_register_string( "{$key}_{$i}_{$field}", $items[ $i ][ $field ], ACT_THEME_TEXTDOMAIN, false );
				}
			}
		}
	}
}



/**
 * Регистрация ссылок на социальные сети
 **/
$socials = get_theme_mod( ACT_THEME_SLUG . "_socials", array() );
if ( is_array( $socials ) && ! empty( $socials ) ) {
	foreach ( $socials as $key => $link ) {
		if ( ! empty( trim( $link ) ) ) {
			pll_register_string( "socials_{$key}", $link, ACT_THEME_TEXTDOMAIN, false );
		}
	}
}