<?php 
/**
 * Content Footer Template
 *
 * Displays the Post/Page footer information, i.e (tags).
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

          <footer class="entry-footer">

            <?php if ( is_home() && false == $format ) : ?>
              <?php echo apply_atomic_shortcode( 'entry_more_link', '<a class="more-link" href="' . get_permalink() . '">' . __( 'Continue reading', 'alku' ) . '</a>' ); ?>
            <?php endif; // !is_singular() ?>

            <?php if ( !is_singular( 'page' ) ) : ?>
              <?php echo apply_atomic_shortcode( 'entry_footer_meta', __( '[entry-terms before="Tagged "]', 'alku' ) ); ?>
            <?php endif; // !is_page() ?>

            <?php if ( is_single() && false == $format ) : ?>
              <h4 class="author-info-header"><?php _e( 'About the author', 'alku' ); ?></h4>
              <?php echo apply_atomic_shortcode( 'auhthor_info', '[author-info]' ); ?>
            <?php endif; ?>
            
          </footer><!-- .entry-footer -->
