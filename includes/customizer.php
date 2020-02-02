<?php



if ( ! defined( 'ABSPATH' ) ) { exit; };



function act_theme_customizer( $wp_customize ) {
	
	$slug = ACT_THEME_SLUG;

	// подключение настроек домашней страницы
	$wp_customize->add_panel(
		"{$slug}_home",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Блоки главной страницы', ACT_THEME_TEXTDOMAIN ),
			'priority'        => 200
		)
	);

	foreach ( array(
		'jumbotron',     // первый экран
		'about',         // о нас
		'directions',    // направления работы
		'advertising',   // рекламное видео
		'specialties',   // специальности
		'teachers',      // преподватели
		'indicators',    // показатели работы
		'steps',         // шаги к поступлению
		'cources',       // курсы
		'graduates',     // выпускники
		'advantages'     // преимущества обучения на кафедре
	) as $file_name ) {
		include get_theme_file_path( "settings/home/{$file_name}.php" );
	}

	// подключение списков
	$wp_customize->add_panel(
		"{$slug}_lists",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Списки темы', ACT_THEME_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	
	foreach ( array(
		'feautures',
		'directions',
		'specialties',
		'teachers',
		'socials',
		'indicators',
		'steps',
		'cources',
		'graduates',
		'advantages',
	) as $file_name ) {
		include get_theme_file_path( "settings/lists/{$file_name}.php" );
	}

	// подключение настроек типов страниц
	$wp_customize->add_panel(
		"{$slug}_pages",
		array(
			'capability'      => 'edit_theme_options',
			'title'           => __( 'Типы страниц темы', ACT_THEME_TEXTDOMAIN ),
			'priority'        => 200
		)
	);
	
	foreach ( array(
		'404',
	) as $file_name ) {
		include get_theme_file_path( "settings/pages/{$file_name}.php" );
	}

}

add_action( 'customize_register', 'act_theme_customizer', 10, 1 );