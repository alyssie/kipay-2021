<?php
// Add CSS resources
function wc_resources(){
    //Style
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css');
    wp_enqueue_style('bootstrap');
    wp_register_style('animate', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');
    wp_enqueue_style('animate');
    wp_enqueue_style('style', get_stylesheet_uri());
    //Script
    wp_register_script('jqueryfillcolor', get_template_directory_uri().'/assets/js/jqueryfillcolor.js', array('jquery'));
    wp_enqueue_script('jqueryfillcolor');
    wp_register_script('main', get_template_directory_uri().'/assets/js/main.js', array('jquery'));
    wp_enqueue_script('main');
    wp_register_script('wow', 'https://cdn.boomcdn.com/libs/wow-js/1.3.0/wow.min.js');
    wp_enqueue_script('wow');
    wp_register_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    wp_enqueue_script('bootstrap-js');
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    wp_enqueue_script('popper');
}
add_action('wp_enqueue_scripts', 'wc_resources');

//Functions
function stringToSecret($string){
    $length = strlen($string);
    $visibleCount = (int) round($length / 7);
    $hiddenCount = $length - ($visibleCount * 5);
    return substr($string, 0, $visibleCount) . str_repeat('*', $hiddenCount) . substr($string, ($visibleCount * -1), $visibleCount);
}