<?php
/**
 * Our Team
 */
if( isset( $block['data']['our_team_component_preview'] )  ) :    /* rendering in inserter preview  */

    echo '<img src="'. $block['data']['our_team_component_preview'] .'" style="width:100%; height:auto;">';

else : /* rendering in editor body */

// Create id attribute allowing for custom "anchor" value.
$id = 'our-team-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'our-team';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values
$ourTeamTitle = get_field('our_team_title');
$ourTeamItems = 'our_team_items'

?>
<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
  <div class="container">
    <div class="section-title">
      <?php if ( $ourTeamTitle ): ?>
        <h2>
          <?php echo $ourTeamTitle; ?>
        </h2>
      <?php endif; ?>
    </div>
    <?php if( have_rows( $ourTeamItems ) ): ?>
      <div class="our-team-items">
        <div class="row">
          <?php while( have_rows( $ourTeamItems ) ): the_row(); 
          $photo = get_sub_field('photo');
          $name = get_sub_field('name');
          $job_title = get_sub_field('job_title');
          ?>
            <div class="col-md-4 col-sm-6 col-lg-3">
              <div class="item">
                <?php 
                if( !empty( $photo ) ): ?>
                  <div class="image">
                    <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" />
                  </div>
                <?php endif; ?>
                <div class="title-line"></div>
                <h4><?php echo $name; ?></h4>
                <p><?php echo $job_title; ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</section>
<?php
endif;