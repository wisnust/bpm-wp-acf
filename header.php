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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'best-practice-media' ); ?></a>

	<header id="masthead" class="site-header">
		<!-- TOP NAV -->
		<nav id="top-nav" class="d-none d-md-block">
			<div class="container">
				<div class="row">
					<div class="col-3">
						<div class="top-nav-socials">
							<?php get_template_part( 'template-parts/global/socials' ); ?>
						</div>
					</div>
					<div class="col-6">
						<a class="top-nav-logo" href="<?php echo get_home_url(); ?>">
							<img width="326" src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
						</a>
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
		<nav id="site-navigation" class="navbar navbar-expand-md navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand d-block d-md-none" href="<?php echo get_home_url(); ?>">
					<img width="220px" src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="main-menu">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'container' => false,
						'menu_class' => '',
						'fallback_cb' => '__return_false',
						'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
						'depth' => 2,
						'walker' => new bootstrap_5_wp_nav_menu_walker()
					));
					?>
				</div>
		</div>
	</nav>

	</header><!-- #masthead -->