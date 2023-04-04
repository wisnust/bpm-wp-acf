<?php
/**
 * Hero
 */
if( isset( $block['data']['hero_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['hero_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$heroTitle = get_field('hero_title');
$heroDescription = get_field('hero_description');
$heroBgImage = get_field('hero_background_image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="wrapper" style="background-image: url(<?php echo $heroBgImage['url']; ?>)">
      <div class="section-title">
        <?php if ( $heroTitle ): ?>
          <h2>
            <?php echo $heroTitle; ?>
            <div class="title-line"></div>
          </h2>
        <?php endif; ?>
        <?php if ( $heroDescription ): ?>
          <?php echo $heroDescription; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php
endif;
?>



  

<section class="blog-lists section">
  <div class="container">
    <div class="section-title text-center">
      <h2 class="d-inline-block">
        What We Do
        <div class="title-line"></div>
      </h2>
      <p>Social media marketers. Facebook and Instagram experts. Google AdWords specialists. A trusted social studio. An outsourced digital dream team. When it comes to digital strategy, here are the ways we can help.</p>
    </div>
    <div class="blog-lists-items">
      <div class="row">
        <div class="col-md-3">
          <div class="blog-card">
            <a href="">
              <img src="" alt="">
            </a>
            <h5 class="date">28.2.2023</h5>
            <h3 class="h5">How to Audit Your Facebook Ad Account</h3>
            <a href="" class="btn-link">Learn More <i class="fa fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <div class="text-center">
        <a href="" class="btn btn-green">View All Blogs <i class="fa fa-arrow-right"></i></a>
      </div>
    </div>
  </div>
</section>