<?php
// =============================================================================
// index.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @subpackage Gallery post format
 * @author Sergio Pomárico
 * @version 1.0.0
 */

?>
<?php
	if(sunset_get_attachment()) $attachments = sunset_get_attachment(7);
	$slides = sunset_get_bs_slide($attachments);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('sunset-post-gallery');?> >
	<div id="post-gallery-<?php the_ID(); ?>" class="carousel slide sunset-carousel" data-ride="carousel">
		<div class="carousel-inner" role="listbox">
		<?php foreach ($slides as $slide): ?>
			<div class="item <?php echo $slide['class']?>">
				<img src="<?php echo $slide['url']; ?>" alt="<?php the_title();?>">
				<span class="hidden next-image-preview" data-image="<?php echo $slide['next_img']; ?>"></span>
				<span class="hidden prev-image-preview" data-image="<?php echo $slide['prev_img']; ?>"></span>
				<div class="entry-excerpt image-caption">
					<?php echo $slide['caption']; ?>
				</div>
			</div>
		<?php endforeach; ?>
		</div><!-- .corousel-inner -->
		<a class="left carousel-control vertical-center" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="prev">
			<div class="preview-container">
				<span class="thumbnail-container"></span>
				<span class="sunset sunset-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</div><!-- .preview-container -->
		</a><!-- .carousel-control -->
		<a class="right carousel-control vertical-center" href="#post-gallery-<?php the_ID(); ?>" role="button" data-slide="next">
			<div class="preview-container">
				<span class="thumbnail-container"></span>
				<span class="sunset sunset-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</div><!-- .preview-container -->
		</a><!-- .carousel-control -->
	</div><!-- .corousel -->
	<header class="entry-header text-center col-sm-12">
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