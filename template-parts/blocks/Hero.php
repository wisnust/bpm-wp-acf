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