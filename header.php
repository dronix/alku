<?php 
/**
 * Header Template
 *
 * Displays all of the <head> section. This template is generally used on every
 * page of the site.
 *
 * @package Alku
 * @subpackage Template
 * @since  0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GPL 2.0 +
 */
 ?>
 <!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php hybrid_document_title(); ?></title>
<!--[if lt IE 9]>
<script src="<?php echo trailingslashit(get_template_directory_uri() ); ?>js/html5shiv.js"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body class="<?php hybrid_body_class(); ?>">

  <?php do_atomic( 'body_open' ); // alku_body_open ?>

  <div id="page-container">

    <?php do_atomic( 'page_header_before' ); // alku_page_header_before ?>

    <header id="page-header">

      <hgroup id="branding">
        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1><!-- .site-title-->
        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2><!-- .site-description -->
      </hgroup><!-- #branding-->

      <?php get_template_part( 'menu', 'primary' ); // Load the menu-primary.php template. ?>

    </header><!-- #page-header-->

    <?php do_atomic( 'page_header_after' ); // alku_page_header_after ?>