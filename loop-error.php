<?php 
/**
 * Loop Error Template
 *
 * Displays a message when no posts are found.
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

        <article id="post-0" class="<?php hybrid_entry_class(); ?>">

          <header class="entry-header">
            <h1 class="entry-title"><?php __( 'Nothing found', 'alku' ); ?></h1><!-- .entry-title -->
          </header>

          <div class="entry-content">
            <p>
              <?php _e( 'Apologies, but no entries were found.', 'alku' ); ?>
            </p>
          </div><!-- .entry-content -->

        </article><!-- .hentry .format-standard -->

<?php do_atomic( 'entry_after' ); // alku_entry_after ?>