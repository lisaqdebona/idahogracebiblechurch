<?php
/**
 * The template for displaying the 404 template in the Idaho Grace theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Idaho Grace 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<div class="section-inner thin error404-content">

		<h1 class="entry-title"><?php _e( 'Page Not Found', 'idahograce' ); ?></h1>

		<div class="intro-text"><p><?php _e( 'The page you were looking for could not be found. It might have been removed, renamed, or did not exist in the first place.', 'idahograce' ); ?></p></div>

		<?php
		get_search_form(
			array(
				'label' => __( '404 not found', 'idahograce' ),
			)
		);
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
