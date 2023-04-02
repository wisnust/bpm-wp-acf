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
 * Register FiveTool Block Category
 */
function five_tool_block_categories( $categories, $post ) {
	return array_merge(
		array(
			array(
				'slug' => 'five-tool-acf-blocks',
				'title' => __( 'Five Tool Blocks', 'five-tool-acf-blocks' ),
				'icon'  => 'welcome-widgets-menus',
			),
		),
		$categories
		
	);
}
add_filter( 'block_categories', 'five_tool_block_categories', 10, 2 );

function register_acf_block_types() {

    // Block Hero CTA
    acf_register_block_type(array(
        'name'              => 'hero-cta',
        'title'             => __('Hero CTA'),
        'description'       => __('Used to display Hero CTA block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/HeroCTA.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'five-tool-acf-blocks',
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
        'category'          => 'five-tool-acf-blocks',
        'icon'              => 'format-aside',
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

    // Block Text with Image
    acf_register_block_type(array(
        'name'              => 'text-with-image',
        'title'             => __('Text with Image'),
        'description'       => __('Used to display Text with Image block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/TextwithImage.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'five-tool-acf-blocks',
        'icon'              => 'format-aside',
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
        'category'          => 'five-tool-acf-blocks',
        'icon'              => 'format-aside',
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
        'category'          => 'five-tool-acf-blocks',
        'icon'              => 'format-aside',
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