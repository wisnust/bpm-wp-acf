<?php
	
// ACF Blocks

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !class_exists('acf') ) {
    $acf_dir = ABSPATH . 'wp-content/plugins/advanced-custom-fields-pro/';
    include_once( $acf_dir . '/acf.php' );
}

/**
 * Register Best Practice Media Block Category
 */
function bpm_block_categories( $categories, $post ) {
	return array_merge(
		array(
			array(
				'slug' => 'bpm-acf-blocks',
				'title' => __( 'Best Practice Media Blocks', 'bpm-acf-blocks' ),
				'icon'  => 'welcome-widgets-menus',
			),
		),
		$categories
		
	);
}
add_filter( 'block_categories', 'bpm_block_categories', 10, 2 );

function register_acf_block_types() {

    // Block Hero
    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero'),
        'description'       => __('Used to display Hero block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/Hero.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'index-card',
        'keywords'          => array( 'hero' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'hero_component_preview' => get_template_directory_uri() . '/acf-preview-images/hero-component-preview.png',
                )
            )
        )
    ));

    // Block Hero CTA
    acf_register_block_type(array(
        'name'              => 'hero-cta',
        'title'             => __('Hero CTA'),
        'description'       => __('Used to display Hero CTA block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/HeroCTA.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'format-aside',
        'keywords'          => array( 'hero', 'cta' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'hero_cta_component_preview' => get_template_directory_uri() . '/acf-preview-images/hero-cta-component-preview.png',
                )
            )
        )
    ));

    // Block Our Services
    acf_register_block_type(array(
        'name'              => 'our-services',
        'title'             => __('Our Services'),
        'description'       => __('Used to display Our Services block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/OurServices.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'grid-view',
        'keywords'          => array( 'our', 'services' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'our_services_component_preview' => get_template_directory_uri() . '/acf-preview-images/our-services-component-preview.png',
                )
            )
        )
    ));

    // Block Services Items
    acf_register_block_type(array(
        'name'              => 'services-items',
        'title'             => __('Services Items'),
        'description'       => __('Used to display Services Items block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/ServicesItems.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'list-view',
        'keywords'          => array( 'services', 'items' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'services_items_component_preview' => get_template_directory_uri() . '/acf-preview-images/services-items-component-preview.png',
                )
            )
        )
    ));

    // Block Our Team
    acf_register_block_type(array(
        'name'              => 'our-team',
        'title'             => __('Our Team'),
        'description'       => __('Used to display Our Team block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/OurTeam.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'groups',
        'keywords'          => array( 'our', 'team' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'our_team_component_preview' => get_template_directory_uri() . '/acf-preview-images/our-team-component-preview.png',
                )
            )
        )
    ));

    // Block Text with Image
    acf_register_block_type(array(
        'name'              => 'text-with-image',
        'title'             => __('Text with Image'),
        'description'       => __('Used to display Text with Image block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/TextwithImage.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'media-document',
        'keywords'          => array( 'text', 'with', 'image' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'text_with_image_component_preview' => get_template_directory_uri() . '/acf-preview-images/text-with-image-component-preview.png',
                )
            )
        )
    ));

    // Block Testimonials Slider
    acf_register_block_type(array(
        'name'              => 'testimonials-slider',
        'title'             => __('Testimonials Slider'),
        'description'       => __('Used to display Testimonials Slider block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/TestimonialsSlider.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'testimonial',
        'keywords'          => array( 'testimonials', 'slider' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'testimonials_slider_component_preview' => get_template_directory_uri() . '/acf-preview-images/testimonials-slider-component-preview.png',
                )
            )
        )
    ));

    // Block Banner Image Text
    acf_register_block_type(array(
        'name'              => 'banner-image-text',
        'title'             => __('Banner Image Text'),
        'description'       => __('Used to display Banner Image Text block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/BannerImageText.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'cover-image',
        'keywords'          => array( 'banner', 'image', 'text' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'banner_image_text_component_preview' => get_template_directory_uri() . '/acf-preview-images/banner-image-text-component-preview.png',
                )
            )
        )
    ));

    // Block Contact Banner
    acf_register_block_type(array(
        'name'              => 'contact-banner',
        'title'             => __('Contact Banner'),
        'description'       => __('Used to display Contact Banner block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/ContactBanner.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'feedback',
        'keywords'          => array( 'contact', 'banner' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'contact_banner_component_preview' => get_template_directory_uri() . '/acf-preview-images/contact-banner-component-preview.png',
                )
            )
        )
    ));

    // Block Contact Form
    acf_register_block_type(array(
        'name'              => 'contact-form',
        'title'             => __('Contact Form'),
        'description'       => __('Used to display Contact Form block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/ContactForm.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'feedback',
        'keywords'          => array( 'contact', 'form' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'contact_form_component_preview' => get_template_directory_uri() . '/acf-preview-images/contact-form-component-preview.png',
                )
            )
        )
    ));

    // Block Recent Blogs
    acf_register_block_type(array(
        'name'              => 'recent-blogs',
        'title'             => __('Recent Blogs'),
        'description'       => __('Used to display Recent Blogs block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/RecentBlogs.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'list-view',
        'keywords'          => array( 'recent', 'blogs' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'recent_blogs_component_preview' => get_template_directory_uri() . '/acf-preview-images/recent-blogs-component-preview.png',
                )
            )
        )
    ));

    // Block Blogs Featured
    acf_register_block_type(array(
        'name'              => 'blogs-featured',
        'title'             => __('Blogs Featured'),
        'description'       => __('Used to display Blogs Featured block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/BlogsFeatured.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'bpm-acf-blocks',
        'icon'              => 'grid-view',
        'keywords'          => array( 'blogs', 'featured' ),
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'blogs_featured_component_preview' => get_template_directory_uri() . '/acf-preview-images/blogs-featured-component-preview.png',
                )
            )
        )
    ));

}
add_action('acf/init', 'register_acf_block_types');

add_filter('acf/settings/load_json', 'register_acf_json_load_point');

function register_acf_json_load_point( $paths ) {

    // Change to Theme
    $path = get_stylesheet_directory() . '/acf-json';

    // append path
    $paths[] = $path;

    // return
    return $paths;
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;
}