<?php
/**
 * Template Name: Homepage Template
 * Template Post Type: post, page
 *
 */
get_header();
?>

<main id="site-content" class="homepage" role="main">

	<?php if ( have_posts() ) { ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>

	<?php } ?>

</main><!-- #site-content -->

<?php get_footer(); ?>
