<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Practice_Media
 */

?>

<?php
	$firstAddressState = get_field('footer_first_address_state', 'option');
	$firstAddressAddress = get_field('footer_first_address_address', 'option');

	$secondAddressState = get_field('footer_second_address_state', 'option');
	$secondAddressAddress = get_field('footer_second_address_address', 'option');

	$callText = get_field('call_text', 'option');
	$callPhone = get_field('call_phone', 'option');

	$emailText = get_field('email_text', 'option');
	$emailAddress = get_field('email_address', 'option');

	$ctaText = get_field('footer_cta_text', 'option');
	$ctaButton = get_field('footer_cta_button', 'option');

	$footerInfoText = get_field('footer_info_text', 'option');
	
?>
	<footer id="colophon" class="footer">
		<div class="container">
			<div class="footer-main">
				<div class="main-grid grid-1">
					<a class="footer-logo" href="<?php echo get_home_url(); ?>">
						<img width="326" src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
					</a>
					<div class="footer-socials">
						<?php get_template_part( 'template-parts/global/socials' ); ?>
					</div>
					<div class="footer-cta">
						<?php if ( $ctaText ): ?>
							<h3><?php echo $ctaText; ?></h3>
						<?php endif;?>
						<?php if ( $ctaButton ): ?>
								<a class="btn btn-green" href="<?php echo esc_url($ctaButton['url']); ?>" target="<?php echo esc_attr($ctaButton['target'] ?: '_self'); ?>"><?php echo esc_html($ctaButton['title']); ?> <i class="fa fa-arrow-right"></i></a>
							<?php endif; ?>
					</div>
				</div>
				<div class="main-grid grid-2">
					<?php if ( $firstAddressState ): ?>
						<h3><?php echo $firstAddressState; ?></h3>
					<?php endif;?>
					<?php if ( $firstAddressAddress ): ?>
						<p><?php echo $firstAddressAddress; ?></p>
					<?php endif;?>
				</div>
				<div class="main-grid grid-3">
					<?php if ( $secondAddressState ): ?>
						<h3><?php echo $secondAddressState; ?></h3>
					<?php endif;?>
					<?php if ( $secondAddressAddress ): ?>
						<p><?php echo $secondAddressAddress; ?></p>
					<?php endif;?>
				</div>
				<div class="main-grid grid-4">
					<?php if ( $callText ): ?>
						<h3><?php echo $callText; ?></h3>
					<?php endif;?>
					<?php if ( $callPhone ): ?>
						<p><a href="tel:<?php echo $callPhone;?>"><?php echo $callPhone; ?></a></p>
					<?php endif;?>
				</div>
				<div class="main-grid grid-5">
					<?php if ( $emailText ): ?>
						<h3><?php echo $emailText; ?></h3>
					<?php endif;?>
					<?php if ( $emailAddress ): ?>
						<p><a href="mailto:<?php echo $emailAddress;?>"><?php echo $emailAddress; ?></a></p>
					<?php endif;?>
				</div>
			</div>
			<div class="footer-info">
				<?php 
					if ( $footerInfoText ):
						echo $footerInfoText;
					endif;
				?>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
