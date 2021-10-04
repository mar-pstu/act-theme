<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="about" id="about">
	<div class="container">
		<div class="row middle-md center-xs">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-6">
				<div class="overlay">
					<div class="content">

						<?php if ( ! empty( $title ) ) : ?>
							<h2 id="about-title" class="title"><?php echo $title; ?></h2>
						<?php endif; ?>

						<?php if ( ! empty( $content ) ) : ?>						
							<div id="about-content"><?php echo $content; ?></div>
						<?php endif; ?>


						<?php if ( ! empty( $permalink ) ) : ?>
							<a id="about-permalink" class="permalink mt-2" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label ?></a>
						<?php endif; ?>

					</div>
				</div>
			</div>

			<?php if ( ! empty( $thumbnail_src ) ) : ?>
				<div id="about-thumbnail-wrap" class="col-xs-12 col-sm-5 col-md-5 col-lg-6 first-xs">
					<img id="about-thumbnail" class="thumbnail lazy" src="#" data-src="<?php echo esc_attr( $thumbnail_src ); ?>">
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>