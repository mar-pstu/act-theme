<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="about" id="about">
	<div class="container">
		<div class="row middle-md center-xs">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
				<div class="overlay">
					<?php if ( ! empty( $title ) ) : ?>
						<h2 class="title">
							<?php echo $title; ?>
						</h2>
					<?php endif; ?>
					<div class="content">
						<?php echo $content; ?>
					</div>
					<?php if ( ! empty( $permalink ) ) : ?>
						<a class="permalink" href="<?php echo esc_attr( $permalink ); ?>">
							<?php echo $label ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
			<?php if ( ! empty( $thumbnail_src ) ) : ?>
				<div class="col-xs-12 col-sm-5 col-md-5 col-lg-6 first-xs">
					<img class="thumbnail lazy" src="#" data-src="<?php echo esc_attr( $thumbnail_src ); ?>">
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>