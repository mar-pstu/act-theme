<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="col-xs-12 col-sm-7 col-md-4">

	<div class="wrap">

		<div class="cources__entry entry" role="listitem">

			<h3 class="title"><?php echo $title; ?></h3>

			<?php if ( $thumbnail ) : ?>
				<a class="thumbnail" href="#">
					<img class="wp-post-thumbnail lazy" src="#" data-src="<?php echo esc_attr( $thumbnail ); ?>" alt="Пользователь ПК">
				</a>
			<?php endif; ?>

			<?php if ( $excerpt ) : ?>
				<div class="excerpt"><?php echo $excerpt; ?></div>
			<?php endif; ?>

			<a class="permalink" href="<?php echo esc_attr( $link ); ?>">
				<?php _e( 'Подробней', ACT_THEME_TEXTDOMAIN ); ?>
			</a>

		</div>

	</div>

</div>