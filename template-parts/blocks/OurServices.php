<?php
/**
 * Our Services
 */
if( isset( $block['data']['our_services_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['our_services_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'our-services-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section our-services';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$ourServicesTitle = get_field('our_services_title');
$ourServicesDescription = get_field('our_services_description');
$sectionID = get_field('section_id');
?>
<section id="<?php echo esc_attr(($sectionID) ? $sectionID : $id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="section-title text-center">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <?php if ( $ourServicesTitle ): ?>
            <h2 class="d-inline-block">
              <?php echo $ourServicesTitle; ?>
              <div class="title-line reverse"></div>
            </h2>
          <?php endif; ?>
          <?php if ( $ourServicesDescription ): ?>
            <?php echo $ourServicesDescription; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <div class="our-services-grid">
      <div class="row">
        <?php if( have_rows('our_services_items') ): ?>
          <?php while( have_rows('our_services_items') ): the_row(); 
            $itemBackgroundImage = get_sub_field('item_background_image');
            $itemTitle = get_sub_field('item_title');
            $itemText = get_sub_field('item_text');
            $itemImage = get_sub_field('item_image');
            $itemLink = get_sub_field('item_link');
            $itemCount = count(get_field('our_services_items'));
            ?>
            <div class="col-12 col-md-6 <?php if ($itemCount == 3) { echo 'col-lg-4'; } else { echo 'col-lg-3'; } ?>">
              <div class="item">
                <div class="item-content" style="background-image: url(<?php echo $itemBackgroundImage['url']; ?>)">
                  <div>
                    <h4><?php echo $itemTitle; ?></h4>
                    <p><?php echo $itemText; ?></p>
                  </div>
                  <?php if ( $itemLink ): ?>
                    <a class="btn-link" href="<?php echo esc_url($itemLink['url']); ?>" target="<?php echo esc_attr($itemLink['target'] ?: '_self'); ?>">
                      <?php 
                      if ( $itemLink['title'] ) :
                        echo esc_html($itemLink['title']);
                      else :
                        echo 'Learn More';
                      endif; ?> 
                      <i class="fa fa-arrow-right"></i>
                    </a>
                  <?php endif; ?>
                </div>
                <div class="item-image">
                  <?php 
                  if( !empty( $itemImage ) ): ?>
                    <div class="image">
                      <img src="<?php echo esc_url($itemImage['url']); ?>" alt="<?php echo esc_attr($itemImage['alt']); ?>" />
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>
<?php
endif;