<?php
/**
 * Testimonials Slider
 */
if( isset( $block['data']['testimonials_slider_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['testimonials_slider_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonials-slider section';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$testimonialsSliderTitle = get_field('testimonials_slider_title');
$testimonialsSliderItems = 'testimonials_slider_items';

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <?php if ( $testimonialsSliderTitle ): ?>
      <div class="testimonials-slider-title text-center">
        <h2 class="d-inline-block">
          <?php echo $testimonialsSliderTitle; ?>
          <div class="title-line reverse"></div>
          <img src="<?php bloginfo('template_url'); ?>/src/images/icon-quote.png" alt="icon quote">
        </h2>
      </div>
    <?php endif; ?>
    <?php if( have_rows( $testimonialsSliderItems ) ): ?>
      <div class="single-slider">
          <?php while( have_rows( $testimonialsSliderItems ) ): the_row(); 
          $quote = get_sub_field('quote');
          $author = get_sub_field('author');
          ?>
            <div class="slide-item">
              <div class="slide-content">
                <p><?php echo $quote; ?></p>
                <p class="quote-author"><?php echo $author; ?></p>
              </div>
            </div>
          <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
endif;
?>