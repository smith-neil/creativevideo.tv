<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
  </head>
  <body <?php body_class( 'site' ); ?>>
    <header class="header">
      <?php 
      if ( is_front_page() ) {
        get_template_part( 'partials/header/header-video' );
      }
      get_template_part( 'partials/header/header-nav' );
      ?>
    </header>
