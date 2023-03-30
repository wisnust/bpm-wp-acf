<?php
  $facebookLink = get_field('facebook_link', 'option');
  $twitterLink = get_field('twitter_link', 'option');
  $instagramLink = get_field('instagram_link', 'option');
  $linkedinLink = get_field('linkedin_link', 'option');
?>
<div class="social-links">
  <?php if( $facebookLink ): ?>
    <a class="button" href="<?php echo esc_url( $facebookLink['url'] ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
  <?php endif; ?>
  <?php if( $twitterLink ): ?>
    <a class="button" href="<?php echo esc_url( $twitterLink['url'] ); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
  <?php endif; ?>
  <?php if( $instagramLink ): ?>
    <a class="button" href="<?php echo esc_url( $instagramLink['url'] ); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
  <?php endif; ?>
  <?php if( $linkedinLink ): ?>
    <a class="button" href="<?php echo esc_url( $linkedinLink['url'] ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
  <?php endif; ?>
</div>