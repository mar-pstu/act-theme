
<?php if ( ! defined( 'ABSPATH' ) ) { exit; }; ?>

<h1 class="mt-2 mb-2"><?php the_archive_title(); ?></h1>
<?php act_theme\the_breadcrumb(); ?>

<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<article <?php post_class( 'archive__entry entry', get_the_ID() ); ?> id="post-<?php the_ID(); ?>">
			<div class="row center-xs">
				<?php if ( has_post_thumbnail( get_the_ID() ) ) : ?>
					<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
						<a class="entry__thumbnail thumbnail" href="<?php the_permalink( get_the_ID() ); ?>">
							<img class="lazy wp-post-thumbnail" src="#" data-src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'medium' ); ?>" alt="<?php the_title_attribute( array( 'post' => get_the_ID() ) ); ?>"/>
						</a>
					</div>
				<?php endif; ?>
				<div class="col-xs-12 col-sm-8 col-md col-lg">
					<h3 class="entry__title title"><?php the_title( '', '', true ); ?></h3>
					<div class="entry__excerpt excerpt"><?php the_excerpt(); ?></div>
					<p class="text-right">
						<a class="entry__permalink permalink" href="<?php the_permalink( get_the_ID() ); ?>"><?php _e( 'Подробней', ACT_THEME_TEXTDOMAIN ); ?></a>
					</p>
				</div>
			</div>
		</article>

	<?php endwhile; ?>

	<?php the_posts_pagination(); ?>
<?php else : ?>

	<p><?php _e( 'Записи не найдены', ACT_THEME_TEXTDOMAIN ); ?></p>

<?php endif; ?>