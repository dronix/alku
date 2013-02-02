<?php 
/**
 * Content Template
 *
 * This is the default template used for displaying a post's content.
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */

do_atomic( 'entry_before' ); // alku_entry_before ?>

        <article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

          <?php get_template_part( 'content-header' ); // Load the content-header.php template. ?>

          <div class="entry-content">
            <?php if ( is_singular() ) : ?>
              <?php the_content(); ?>
              <?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'alku' ) . '</span>', 'after' => '</p>' ) ); ?>
            <?php else : ?>
              <?php the_excerpt(); ?>
              <?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'alku' ) . '</span>', 'after' => '</p>' ) ); ?>
            <?php endif; // is_singular() ?>
          </div><!-- .entry-content -->

          <?php get_template_part( 'content-footer' ); // Load the content-footer.php template ?>

        </article><!-- .hentry .format-standard -->

<?php do_atomic( 'entry_after' ); // alku_entry_after ?>