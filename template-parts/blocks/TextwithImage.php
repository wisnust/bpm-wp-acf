<?php
/**
 * Text with Image
 */
if( isset( $block['data']['text_with_image_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['text_with_image_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'text-with-image-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'text-with-image';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$textWithImageTitle = get_field('text_with_image_title');
$textWithImageSubtitle = get_field('text_with_image_subtitle');
$textWithImageContent = get_field('text_with_image_content');
$textWithImageButton = get_field('text_with_image_button');
$textWithImageImage = get_field('text_with_image_image');

// Advanced
$backgroundColor = get_field('background_color');
$alignment = get_field('alignment');

?>
<style>
  <?php
    // Advanced
    if ( $backgroundColor ) {
      echo '#' . esc_attr($id) . ' {';
      echo 'background-color:' . $backgroundColor  . ';';
      echo '}';
    }
  ?>
</style>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="row <?php if ($alignment == 'left') { echo 'flex-row-reverse'; } ?>">
      <div class="col-md-6">
        <?php 
        if( !empty( $textWithImageImage ) ): ?>
          <div class="image">
            <img class="img-fluid" src="<?php echo esc_url($textWithImageImage['url']); ?>" alt="<?php echo esc_attr($textWithImageImage['alt']); ?>" />
          </div>
        <?php endif; ?>
      </div>
      <div class="col-md-6">
        <div class="text-with-image-text grid-text">
          <?php if ( $textWithImageTitle ): ?>
            <h2>
              <?php echo $textWithImageTitle; ?>
              <div class="title-line <?php if ($alignment == 'left') { echo 'reverse'; } ?>"></div>
            </h2>
          <?php endif; ?>
          <?php if ( $textWithImageSubtitle ): ?>
            <h5>
              <?php echo $textWithImageSubtitle; ?>
            </h5>
          <?php endif; ?>
          <?php if ( $textWithImageContent ): ?>
            <?php echo $textWithImageContent; ?>
          <?php endif; ?>
          <?php if ( $textWithImageButton ): ?>
            <a class="btn btn-green" href="<?php echo esc_url($textWithImageButton['url']); ?>" target="<?php echo esc_attr($textWithImageButton['target'] ?: '_self'); ?>"><?php echo esc_html($textWithImageButton['title']); ?> <i class="fa fa-arrow-right"></i></a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
endif;