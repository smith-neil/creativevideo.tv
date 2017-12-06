<?php
/*
Plugin Name: Video Portfolio
Description: Creates a 'Portfolio' custom post type along with various shortcodes to display the portfolio items and styling options.
Version: 0.0.1
Author: Neil Smith @ Otey White & Associates
Author URI: http://www.oteywhite.com
Copyright: Otey White & Associates
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'vp' ) ) :

class vp {
    var $version = '0.0.1';
    var $settings = array();

    function __construct() {
        // Do nothing here
    }

    function initialize() {
        $this->settings = array(
            // basic
            'name' => 'Video Portfolio',
            'version' => $this->version,

            // urls
            'file' => __FILE__,
            'basename' => plugin_basename( __FILE__ ),
            'path' => plugin_dir_path( __FILE__ ),
            'dir' => plugin_dir_url( __FILE__ ),

            // options
        );

        // setup constants
        $this->define( 'VP', true );
        $this->define( 'VP_VERSION', $this->settings['version'] );
        $this->define( 'VP_PATH', $this->settings['path'] );

        if ( is_admin() ) {

        }

        // setup actions
        add_action( 'init', array( $this, 'init'), 5 );
        add_action( 'init', array( $this, 'register_post_types' ), 5 );
    }

    function init() {
        // action for 3rd party
        do_action( 'vp/init' );
    }

    function register_post_types() {
        // register post type 'portfolio'
        register_post_type( 'portfolio', array(
            'labels' => array(
                'name'               => __( 'Portfolio', 'vp' ),
                'singular_name'      => __( 'Portfolio', 'vp' ),
                'add_new'            => __( 'Add Video', 'vp' ),
                'add_new_item'       => __( 'Add New Video', 'vp' ),
                'edit_item'          => __( 'Edit Video', 'vp' ),
                'new_item'           => __( 'New Video', 'vp' ),
                'view_item'          => __( 'View Video', 'vp' ),
                'search_items'       => __( 'Search Video', 'vp' ),
                'not_found'          => __( 'No Videos found', 'vp' ),
                'not_found_in_trash' => __( 'No Videos found in Trash', 'vp' )
            ),
            'public' => true,
            'menu_position' => 5
        ) );
    }

    function define( $name, $value = true ) {
        if ( !defined( $name ) ) {
            define( $name, $value );
        }
    }
}


function vp() {
    global $vp;

    if ( !isset( $vp ) ) {
        $vp = new vp();

        $vp->initialize();
    }

    return $vp;
}

vp();

endif;

?>