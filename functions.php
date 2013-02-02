<?php 
/**
 * Alkus functions file.
 *
 * This is where all the features and extensions are defined for the theme. These
 * can be overwritten in a child theme. The child theme's function.php file is 
 * included before the parent theme's file, so the child theme functions would
 * be used.
 *
 * If you would like to fire or run a function in your child theme after a parent theme's function,
 * then make sure you use a priority greater than 10, i.e (11).
 *
 * It is recommended that child themes use the 'after_setup_theme' action hook to overwrite Alku's
 * theme features.
 *
 * @package Alku
 * @subpackage Functions
 * @version 0.1.0
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link (Alku, http://demo.dronix.me/alku)
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GPL 2 or later
 */

/* Load Hybrid Core framework. */
require_once( trailingslashit( get_template_directory() ) . 'core/hybrid.php' );
new Hybrid();

/* Attach our theme setup to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'alku_theme_setup' );

/**
 * Theme setup function.
 *
 * This function adds support for theme features and the various extensions
 * and utilities of the Hybrid Core framework. It also defines the default
 * actions and filters.
 *
 * @since 0.1.0
 */
function alku_theme_setup() {

  /* Get our theme's prefix. */
  $prefix = hybrid_get_prefix();

  /* Add theme support for Hybrid Core features. */
  add_theme_support( 'hybrid-core-menus', array( 'primary' ) );
  add_theme_support( 'hybrid-core-sidebars', array( 'primary' ) );
  add_theme_support( 'hybrid-core-widgets' );
  add_theme_support( 'hybrid-core-shortcodes' );
  add_theme_support( 'hybrid-core-template-hierarchy' );
  add_theme_support( 'hybrid-core-scripts', array( 'comment-reply' ) );
  add_theme_support( 'hybrid-core-styles', array( 'gallery', 'parent', 'style' ) );

  /* Add theme support for Hybrid Core extensions. */
  add_theme_support( 'theme-layouts', array( '1c', '2c-l', '2c-r' ), array( 'default' => '2c-l' ) );
  add_theme_support( 'post-stylesheets' );
  add_theme_support( 'loop-pagination' );
  add_theme_support( 'get-the-image' );
  add_theme_support( 'cleaner-gallery' );

  /* Add theme support for WordPress features. */
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'image', 'gallery', 'link', 'quote', 'status', 'video') );

  /* Add theme support for Alku features. */
  add_theme_support( 'alku-custom-fonts' );

  /* Lets make the visual editor match our theme styles. */
  add_editor_style();

  /* Add some custom styles and scripts. */
  add_action( 'wp_enqueue_scripts', 'alku_scripts_styles' );

  /* Lets add a custom body class. */
  add_filter( 'body_class', 'alku_body_class' );

  /* Lets add our own shortcodes. */
  add_action( 'init', 'alku_register_shortcodes', 11 );

  /* Filter the sidebar widgets. */
  add_filter( 'sidebars_widgets', 'alku_disable_sidebars' );
  add_action( 'template_redirect', 'alku_one_column' );

  /* Add some custom User Profile fields. */
  add_filter( 'user_contactmethods', 'alku_user_contact_methods' );

  /* Set default embeds width. */
  hybrid_set_content_width( 600 );
  add_filter( 'embed_defaults', 'alku_embed_defaults' );

  /* Lets filter `the_content`. */
  add_filter( 'the_content', 'alku_extend_the_content' );

}

/**
 * Registers and enqueues our custom stylesheets and javascripts.
 *
 * @since  0.1.0
 */
