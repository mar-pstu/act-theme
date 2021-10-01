<?php 


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>


<?php if ( isset( $entry ) && is_array( $entry ) && ! empty( $entry ) && array_key_exists( 'usedby', $entry ) && $entry[ 'usedby' ] ) : ?>
	<div class="graduates__item item">
		<div class="row middle-xs">

			<?php if ( array_key_exists( 'foto', $entry ) && is_array( $entry[ 'foto' ] ) && array_key_exists( 'id', $entry[ 'foto' ] ) ) : ?>
				<div class="col-xs-12 col-sm-4">
					<?php echo wp_get_attachment_image( $entry[ 'foto' ][ 'id' ], 'medium', false, [ 'class' => 'foto' ] ); ?>
				</div>
			<?php endif; ?>

			<div class="col-xs-12 col-sm-8">
				<div class="overlay">

					<?php if ( array_key_exists( 'title', $entry ) && ! empty( trim( $entry[ 'title' ] ) ) ) : ?>
						<h3 class="name"><?php echo $entry[ 'title' ]; ?></h3>
					<?php endif; ?>
					
					<?php if ( array_key_exists( 'specialty', $entry ) && ! empty( trim( $entry[ 'specialty' ] ) ) ) : ?>
						<p class="specialty"><?php echo $entry[ 'specialty' ]; ?></p>
					<?php endif; ?>
					
					<?php if ( array_key_exists( 'excerpt', $entry ) && ! empty( trim( $entry[ 'excerpt' ] ) ) ) : ?>
						<p class="excerpt"><?php echo $entry[ 'excerpt' ]; ?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>
<?php endif; ?>