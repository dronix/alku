<?php 
/**
 * Comments Template
 *
 * This template lists all the comments and displays the comment form.
 * Individual comments have their own templates.
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */

/* Return nothing if the post requires a password or if there are no comments and comments/pings are closed.  */
if ( post_password_required() || ( !have_comments() && !comments_open() && !pings_open() ) )
  return;
?>

        <div id="comments" class="comments-area">

        <?php if ( have_comments() ) : ?>

          <?php if ( !empty( $comments_by_type['comment'] ) ) { ?>
          
          <h2 class="comments-title">
            <?php comments_number( __( 'No Comments', 'alku' ), __( 'One Comment', 'alku' ), __( '% Comments', 'alku' ) ); ?>
          </h2>

          <ol class="comment-list">
            <?php wp_list_comments( 'type=comment&callback=hybrid_comments_callback' ); ?>
          </ol><!-- .comment-list -->

          <?php if ( get_option( 'page_comments' ) && 1 < get_comment_pages_count() ) : ?>

      <div class="comment-navigation">
        <?php previous_comments_link( __( '<i class="icon-chevron-left"></i><span class="next hidden-text">Previous</span>', 'alku' ) ); ?>
        <span class="page-numbers"><?php printf( __( 'Page %1$s of %2$s', 'alku' ), ( get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1 ), get_comment_pages_count() ); ?></span>
        <?php next_comments_link( __( '<i class="icon-chevron-right"></i><span class="next hidden-text">Next</span>', 'alku' ) ); ?>
      </div><!-- .comments-nav -->

    <?php endif; ?>

          <?php } if ( !empty( $comments_by_type['pings'] ) ) { ?>

          <h2 class="comments-title">Pingbacks/Trackbacks</h2>


          <ol class="comment-list">
            <?php wp_list_comments( 'type=pings&callback=hybrid_comments_callback' ); ?>
          </ol><!-- .comment-list -->


        <?php }  endif; // have_comments() ?>


        <?php if ( pings_open() && !comments_open() ) : ?>

          <p class="comments-closed ping-open">
            <?php printf( __( 'Comments are closed, but pingbacks and <a href="%s" title="Trackback URL for this post">trackbacks</a> are open.', 'alku' ), esc_url( get_trackback_url() ) ); ?>
          </p><!-- .comments-closed .pings-open -->

        <?php elseif ( !comments_open() ) : ?>

          <p class="comments-closed">
            <?php _e( 'Comments are closed.', 'alku' ); ?>
          </p><!-- .comments-closed -->

        <?php endif; ?>

        <?php comment_form(); // Load the comment form. ?>
          
        </div><!-- #comments .comments-area -->