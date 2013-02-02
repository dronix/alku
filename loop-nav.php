<?php 
/**
 * Loop Nav Template
 *
 * Displays the next/previous post links on singular pages and paginated
 * posts links on the home/posts page and archive pages.
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
      <?php if ( is_singular( 'post' ) ) : ?>

        <div class="loop-navigation">
          <?php previous_post_link( '%link', '<i class="icon-chevron-left"></i><span class="prev hidden-text">' . __( 'Previous', 'alku' ) . '</span>' ); ?>
          <?php next_post_link( '%link', '<i class="icon-chevron-right"></i><span class="next hidden-text">' . __( 'Next', 'alku' ) . '</span>' ); ?>
        </div><!-- .loop-navigation -->

      <?php elseif ( !is_singular() && current_theme_supports( 'loop-pagination' ) ) : loop_pagination( array( 'prev_text' => '<i class="icon-chevron-left"></i> <span class="hidden-text">' . __( 'Previous', 'alku' ) . '</span>', 'next_text' => '<i class="icon-chevron-right"></i> <span class="hidden-text">' . __( 'Next', 'alku' ) . '</span>' ) ); ?>

      <?php endif; ?>