<?php
// =============================================================================
// index.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */

?>

<?php get_header(); ?>
<div id="primary" class="content-area">
	<main class="site-main" role="main">
		<div class="container">
			<div class="row">
			<?php if (have_posts()): ?>	
				<?php while(have_posts()): the_post() ?>
					<?php get_template_part( 'partials/content', get_post_format()); ?>
				<?php endwhile; ?>	
			<?php endif ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</main><!-- .site-main -->
</div><!-- .primary -->
<?php get_footer(); ?>