function alku_scripts_styles() {

  /* Use the .min script if SCRIPT_DEBUG is turned off. */
  $suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

  $protocol = is_ssl() ? 'https' : 'http';
  $query_args = array( 'family' => 'Open+Sans:400italic,300,400,600,700,800' );

  /* Register our fonts styles. */
  wp_register_style( 'alku-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
  wp_register_style( 'alku-icon-fonts', trailingslashit( THEME_URI ) . "css/elusive-webfont{$suffix}.css", array(), null );

  /* Enqueue our fonts if current theme supports Alku's custom fonts. */
  if ( current_theme_supports( 'alku-custom-fonts' ) ) {
    wp_enqueue_style( 'alku-fonts' );
    wp_enqueue_style( 'alku-icon-fonts' );
  }

  /* Register our scripts */
  wp_register_script( 'alku-flexslider', trailingslashit( THEME_URI ) . "js/jquery.flexslider{$suffix}.js", array( 'jquery' ), '20130101', true );
  wp_register_script( 'alku-fitvids', trailingslashit( THEME_URI ) . "js/jquery.fitvids{$suffix}.js", array( 'jquery' ), '20130101', true );
  wp_register_script( 'alku-custom-scripts', trailingslashit( THEME_URI ) . "js/jquery.custom.js", array( 'jquery' ), '20130101', true );

  /* Enqueue our scripts. */
  wp_enqueue_script( 'alku-fitvids' );
  wp_enqueue_script( 'alku-flexslider' );
  wp_enqueue_script( 'alku-custom-scripts' );
}

/**
 * Creates an additional <body> class
 *
 * @since  0.1.0
 */
function alku_body_class( $classes ) {

  /* If Alku's custom fonts are enabled. */
  if ( current_theme_supports( 'alku-custom-fonts' ) )
    $classes[] = 'custom-font-enabled';

  return $classes;
}

/**
 * Removes some of Hybrid Core default shortcodes with our own and creates
 * additional ones.
 *
 * @since  0.1.0
 */
function alku_register_shortcodes() {

  /* Remove some of Hybrid Core shortcodes. */
  remove_shortcode( 'comment-published' );

  /* Add our own shortcodes. */
  add_shortcode( 'comment-published', 'alku_comment_published_shortcode' );
  add_shortcode( 'hc-link', 'alku_hc_link_shortcode' );
  add_shortcode( 'author-info', 'alku_author_info_shortcode' );
  add_shortcode( 'gallery-slider', 'alku_gallery_slider', 11, 2 );

}

/**
 * Shortcode for displaying the published date and time of an individual comment wrapped
 * in a link .
 *
 * @since  0.1.0
 * @return string 
 */
function alku_comment_published_shortcode() {
  global $comment;

  $link = '<span class="published">' . 
            sprintf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>', 
                      esc_url( get_comment_link( $comment->comment_ID ) ),
                      get_comment_time( 'c' ), sprintf( __( '%1$s at %2$s', 'alku' ), 
                      get_comment_date(), get_comment_time() ) ) .
          '</span>';
  return $link;
}

/**
 * Shortcode for displaying a link back to Hybrid Core.
 *
 * @since 0.1.0
 */
function alku_hc_link_shortcode() {
  return '<a class="hc-link" href="http://themehybrid.com/hybrid-core" title="' . esc_attr__( 'A WordPress theme framework developed by Justin Tadlock', 'alku' ) . '"><span>' . __( 'Hybrid Core', 'hybrid-core' ) . '</span></a>';
}

/**
 * Shortcode for displaying information regarding the 
 * author of a post.
 *
 * @since  0.1.0
 */
