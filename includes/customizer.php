<?php



//



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
	) as $file_name ) {
		include get_theme_file_path( "customizer/home/{$file_name}.php" );
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
	) as $file_name ) {
		include get_theme_file_path( "customizer/lists/{$file_name}.php" );
	}

	// include get_theme_file_path( 'customizer/home/teachers.php' );
	// include get_theme_file_path( 'customizer/home/indicators.php' );
	// include get_theme_file_path( 'customizer/home/steps.php' );
	// include get_theme_file_path( 'customizer/home/cources.php' );
	// include get_theme_file_path( 'customizer/home/graduates.php' );
	// include get_theme_file_path( 'customizer/home/advantages.php' );
	// include get_theme_file_path( 'customizer/home/questions.php' );
	// include get_theme_file_path( 'customizer/404.php' );
}

add_action( 'customize_register', 'act_theme_customizer', 10, 1 );