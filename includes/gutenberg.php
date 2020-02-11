<?php 

/**
 * Регистрация блоков Гутенберга
 */


if ( ! defined( 'ABSPATH' ) ) { exit; };


add_action( 'enqueue_block_assets', function () {

	if ( is_admin() && ( ! wp_doing_ajax() ) ) {
		wp_enqueue_script(
			'act-theme-gutenberg',
			ACT_THEME_URL . 'scripts/core-styles.js',
			array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
			filemtime( ACT_THEME_DIR . 'scripts/gutenberg.js' ),
			'in_footer'
		);

		wp_enqueue_script(
	        'act-theme-gutenberg',
			ACT_THEME_URL . 'scripts/richtext-button.js',
	        array( 'wp-element', 'wp-rich-text', 'wp-editor', 'wp-i18n' ),
	        filemtime( ACT_THEME_DIR . 'scripts/gutenberg.js' ),
			'in_footer'
	    );

	    wp_enqueue_style(
			'act-theme-gutenberg',
			ACT_THEME_URL . 'styles/gutenberg.css',
			array( 'wp-edit-blocks' ),
			filemtime( ACT_THEME_DIR . 'styles/gutenberg.css' )
		);
	}

} );



add_action( 'init', function() {

	wp_register_script(
		'act-theme-gutenberg',
		ACT_THEME_URL . 'scripts/gutenberg.js',
		array( 'wp-blocks', 'wp-element', 'wp-components', 'wp-editor', 'wp-i18n' ),
		filemtime( ACT_THEME_DIR . 'scripts/gutenberg.js' ),
		'in_footer'
	);

	wp_register_style(
		'act-theme-gutenberg',
		ACT_THEME_URL . 'styles/gutenberg.css',
		array( 'wp-edit-blocks' ),
		filemtime( ACT_THEME_DIR . 'styles/gutenberg.css' )
	);

	register_block_type( 'pstu-theme/clearfix', array(
		'editor_style' => 'act-theme-gutenberg',
		'editor_script' => 'act-theme-gutenberg',
	) );

	register_block_type( 'pstu-theme/accordio', array(
		'editor_style' => 'act-theme-gutenberg',
		'editor_script' => 'act-theme-gutenberg',
	) );

} );