<!DOCTYPE html>
<html <?php language_attributes(); ?>  class="no-js no-svg">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php bloginfo( 'name' ); ?></title>
    <meta name="description" content="<?php bloginfo( 'description' ); ?>">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <link rel="icon" href="<?php echo get_template_directory_uri() . '/dist/icon/favicon.ico' ?>" sizes="16x16 32x32 48x48 64x64" type="image/vnd.microsoft.icon">

    <?php wp_head(); ?>
  </head>
  <body <?php body_class( 'site' ); ?>>
    
