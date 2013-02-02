<?php 
/**
 * Content Chat Template
 *
 * This template is used for displaying the content of a chat post-format.
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
            <?php if ( is_singular( 'post' ) ) : ?>
              <?php echo apply_atomic_shortcode( 'entry_title', the_title( '<i class="icon-comment-alt"></i><h1 class="entry-title">', '</h1><!-- .entry-title -->', false ) . '[entry-edit-link]' ); ?>
            <?php else : ?>
              <?php echo apply_atomic_shortcode( 'entry_title', '<i class="icon-comment-alt"></i>[entry-title tag="h1"] [entry-edit-link]' ); ?>
            <?php endif; // is_singular() ?>
          </header><!-- .entry-header -->

          <div class="entry-content">
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<p class="page-links">' . '<span class="before">' . __( 'Pages:', 'chun' ) . '</span>', 'after' => '</p>' ) ); ?>
          </div><!-- .entry-content -->

          <?php get_template_part( 'content-footer' ); // Load the content-footer.php template ?>

        </article><!-- .hentry .format-standard -->

<?php do_atomic( 'entry_after' ); // alku_entry_after ?>