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

    // Block Hero
    acf_register_block_type(array(
        'name'              => 'hero',
        'title'             => __('Hero'),
        'description'       => __('Used to display Hero block'),
        'render_template'   => get_stylesheet_directory() . '/template-parts/blocks/Hero.php',
        'mode'              => 'edit',
        'supports'          => array('align' => false),
        'category'          => 'five-tool-acf-blocks',
        'icon'              => 'format-aside',
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