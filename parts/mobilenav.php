<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<div class="mobilenav" id="mobilenav">

	<div class="bg" id="bg"></div>

	<div class="overlay">

		<button class="close" id="close"><span class="sr-only"><?php _e( 'Закрыть меню', ACT_THEME_TEXTDOMAIN ); ?></span></button>
		
		<div class="text-right"><?php echo get_languages_list(); ?></div>

		<?php
			if ( has_nav_menu( 'mobile' ) ) {
				echo '<h3>', __( 'Меню', ACT_THEME_TEXTDOMAIN ), '</h3>';
			}
			wp_nav_menu( array(
				'theme_location'  => 'mobile',
				'menu'            => 'mobile',
				'container'       => 'nav',
				'container_class' => 'nav',
				'container_id'    => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'echo'            => true,
				'depth'           => 2,
			) );
			if ( is_dynamic_sidebar( 'mobile' ) ) {
				get_sidebar( 'mobile' );
			}
		?>

	</div>
</div>