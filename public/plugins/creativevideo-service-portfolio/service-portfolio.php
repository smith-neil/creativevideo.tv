<?php

/*
Plugin Name: Service Portfolio
Description: Create's a 'Service' custom post type along with various shortcodes and styling options.
Version: 0.0.1
Author: Neil Smith @ Otey White & Associates
Author URI: http://www.oteywhite.com
Copyright: Otey White & Associates
*/

if ( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'sp' ) ) :

class sp {
    var $version = '0.0.1';
    var $settings = array();
    
    function __construct() {
        // do nothing here
    }

    function initialize() {
        $this->settings = array(
            // basic
            'name' => __( 'Service Portfolio', 'sp' ),
            'version' => $this->version,
            
            // urls
            'file' => __FILE__,
            'basename' => plugin_basename( __FILE__ ),
            'path' => plugin_dir_path( __FILE__ ),
            'dir' => plugin_dir_url( __FILE__ ),

            // options
        );

        // setup constants
        $this->define( 'SP', true );
        $this->define( 'SP_VERSION', $this->settings['version'] );
        $this->define( 'SP_PATH', $this->settings['path'] );
        
        if ( is_admin() ) {

        }

        // setup actions
        add_action( 'init', array( $this, 'init' ), 5 );
        add_action( 'init', array( $this, 'register_post_types' ), 5 );
    }

    function init() {
        // action for 3rd parth
        do_action( 'sp/init' );
    }

    function register_post_types() {
        // register post type 'service'
        register_post_type( 'service', array(
            'labels' => array(
                'name'               => __( 'Services', 'sp' ),
                'singular_name'      => __( 'Service', 'sp' ),
                'add_new'            => __( 'Add Service', 'sp' ),
                'add_new_item'       => __( 'Add New Service', 'sp' ),
                'edit_item'          => __( 'Edit Service', 'sp' ),
                'new_item'           => __( 'New Service', 'sp' ),
                'view_item'          => __( 'View Service', 'sp' ),
                'search_items'       => __( 'Search Service', 'sp' ),
                'not_found'          => __( 'No Services found', 'sp' ),
                'not_found_in_trash' => __( 'No Services found in Trash', 'sp' )
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

function sp() {
    global $sp;

    if ( !isset( $sp ) ) {
        $sp = new sp();
        
        $sp->initialize();
    }
}

sp();

endif;

?>