function alku_author_info_shortcode( $attr ) {

  $attr = shortcode_atts(
    array(
      'container_class' => 'author-info',
      'header_tag' => 'h2',
      'header_class' => 'username',
      'show_avatar' => true,
      'github' => is_archive() ? get_user_meta( get_query_var( 'author' ), 'github', true ) : get_user_meta( get_the_author_meta( 'ID' ), 'github', true ),
      'twitter' => is_archive() ? get_user_meta( get_query_var( 'author' ), 'twitter', true ) : get_user_meta( get_the_author_meta( 'ID' ), 'twitter', true ),
      'dribbble' => is_archive() ? get_user_meta( get_query_var( 'author' ), 'dribbble', true ) : get_user_meta( get_the_author_meta( 'ID' ), 'dribbble', true ),
      'avatar' => is_archive() ? get_avatar( get_query_var( 'author' ) ) : get_avatar( get_the_author_meta( 'ID' ) ),
      'author_url' => is_archive() ? get_the_author_meta( 'user_url', get_query_var( 'author' ) ) : get_author_posts_url( get_the_author_meta( 'ID' ) ),
      'author_description' => wpautop( get_the_author_meta( 'description', get_query_var( 'author' )) )
      ),
    $attr
    );

  extract( $attr );

  if ( 'true' == $show_avatar )
    $output = "<div class='{$container_class}'>" . 
                "{$avatar}<{$header_tag} class='{$header_class}'><a href='{$author_url}'>" . get_the_author_meta( 'display_name', get_query_var( 'author' ) ) . "</a></{$header_tag}>
                <div class='social-icons'>
                  <a href='http://github.com/{$github}' class='github'><i aria-hidden='true' class='icon-github'></i><span class='hidden-text'>{$github}</span></a>
                  <a href='http://twitter.com/{$twitter}' class='twitter'><i aria-hidden='true' class='icon-twitter'></i><span class='hidden-text'>{$twitter}</span></a>
                  <a href='http://dribbble.com/{$dribbble}' class='dribble'><i aria-hidden='true' class='icon-dribble'></i><span class='hidden-text'>{$dribbble}</span></a>
                </div>
                {$author_description}
              </div>";
  else
    $output = "<div class='{$container_class}'>" . "<{$header_tag}><a href='{$author_url}'>" . get_the_author_meta( 'display_name', get_query_var( 'author' ) ) . "</a></{$header_tag}>{$author_description}</div>";

  return $output;
}

/**
 * Shortcode based on the modified version of `[gallery]`,
 * `cleaner-gallery`. This shortcode should only be used
 * inside the loop.
 *
 * @since 0.1.0
 */
function alku_gallery_slider( $output, $attr ) {

  static $cleaner_gallery_instance = 0;
  $cleaner_gallery_instance++;

  /* We're not worried abut galleries in feeds, so just return the output here. */
  if ( is_feed() )
    return $output;

  /* Orderby. */
  if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
      unset( $attr['orderby'] );
  }

  /* Default gallery settings. */
  $defaults = array(
    'order' => 'ASC',
    'orderby' => 'menu_order ID',
    'id' => get_the_ID(),
    'link' => '',
    'itemtag' => 'li',
    'icontag' => 'dt',
    'captiontag' => 'dd',
    'columns' => 3,
    'size' => 'full',
    'include' => '',
    'exclude' => '',
    'numberposts' => -1,
    'offset' => ''
  );

  /* Apply filters to the default arguments. */
  $defaults = apply_filters( 'alku_gallery_slider_defaults', $defaults );

  /* Apply filters to the arguments. */
  $attr = apply_filters( 'alku_gallery_slider_args', $attr );

  /* Merge the defaults with user input.  */
  $attr = shortcode_atts( $defaults, $attr );
  extract( $attr );
  $id = intval( $id );

  /* Arguments for get_children(). */
  $children = array(
    'post_parent' => $id,
    'post_status' => 'inherit',
    'post_type' => 'attachment',
    'post_mime_type' => 'image',
    'order' => $order,
    'orderby' => $orderby,
    'exclude' => $exclude,
    'include' => $include,
    'numberposts' => $numberposts,
    'offset' => $offset,
    'suppress_filters' => true
  );

  /* Get image attachments. If none, return. */
  $attachments = get_children( $children );

  if ( empty( $attachments ) )
    return '';

  /* Properly escape the gallery tags. */
  $itemtag = tag_escape( $itemtag );
  $icontag = tag_escape( $icontag );
  $captiontag = tag_escape( $captiontag );
  $i = 0;

  /* Count the number of attachments returned. */
  $attachment_count = count( $attachments );

  /* Open the gallery <div>. */
  $output = "\n\t\t\t<div class='flexslider'><ul id='gallery-slider-{$id}-{$cleaner_gallery_instance}' class='slides ggallery ggallery-{$id}'>";

  /* Loop through each attachment. */
  foreach ( $attachments as $id => $attachment ) {

    /* Open each gallery item. */
    $output .= "\n\t\t\t\t\t<{$itemtag} class='gallery-slider-item'>";

    /* Add the image. */
    $image = "<a href='". get_permalink() . "'>" . wp_get_attachment_image( $id, $size ) . "</a>";
    $output .= apply_filters( 'alku_gallery_slider_image', $image, $id, $attr, $cleaner_gallery_instance );


    /* Close individual gallery item. */
    $output .= "\n\t\t\t\t\t</{$itemtag}>";

  }

  /* Close the gallery <div>. */
  $output .= "\n\t\t\t</ul></div><!-- .gallery -->\n";

  /* Return out very nice, valid HTML gallery. */
  return $output;
}

