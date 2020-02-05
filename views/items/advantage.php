<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="col-xs-12 col-sm-5 col-md-4">
	<div class="advantages__item item" role="listitem">
		<div class="row middle-xs">
			<div class="col-xs-3 col-sm-3 col-md-3 col-md-2">
				<img class="icon lazy" src="#" data-src="<?php echo esc_attr( $icon ); ?>" alt="<?php echo esc_attr( $title ); ?>">
			</div>
			<div class="col-xs-9 col-sm-9 col-md-6 col-md-6">
				<h3><?php echo $title; ?></h3>
			</div>
		</div>
		<?php if ( ! empty( $excerpt ) ) : ?><p class="excerpt"><?php echo $excerpt; ?></p><?php endif; ?>
	</div>
</div>