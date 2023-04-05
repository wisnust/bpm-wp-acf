<?php
/**
 * Services Items
 */
if( isset( $block['data']['services_items_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['services_items_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'services-items-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'services-items';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$servicesItemsTitle = get_field('services_items_title');
$servicesItems = 'services_items';
$servicesItemsLinkCTA = get_field('services_items_link_cta');

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="section-title">
      <?php if ( $servicesItemsTitle ): ?>
        <h2>
          <?php echo $servicesItemsTitle; ?>
        </h2>
      <?php endif; ?>
    </div>
    <?php if( have_rows( $servicesItems ) ): ?>
      <div class="services-items-grid">
        <div class="row">
            <?php while( have_rows( $servicesItems ) ): the_row(); 
            $icon_image = get_sub_field('icon_image');
            $item_title = get_sub_field('item_title');
            $item_description = get_sub_field('item_description');
            $link_url = get_sub_field('link_url');
            $background_image = get_sub_field('background_image');
            ?>
              <div class="col-md-4 col-sm-6 col-lg-3">
                <div class="services-items-card" <?php echo $background_image ? 'style="background-image: url(' . $background_image['url'] . ');"': ''; ?>>
                  <?php 
                  if( !empty( $icon_image ) ): ?>
                    <div class="icon-image">
                      <img src="<?php echo esc_url($icon_image['url']); ?>" alt="<?php echo esc_attr($icon_image['alt']); ?>" />
                    </div>
                  <?php endif; ?>
                  <h4><?php echo $item_title; ?></h4>
                  <p><?php echo $item_description; ?></p>
                  <?php if ( $link_url ): ?>
                    <a class="btn-link" href="<?php echo esc_url($link_url); ?>">Learn More<i class="fa fa-arrow-right"></i></a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
    <?php if ( $servicesItemsLinkCTA ): ?>
      <div class="link-cta">
        <a class="btn btn-green" href="<?php echo esc_url($servicesItemsLinkCTA['url']); ?>" target="<?php echo esc_attr($servicesItemsLinkCTA['target'] ?: '_self'); ?>"><?php echo esc_html($servicesItemsLinkCTA['title']); ?> <i class="fa fa-arrow-right"></i></a>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
endif;