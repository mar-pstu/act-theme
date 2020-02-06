<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="graduates__item item">
	<div class="row middle-xs">
		<div class="col-xs-12 col-sm-4">
			<img class="foto" src="#" data-lazy="<?php echo $foto; ?>" alt="<?php echo esc_attr( $name ); ?>">
		</div>
		<div class="col-xs-12 col-sm-8">
			<div class="overlay">
				<h3 class="name"><?php echo $name; ?></h3>
				<?php if ( ! empty( $specialty ) ) : ?><p class="specialty"><?php echo $specialty; ?></p><?php endif; ?>
				<?php if ( ! empty( $excerpt ) ) : ?><p class="excerpt"><?php echo $excerpt; ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>