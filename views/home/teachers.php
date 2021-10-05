<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="section teachers" id="teachers">

	<div class="container">

		<?php if ( ! empty( $title ) ) : ?>
			<h2 id="teachers-title"><?php echo $title ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $excerpt ) ) : ?>
			<p id="teachers-excerpt"><?php echo $excerpt; ?></p>
		<?php endif; ?>

		<?php if ( isset( $content ) && ! empty( $content ) ) : ?>
			<div id="teachers-description">
				<?php echo $content; ?> 
			</div>
		<?php endif; ?>

		<div class="box">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md">
					
					<?php if ( isset( $subtitle ) && ! empty( $subtitle ) ) : ?>
						<h3 id="teachers-subtitle"><?php echo $subtitle; ?></h3>
					<?php endif; ?>

					<?php if ( isset( $description ) && ! empty( $description ) ) : ?>
						<div id="teachers-description">
							<?php echo $description; ?>
						</div>
					<?php endif; ?>

					<?php if ( ! empty( $permalink ) ) : ?>
						<p><a id="teachers-permalink" class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a></p>
					<?php endif; ?>

				</div>

				<?php if ( isset( $socials_list ) && ! empty( $socials_list ) ) : ?>
					<div class="col-xs-12 col-sm-11 col-md-4">
						
						<?php if ( isset( $socials_title ) && ! empty( $socials_title ) ) : ?>
							<h3 id="teachers-socials-title"><?php echo $socials_title; ?></h3>
						<?php endif; ?>

						<?php echo $socials_list; ?>

					</div>
				<?php endif; ?>

			</div>
		</div>

	</div>

</section>