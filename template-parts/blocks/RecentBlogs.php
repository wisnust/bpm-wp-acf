<?php
/**
 * Recent Blogs
 */
if( isset( $block['data']['recent_blogs_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['recent_blogs_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'recent-blogs-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'recent-blogs';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$recentBlogsTitle = get_field('recent_blogs_title');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="recent-blogs-title">
      <?php if ( $recentBlogsTitle ): ?>
        <h2 class="d-inline-block">
          <?php echo $recentBlogsTitle; ?>
          <div class="title-line reverse"></div>
        </h2>
      <?php endif; ?>
    </div>
    <?php
    $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 5,
        'paged' => $paged
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
    <div class="blogs-pagination">
      <?php
      $total_pages = $query->max_num_pages;
      if ( $total_pages > 1 ) {
        $current_page = max( 1, get_query_var('paged') );
        echo '<div class="nav-links">';
        echo paginate_links( array(
          'base' => get_pagenum_link(1) . '%_%',
          'format' => '/page/%#%',
          'current' => $current_page,
          'total' => $total_pages,
          'prev_text' => '<i class="fa fa-arrow-left"></i>',
          'next_text' => '<i class="fa fa-arrow-right"></i>',
          'type' => 'list'
        ) );
        echo '</div>';
      }
      ?>
    </div>
    <?php
    wp_reset_postdata();
    endif;
    ?>
  </div>
</section>
<?php
endif;