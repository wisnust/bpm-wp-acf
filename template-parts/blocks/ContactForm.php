<?php
/**
 * Contact Form
 */
if( isset( $block['data']['contact_form_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['contact_form_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'contact-form';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$contactFormTitle = get_field('contact_form_title');
$contactFormDescription = get_field('contact_form_description');
$contactFormFormID = get_field('contact_form_form_id');

?>
<style>
  .contact-form .gfield.input-name .ginput_container:after {
    background-image: url(<?php bloginfo('template_url'); ?>/src/images/icon-user.png)
  }
  .contact-form .gfield.input-phone .ginput_container:after {
    background-image: url(<?php bloginfo('template_url'); ?>/src/images/icon-phone.png)
  }
  .contact-form .gfield.input-email .ginput_container:after {
    background-image: url(<?php bloginfo('template_url'); ?>/src/images/icon-mail.png)
  }
  .contact-form .gfield.input-help .ginput_container:after {
    background-image: url(<?php bloginfo('template_url'); ?>/src/images/icon-comment.png)
  }
</style>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="contact-form-title text-center">
      <?php if ( $contactFormTitle ): ?>
        <h2 class="d-inline-block">
          <?php echo $contactFormTitle; ?>
          <div class="title-line reverse"></div>
        </h2>
      <?php endif; ?>
      <?php if ( $contactFormDescription ): ?>
        <?php echo $contactFormDescription; ?>
      <?php endif; ?>
    </div>
    <?php if ( $contactFormFormID ): ?>
      <div class="contact-form-form">
        <?php echo do_shortcode('[gravityform id="' . $contactFormFormID . '" title="false" description="false" ajax="true" tabindex="49"]'); ?>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
endif;