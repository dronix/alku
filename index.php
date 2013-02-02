<?php 
/**
 * Index Template
 *
 * This is the main template. If a more specific template can't be found then
 * this is the template that will be used.
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

    <?php do_atomic( 'content_before' ); // alku_content_before ?>

    <div id="content">

      <?php do_atomic( 'main_before' ); // alku_main_before ?>
      
      <section id="main" class="site-content" role="main">

        <?php get_template_part( 'loop-meta' ); // Load the loop-meta.php template. ?>

        <?php if ( have_posts() ) : ?>

          <?php /* Start the WordPress loop. */ ?>

          <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'content', ( post_type_supports( get_post_type(), 'post-formats' ) ? get_post_format() : get_post_type() ) ); ?>

            <?php if ( is_singular() ) : ?>

              <?php get_template_part( 'loop-nav' ); // Load the loop-nav.php template. ?>

              <?php comments_template( '/comments.php', true ); // Load the comments.php template. ?>

            <?php endif; // is_singular() ?>

          <?php endwhile; ?>

          <?php if ( ! is_singular() ) : ?>

            <?php get_template_part( 'loop-nav' ); // Load the loop-nav.php template. ?>

          <?php endif; // !is_singular() ?>

        <?php else : ?>

          <?php get_template_part( 'loop-error' ); // Load the loop-error.php template. ?>

        <?php endif; // have_posts() ?>

      </section><!-- #main .site-content -->

      <?php do_atomic( 'main_after' ); // alku_main_after ?>

<?php get_footer(); // Load the footer.php template ?>
