<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Best_Practice_Media
 */

get_header();
?>

	<main id="primary" class="blog-single">
		<?php
			while ( have_posts() ) :
				the_post();
			?>
		<div class="container">
			<div class="blog-single-header">
				<?php if ( has_post_thumbnail() ) :
					$featured_img_url = get_the_post_thumbnail_url(); ?>
					<div class="bg-image" style="background-image: url(<?php echo $featured_img_url; ?>)"></div>
				<?php endif; ?>
			</div>
			<div class="blog-single-content">
				<h1><?php the_title(); ?> <div class="title-line"></div></h1>
				<?php echo the_content(); ?>
				<div class="social-sharer">
					<p>Share On</p>
					<?php
						$sb_url = urlencode(get_permalink());
						$sb_title = str_replace( ' ', '%20', get_the_title());
						
						$twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=wpvkp';
						$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
						$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;
		
						echo '<a href="'.$facebookURL.'" target="_blank" rel="nofollow"><i class="fab fa-facebook-f"></i></a>';
						echo '<a href="'. $twitterURL .'" target="_blank" rel="nofollow"><i class="fab fa-twitter"></i></a>';
						echo '<a href="'.$linkedInURL.'" target="_blank" rel="nofollow"><i class="fab fa-linkedin-in"></i></a>';
					?>
				</div>
			</div>
		</div>
		<?php
			// get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
		?>
	</main>

<?php
get_footer();