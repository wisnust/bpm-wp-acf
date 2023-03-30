<?php
/**
 * Hero CTA
 */
if( isset( $block['data']['hero_cta_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['hero_cta_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-cta';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$heroCtaTitle = get_field('hero_cta_title');
$heroCtaLink = get_field('hero_cta_link');
$heroCtaImage = get_field('hero_cta_image');
$gridCtaTitle = get_field('grid_cta_title');
$gridCtaText = get_field('grid_cta_text');
$gridCtaLink = get_field('grid_cta_link');
$gridCtaImage = get_field('grid_cta_image');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="hero-cta-title">
      <?php if ( $heroCtaTitle ): ?>
        <h2 class="h1">
          <?php echo $heroCtaTitle; ?>
        </h2>
      <?php endif; ?>
      <?php if ( $heroCtaLink ): ?>
        <a class="btn btn-green" href="<?php echo esc_url($heroCtaLink['url']); ?>" target="<?php echo esc_attr($heroCtaLink['target'] ?: '_self'); ?>"><?php echo esc_html($heroCtaLink['title']); ?> <i class="fa fa-arrow-right"></i></a>
      <?php endif; ?>
      <?php 
      if( !empty( $heroCtaImage ) ): ?>
        <div class="image">
          <img src="<?php echo esc_url($heroCtaImage['url']); ?>" alt="<?php echo esc_attr($heroCtaImage['alt']); ?>" />
        </div>
      <?php endif; ?>
    </div>
    <div class="hero-cta-grid">
      <div class="row">
        <div class="col-md-6">
          <?php 
          if( !empty( $gridCtaImage ) ): ?>
            <div class="image">
              <img src="<?php echo esc_url($gridCtaImage['url']); ?>" alt="<?php echo esc_attr($gridCtaImage['alt']); ?>" />
            </div>
          <?php endif; ?>
        </div>
        <div class="col-md-6">
          <div class="hero-cta-grid-text grid-text">
            <?php if ( $gridCtaTitle ): ?>
              <h2>
                <?php echo $gridCtaTitle; ?>
                <div class="title-line"></div>
              </h2>
            <?php endif; ?>
            <?php if ( $gridCtaText ): ?>
              <?php echo $gridCtaText; ?>
            <?php endif; ?>
            <?php if ( $gridCtaLink ): ?>
              <a class="btn btn-green" href="<?php echo esc_url($gridCtaLink['url']); ?>" target="<?php echo esc_attr($gridCtaLink['target'] ?: '_self'); ?>"><?php echo esc_html($gridCtaLink['title']); ?> <i class="fa fa-arrow-right"></i></a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
endif;