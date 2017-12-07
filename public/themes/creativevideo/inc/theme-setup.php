<?php

function cv_theme_support() {
    add_theme_support( 'html5' );
    add_theme_support( 'menus' );
    add_theme_support( 'post-thumbnails' );
}
add_action( 'after_setup_theme', 'cv_theme_support' );

function cv_enqueue_styles() {
    wp_enqueue_style( 'styles.css', 'http://localhost:8888/creativevideo.tv/public/themes/creativevideo/dist/styles.css' );
    wp_enqueue_style( 'fontawesome.css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
}
add_action( 'wp_enqueue_scripts', 'cv_enqueue_styles' );

function cv_enqueue_scripts() {
    // TODO: get_template_directory_uri is omitting the project's root folder 'creativevideo.tv'
    
    //wp_enqueue_script( 'bundle.js', TEMPLATEPATH . '/dist/bundle.js' );
}
add_action( 'wp_enqueue_scripts', 'cv_enqueue_scripts' );