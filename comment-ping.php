<?php 
/**
 * Comment Template
 *
 * Displays an individual comment. This can be overwritten by templates specific
 * to the comment type (comment.php, comment-{$comment_type}.php, comment-pingback.php,
 * comment-trackback.php) in a child theme.
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */

global $post, $comment; ?>

            <li id="comment-item-<?php comment_ID(); ?>" class="<?php hybrid_comment_class(); ?>">
                  <?php  echo apply_atomic_shortcode( 'comment_header_meta', '[comment-author] [comment-published]' ); ?>
            </li><!-- #comment-item-<?php comment_ID(); ?> .comment-->