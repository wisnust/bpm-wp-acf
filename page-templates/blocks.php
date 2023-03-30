<?php
/**
 * Template Name: Blocks Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fivetoolagency
 */


// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

    <main id="blocks-page" class="blocks-page">
		<?php 
		while ( have_posts() ) : the_post();
				the_content();
			endwhile;
			wp_reset_postdata();
		?>

	</main>

<?php get_footer(); ?>