<?php
// =============================================================================
// index.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @subpackage audio post format
 * @author Sergio Pomárico
 * @version 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-post-audio');?> >
	<header class="entry-header col-sm-12">
		<?php the_title('<h1 class="entry-title"><a href="'.get_the_permalink().'">','</a></h1>'); ?>
		<div class="entry-meta">
			<?php echo sunset_posted_meta(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<div class="entry-content">
	<?php echo sunset_get_embed_media(array('audio','iframe')) ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php echo sunset_posted_footer(); ?>
	</footer><!-- .entry-footer -->
</article>