<?php
// =============================================================================
// index.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @subpackage video post format
 * @author Sergio Pomárico
 * @version 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-post-video');?> >
	<header class="entry-header text-center col-sm-12 text-center">
		<div class="embed-responsive embed-responsive-16by9">
			<?php echo sunset_get_embed_media(array('video','iframe')) ?>
		</div>
		<?php the_title('<h1 class="entry-title"><a href="'.get_the_permalink().'">','</a></h1>'); ?>
		<div class="entry-meta">
			<?php echo sunset_posted_meta(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
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