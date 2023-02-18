<?php
/**
 * Fru Backend Theme functions and definitions.
 *
 */

register_nav_menus(
    array(
        'primary' => esc_html__( 'Primary menu', 'frubackend' ),
        'mobile'  => esc_html__( 'Mobile', 'frubackend' ),
        'footer'  => esc_html__( 'Footer', 'frubackend' ),
    )
);




add_theme_support( 'post-thumbnails' );

require get_template_directory() . '/functions/posttype.php';
require get_template_directory() . '/functions/acf.php';
require get_template_directory() . '/functions/scripts.php';
require get_template_directory() . '/functions/order.php';


add_filter( 'acf/settings/rest_api_format', function () {
    return 'standard';
} );
