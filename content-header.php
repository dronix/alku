<?php 
/**
 * Content Header Template
 *
 * Displays the Post/Page header information, i.e (post title, post author, category, etc).
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */
$format = get_post_format(); ?>


        <?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'size' => 'full', 'image_class' => 'wp-post-image' ) ); ?>

        <header class="entry-header">
          <?php if ( is_singular( 'post' ) ) : ?>
            <?php echo apply_atomic_shortcode( 'entry_title', the_title( '<i class="icon-pencil"></i><h1 class="entry-title">', '</h1><!-- .entry-title -->', false ) ); ?>
          <?php else : ?>
            <?php echo apply_atomic_shortcode( 'entry_title', '<i class="icon-pencil"></i>[entry-title tag="h1"]' ); ?>
          <?php endif; // is_singular() ?>

          <?php if ( !is_page()  ) : ?>
            <?php echo apply_atomic_shortcode( 'entry_header_meta', '<div class="entry-header-meta">' . __( 'by [entry-author] in [entry-terms taxonomy="category"] [entry-comments-link before=" - " zero="Comments" one="%1$s Comment" more="%1$s Comments"] [entry-edit-link before=" - "]', 'alku' ) . '</div><!-- .entry-header-meta -->' ); ?>
          <?php else : ?>
            <?php echo apply_atomic_shortcode( 'entry_header_meta', '<div class="entry-header-meta">[entry-edit-link]</div><!-- .entry-header-meta -->' ); ?>
          <?php endif; // !is_page() ?>
        </header><!-- .entry-header -->

