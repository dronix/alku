<?php 
/**
 * Content Quote Template
 *
 * This template is used for displaying the content of a quote post-format.
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

          <?php echo apply_atomic_shortcode( 'quote_meta', '[entry-edit-link]' ); ?>
          
          <div class="entry-content">
            <i class="icon-quotes"></i>
            <?php the_content(); ?>
          </div><!-- .entry-content -->

        </article><!-- .hentry .format-standard -->

<?php do_atomic( 'entry_after' ); // alku_entry_after ?>