<?php
// =============================================================================
// index.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @subpackage standard post format
 * @author Sergio Pomárico
 * @version 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class();?> >
	<header class="entry-header text-center col-sm-12">
		<?php the_title('<h1 class="entry-title"><a href="'.get_the_permalink().'">','</a></h1>'); ?>
		<div class="entry-meta">
			<?php echo sunset_posted_meta(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if (has_post_thumbnail()): ?>
		<a href="<?php the_permalink(); ?>" class="standard-feature-link">
			<div class="standard-feature col-sm-12"><?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive']); ?></div>
		</a>
		<?php endif ?>
		<div class="entry-excerpt col-sm-12">
			<?php the_excerpt(); ?>
		</div><!-- .entry-excerpt -->
	</div><!-- .entry-content -->
	<div class="button-container col-sm-12 text-center">
		<a href="<?php the_permalink(); ?>" class="btn btn-sunset"><?php _e('Read More') ?></a>
	</div><!-- .button-container -->
	<footer class="entry-footer">
		<?php echo sunset_posted_footer(); ?>
	</footer><!-- .entry-footer -->
</article>