<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="col-xs-12 col-sm-5 col-md-5 col-lg-3 col-lg-offset-0">
	<div class="wrap">
		<div class="directions__item item">

			<?php if ( ! empty( $icon ) ) : ?>
				<div class="icon">
					<img class="lazy" src="#" data-src="<?php echo esc_attr( $icon ); ?>" alt="<?php echo esc_attr( $title ); ?>">
				</div>
			<?php endif; ?>

			<?php if ( ! empty( $title ) ) : ?>
				<h3 class="title">
					<?php echo $title; ?>
				</h3>
			<?php endif; ?>

			<?php if ( ! empty( $excerpt ) ) : ?>
				<p class="excerpt">
					<?php echo $excerpt; ?>
				</p>
			<?php endif; ?>

		</div>
	</div>
</div>