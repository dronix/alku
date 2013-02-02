<?php 
/**
 * Content Attachment Template
 *
 * This template is used for displaying the content of a single attachment.
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

          <header class="entry-header">
              <?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'size' => 'full', 'image_class' => 'wp-post-image', 'link_to_post' => false ) ); ?>
              <?php echo apply_atomic_shortcode( 'entry_title', the_title( '<h1 class="entry-title">', '</h1><!-- .entry-title -->', false ) . '[entry-edit-link]' ); ?>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <?php the_excerpt(); ?>
            <?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'chun' ) . '</span>', 'after' => '</p>' ) ); ?>
          </div><!-- .entry-content -->

        </article><!-- .hentry .format-standard -->

        <div class="loop-navigation">
          <?php previous_image_link( '%link', '<i class="icon-chevron-left"></i><span class="prev hidden-text">' . __( 'Previous', 'alku' ) . '</span>' ); ?>
          <?php next_image_link( '%link', '<i class="icon-chevron-right"></i><span class="next hidden-text">' . __( 'Next', 'alku' ) . '</span>' ); ?>
        </div><!-- .loop-navigation -->

<?php do_atomic( 'entry_after' ); // alku_entry_after ?>