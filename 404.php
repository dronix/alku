<?php 
/**
 * 404 Template
 *
 * This template is used for displaying 404 pages (Not Found).
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */
get_header(); // Load the header.php template. ?>

    <div id="content">
      
      <section id="main" class="site-content" role="main">

        <article id="post-0" class="<?php hybrid_entry_class(); ?>">

          <header class="entry-header">
            <h1 class="entry-title"><?php _e( 'Oh No! What did you do?', 'chun' ); ?></h1><!-- .entry-title -->
            <?php if ( file_exists( trailingslashit( get_stylesheet_directory() ) . 'images/404.png' ) ) : ?>
              <img class="error-image" src="<?php echo trailingslashit( get_stylesheet_directory_uri() ); ?>images/404.png" alt="404">
            <?php else : ?>
              <img class="error-image" src="<?php echo trailingslashit( get_template_directory_uri() ); ?>images/404.png" alt="404">
            <?php endif; ?>
            <?php get_search_form(); ?>
          </header>

          <div class="entry-content">
            <p>
              <?php printf( __( "You tried going to %s, which doesn't seem to exist. It was probably removed or was never created.", 'alku' ), '<span class="error-term">' . home_url( esc_url( $_SERVER['REQUEST_URI'] ) ) . '</span>' ); ?>
            </p>
            <p>
              <?php _e( "You can look through the list of latest posts or maybe try searching. It might help you find what you're looking for.", 'alku' ); ?>
            </p>
            
            <ul>
              <?php wp_get_archives( array( 'limit' => 20, 'type' => 'postbypost' ) ); ?>
            </ul>
          </div><!-- .entry-content -->

        </article><!-- .hentry .format-standard -->

      </section><!-- #main .site-content -->

<?php get_footer(); // Load the footer.php template. ?>