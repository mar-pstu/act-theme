<?php



namespace act_theme;



if ( ! defined( 'ABSPATH' ) ) { exit; };



?>

<div class="mobilenav" id="mobilenav">
	<div class="bg"></div>
	<div class="overlay">
		<div class="text-right">
			<?php echo get_languages_list(); ?>
		</div>
		<h3><?php _e( 'Меню', ACT_THEME_TEXTDOMAIN ); ?></h3>
		<div id="mobilenav-list"></div>
	</div>
</div>