<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_Practice_Media
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'best-practice-media' ); ?></a>

	<header id="masthead" class="site-header">
		<!-- TOP NAV -->
		<nav id="top-nav" class="d-none d-lg-block top-nav">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<div class="top-nav-socials">
							<?php get_template_part( 'template-parts/global/socials' ); ?>
						</div>
					</div>
					<div class="col-6">
						<div class="top-nav-logo">
							<a href="<?php echo get_home_url(); ?>">
								<img width="326" src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
							</a>
						</div>
					</div>
					<div class="col-3">
						<div class="top-nav-contact">
							<?php
								$contactButton = get_field('contact_button', 'option');
								if ($contactButton):
							?>
								<a href="<?php echo esc_url($contactButton['url']); ?>" target="<?php echo esc_attr($contactButton['target'] ?: '_self'); ?>" class="btn btn-outline btn-arrow"><?php echo esc_html($contactButton['title']); ?> <i class="fa fa-arrow-right"></i></a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<!-- MAIN NAV -->
		<nav id="site-navigation" class="navbar navbar-expand-lg navbar-light bg-white p-lg-0">
			<div class="container">
				<div class="navbar-wrapper w-100">
					<a class="navbar-brand d-block d-lg-none" href="<?php echo get_home_url(); ?>">
						<img width="220px" src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
					</a>
					<button 
						class="d-lg-none hamburger hamburger--elastic navbar-toggler" 
						type="button"
						aria-label="Menu" 
						aria-controls="navigation"
						data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
					<div class="collapse navbar-collapse" id="main-menu">
						<?php
						wp_nav_menu(array(
							'theme_location' => 'main-menu',
							'container' => false,
							'menu_class' => '',
							'fallback_cb' => '__return_false',
							'items_wrap' => '<ul id="%1$s" class="navbar-nav m-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
							'depth' => 2,
							'walker' => new bootstrap_5_wp_nav_menu_walker()
						));
						?>
					</div>
			</div>
		</div>
	</nav>

	</header><!-- #masthead -->