<?php 
/**
 * Loop Meta Template
 *
 * Shows the different headers (h1) depending on what type of archive
 * page is being displayed.
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */
?>

<?php if ( !is_singular() && !is_home() && have_posts() ) : ?>

  <div class="loop-meta">

    <?php if( is_author() ) : ?>
      <h1 class="loop-title"><?php _e( 'Browsing Authors', 'alku' ); ?></h1>
      <?php echo apply_atomic_shortcode( 'auhthor_info', '[author-info]' ); ?>
    <?php else : ?>
    
      <h1 class="loop-title"><?php 
        if ( is_category() ) : 
          printf( __( 'Browsing: %s', 'alku' ), '<span class="loop-meta-term">' . single_cat_title( '', false ) . '</span>' ); 
        elseif ( is_tag() ) :
          printf( __( 'Browsing: %s', 'alku' ), '<span class="loop-meta-term">' . single_tag_title( '', false ) . '</span>' );
        elseif ( is_search() ) :
          printf( __( 'Searching for: %s', 'alku' ), '<span class="loop-meta-term">' . esc_attr( get_search_query() ) . '</span>' );
        elseif ( is_day() ) :
          printf( __( 'Daily Archives: %s', 'alku' ), '<span class="loop-meta-term">' . get_the_date() . '</span>' );
        elseif ( is_month() ) :
          printf( __( 'Monthly Archives: %s', 'alku' ), '<span class="loop-meta-term">' . get_the_date( _x( 'F Y', 'monthly archives date format', 'alku' ) ) . '</span>' );
        elseif ( is_year() ) :
          printf( __( 'Yearly Archives: %s', 'alku' ), '<span class="loop-meta-term">' . get_the_date( _x( 'Y', 'yearly archives date format', 'alku' ) ) . '</span>' );
        else :
          _e( 'Browsing the Archives', 'alku' );
        endif;
      ?></h1><!-- .loop-title -->

    <?php endif; // is_author() ?>

  </div><!-- .loop-meta -->

<?php endif; // have_posts() ?>