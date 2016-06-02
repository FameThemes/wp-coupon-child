<?php

/**
 * Load child theme css
 */
function wpcoupon_child_theme_scripts(){
    wp_enqueue_style( 'wpcoupon_style_child', get_stylesheet_uri(), array( 'wpcoupon_style' ) );
}
add_action( 'wp_enqueue_scripts', 'wpcoupon_child_theme_scripts', 35 );