/**
 * Checks if a post has a gallery
 * 
 * @since 0.1.0
 */
function alku_has_gallery() { 
  global $post;

  $has_gallery = strpos($post->post_content,'[gallery') !== false;

  return $has_gallery;

}

/**
 * Disables sidebars if viewing a one-column page.
 *
 * @since 0.1.0
 * @return array $sidebars_widgets
 */
function alku_disable_sidebars( $sidebars_widgets ) {
  global $wp_customize;

  $customize = ( is_object( $wp_customize ) && $wp_customize->is_preview() ) ? true : false;

  if ( !is_admin() && !$customize && '1c' == get_theme_mod( 'theme_layout' ) )
    $sidebars_widgets['primary'] = false;

  return $sidebars_widgets;
}

/**
 * Decides which pages should have a one-column layout.
 *
 * @since 0.1.0
 */
function alku_one_column() {

  if ( !is_active_sidebar( 'primary' ) )
    add_filter( 'theme_mod_theme_layout', 'alku_theme_layout_one_column' );

  elseif ( is_404() )
    add_filter( 'theme_mod_theme_layout', 'alku_theme_layout_one_column' );

  elseif ( is_attachment() && wp_attachment_is_image() && 'default' == get_post_layout( get_queried_object_id() ) )
    add_filter( 'theme_mod_theme_layout', 'alku_theme_layout_one_column' );

  elseif ( is_post_type_archive( 'portfolio_item' ) || is_tax( 'portfolio' ) )
    add_filter( 'theme_mod_theme_layout', 'alku_theme_layout_one_column' );
}

/**
 * Sets the layout to one column
 *
 * @since 0.1.0
 */
function alku_theme_layout_one_column( $layout ) {
  return '1c';
}

/**
 * Creates additional fields to the Contact Info section of the 
 * User Profiles page in the back end of WordPress.
 *
 * @since 0.1.0
 */
function alku_user_contact_methods( $user_contactmethods ) {

  $user_contactmethods['github'] = 'Github username';
  $user_contactmethods['twitter'] = 'Twitter username';
  $user_contactmethods['dribbble'] = 'Dribbble username';

  return $user_contactmethods;
}

/**
 * Overwrites the default width for embeds.
 *
 * @since  0.1.0
 */
function alku_embed_defaults( $args ) {

  if ( current_theme_supports( 'theme-layouts' ) && '1c' == get_theme_mod( 'theme-layouts' ) )
    $args['width'] = 960;

  return $args;
}

/**
 * Adds a permalink at the end of the content to an
 * aside post-format.
 *
 * @since  0.1.0
 */
function alku_extend_the_content( $content ) {

  if ( has_post_format( 'aside' ) && !is_singular() )
    $content .= '<a href="' . get_permalink() . '" class="aside-permalink">&#8734;</a>';

  return $content;
}

?>