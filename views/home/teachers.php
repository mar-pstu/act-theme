<?php


namespace act_theme;


if ( ! defined( 'ABSPATH' ) ) { exit; };


?>

<section class="section teachers" id="teachers">

	<div class="container">

		<?php if ( ! empty( $title ) ) : ?>
			<h2><?php echo $title ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $subtitle ) ) : ?>
			<p><?php echo $subtitle; ?></p>
		<?php endif; ?>

		<?php if ( ! empty( $teachers ) ) : ?>
			<div id="teachers-list">
				<?php echo $teachers; ?>
			</div>
			<div class="slider-controls" id="teachers-controls">
				<button class="slider-arrow arrow-prev" id="teachers-prev"></button>
				<button class="slider-arrow arrow-next" id="teachers-next"></button>
			</div>
		<?php endif; ?>

		<div class="box">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md">
					<h3><?php echo $description; ?></h3>
					<?php echo $content; ?>
					<p>
						<a class="btn btn-success" href="#"><?php echo $label; ?></a>
					</p>
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