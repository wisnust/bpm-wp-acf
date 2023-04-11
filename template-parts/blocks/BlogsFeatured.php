<?php
/**
 * Blogs Featured
 */
if( isset( $block['data']['blogs_featured_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['blogs_featured_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'blogs-featured-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'blogs-featured section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$blogFeaturedTitle = get_field('blog_featured_title');
$blogFeaturedDescription = get_field('blog_featured_description');
$blogFeaturedPosts = get_field('blog_featured_posts');
?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="blogs-featured-title text-center">
      <?php if ( $blogFeaturedTitle ): ?>
        <h2 class="d-inline-block">
          <?php echo $blogFeaturedTitle; ?>
          <div class="title-line reverse"></div>
        </h2>
      <?php endif; ?>
      <?php if ( $blogFeaturedDescription ): ?>
        <?php echo $blogFeaturedDescription; ?>
      <?php endif; ?>
    </div>
    <?php
    if( $blogFeaturedPosts ):
    ?>
    <div class="blogs-grid">
      <div class="row">
        <?php foreach( $blogFeaturedPosts as $post ): 
        setup_postdata($post);
        $permalink = get_permalink( $post->ID );
        $title = get_the_title( $post->ID ); ?>
        <div class="col-md-4">
          <div class="blogs-grid-item">
            <?php if ( has_post_thumbnail($post->ID) ) : ?>
            <a href="<?php the_permalink(); ?>" class="featured-image">
                <?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
            </a>
            <?php endif; ?>
            <p class="post-date"><?php echo get_the_date(); ?></p>
            <h2 class="h5"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h2>
            <a href="<?php the_permalink(); ?>" class="btn-link">Learn More <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <?php wp_reset_postdata(); endif; ?>
    <div class="btn-cta text-center">
      <a href="/blogs" class="btn btn-green">View All Blogs <i class="fa fa-arrow-right"></i></a>
    </div>
  </div>
</section>
<?php
endif;