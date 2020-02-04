<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="section teachers" id="teachers">

	<div class="container">

		<?php if ( ! empty( $title ) ) : ?>
			<h2><?php echo $title ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $excerpt ) ) : ?>
			<p><?php echo $excerpt; ?></p>
		<?php endif; ?>

		<?php echo $teachers; ?>

		<div class="box">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md">
					<?php if ( ! empty( $subtitle ) ) : ?>
						<h3><?php echo $subtitle; ?></h3>
					<?php endif; ?>
					<?php echo $content; ?>
					<?php if ( ! empty( $permalink ) ) : ?>
						<p>
							<a class="btn btn-success" href="<?php echo esc_attr( $permalink ); ?>"><?php echo $label; ?></a>
						</p>
					<?php endif; ?>
				</div>
				<?php if ( ! empty( $socials_list ) ) : ?>
					<div class="col-xs-12 col-sm-11 col-md-4">
						<h3><?php echo $socials_title; ?></h3>
						<?php echo $socials_list; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</div>

</section>