<?php
/**
 * Contact Banner
 */
if( isset( $block['data']['contact_banner_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['contact_banner_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'banner-image-text-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner-image-text contact-banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$bannerImage = get_field('contact_banner_image');
$bannerTitle = get_field('contact_banner_content_title');
$bannerText = get_field('contact_banner_content_text');
$bannerButton = get_field('contact_banner_content_button');
$bannerBackground = get_field('contact_banner_content_background');
$bannerPhone = get_field('content_banner_phone');
$bannerEmail = get_field('contact_banner_email');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="banner-image-text-wrapper">
      <div class="row g-0">
        <div class="col-12 col-md-6">
          <?php 
          if( !empty( $bannerImage ) ): ?>
          <div class="banner-image-text-image" style="background-image: url(<?php echo esc_url($bannerImage['url']); ?>)"></div>
          <?php endif; ?>
        </div>
        <div class="col-12 col-md-6">
          <div class="banner-image-text-content" style="background-image: url(<?php echo esc_url($bannerBackground['url']); ?>)">
            <div class="container-mobile">
              <?php if ( $bannerTitle ): ?>
                <h2>
                  <?php echo $bannerTitle; ?>
                  <div class="title-line"></div>
                </h2>
              <?php endif; ?>
              <?php if ( $bannerText ): ?>
                <?php echo $bannerText; ?>
              <?php endif; ?>
              <div class="contact-call">
                <?php if ( $bannerPhone ): ?>
                  <div>
                    <a href="<?php echo esc_url($bannerPhone['url']); ?>" target="<?php echo esc_attr($bannerPhone['target'] ?: '_self'); ?>"><img src="<?php bloginfo('template_url'); ?>/src/images/phone-icon.png" alt="phone icon"/> <?php echo esc_html($bannerPhone['title']); ?></a>
                  </div>
                <?php endif; ?>
                <?php if ( $bannerEmail ): ?>
                  <div>
                    <a href="<?php echo esc_url($bannerEmail['url']); ?>" target="<?php echo esc_attr($bannerEmail['target'] ?: '_self'); ?>"><img src="<?php bloginfo('template_url'); ?>/src/images/mail-icon.png" alt="mail icon"/> <?php echo esc_html($bannerEmail['title']); ?></a>
                  </div>
                <?php endif; ?>
              </div>
              <?php if ( $bannerButton ): ?>
                <div class="btn-cta">
                  <a class="btn btn-green" href="<?php echo esc_url($bannerButton['url']); ?>" target="<?php echo esc_attr($bannerButton['target'] ?: '_self'); ?>"><?php echo esc_html($bannerButton['title']); ?> <i class="fa fa-arrow-right"></i></a>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
endif;
?>