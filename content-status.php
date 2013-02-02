<?php 
/**
 * Content Status Template
 *
 * This template is used for displaying the content of a status post-format.
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

            <?php echo apply_atomic_shortcode( 'status_meta', '[entry-published]' ); ?>
            
            <div class="status-avatar">
              <?php echo get_avatar( get_the_author_meta( 'ID' ) ); ?>
            </div><!-- .status-avatar -->
            <div class="status-author">
              <?php echo get_the_author_meta( 'display_name', get_query_var( 'author' ) ); ?>
            </div><!-- .status-author -->
          <div class="entry-content">
            <?php the_content(); ?>
            <a href="<?php comments_link(); ?>" class="status-reply" title="Reply to this post"><i class="icon-share-alt"></i>reply</a>
            <?php echo apply_atomic_shortcode( 'status_meta', '[entry-edit-link before=" - "]' ); ?>
          </div><!-- .entry-content -->

        </article><!-- .hentry .format-standard -->

<?php do_atomic( 'entry_after' ); // alku_entry_after ?>