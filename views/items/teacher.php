<?php 

if ( ! defined( 'ABSPATH' ) ) { exit; };

?>

<div class="teachers__item item">
	<div class="wrap">
		<img class="foto" src="#" data-lazy="<?php echo esc_attr( $foto ); ?>" alt="<?php echo esc_attr( $name ); ?>">
		<div class="overlay">
			<h3 class="name"><?php echo $name; ?></h3>
			<?php if ( ! empty( $excerpt ) ) : ?><p class="excerpt"><?php echo $excerpt; ?></p><?php endif; ?>
		</div>
	</div>
</div>