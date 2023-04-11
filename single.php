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
				<div class="clearfix"></div>
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

		<div class="related-posts section">
			<div class="container">
				<div class="related-posts-title text-center">
					<h2 class="d-inline-block">
						Related Post
						<div class="title-line reverse"></div>
					</h2>
				</div>
				<?php
				$post_id = get_the_ID();
				$categories = wp_get_post_categories( $post_id );
				$cat_ids = array();
				foreach( $categories as $individual_cat ) $cat_ids[] = $individual_cat;
				$args = array(
						'category__in' => $cat_ids,
						'post_type' => 'post',
						'post_status' => 'publish',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => 3,
						'post__not_in' => array( $post_id )
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) :
				?>
				<div class="blogs-grid">
					<div class="row">
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-md-4">
							<div class="blogs-grid-item">
								<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>" class="featured-image">
										<?php the_post_thumbnail( 'large' ); ?>
								</a>
								<?php endif; ?>
								<p class="post-date"><?php echo get_the_date(); ?></p>
								<h2 class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<a href="<?php the_permalink(); ?>" class="btn-link">Learn More <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
						<?php endwhile; ?>
					</div>
				</div>
				<?php endif; wp_reset_postdata(); ?>
				<div class="btn-cta text-center">
					<a href="/blogs" class="btn btn-green">View All Blogs <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
		
		<?php
			endwhile;
		?>
	</main>

<?php
get_footer();