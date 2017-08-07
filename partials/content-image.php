<?php
// =============================================================================
// index.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @subpackage Image post format
 * @author Sergio Pomárico
 * @version 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-post-image');?> >
	<?php $feature_image = sunset_get_attachment(); ?>
	<header class="entry-header text-center col-sm-12 bg-header" style="background-image: url('<?php echo $feature_image; ?>')">
		<?php the_title('<h1 class="entry-title"><a href="'.get_the_permalink().'">','</a></h1>'); ?>
		<div class="entry-meta">
			<?php echo sunset_posted_meta(); ?>
		</div><!-- .entry-meta -->
		<div class="entry-excerpt col-sm-12 image-caption">
			<?php the_excerpt(); ?>
		</div><!-- .entry-excerpt -->
	</header><!-- .entry-header -->
	<footer class="entry-footer">
		<?php echo sunset_posted_footer(); ?>
	</footer><!-- .entry-footer -->
</article>