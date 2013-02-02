<?php 
/**
 * Primary Sidebar Template
 *
 * Displays the widgets of the Primary sidebar if any have been added through the widgets
 * screen by the user. Display nothing if there are no widgets.
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */

if ( is_active_sidebar( 'primary' ) ) : ?>

      <?php do_atomic( 'sidebar_primary_before' ); // alku_sidebar_primary_before ?>

      <section id="sidebar" class="widget-area" role="complementary">

        <?php dynamic_sidebar( 'primary' ); ?>

      </section><!-- #sidebar .sidebar -->

      <?php do_atomic( 'sidebar_primary_after' ); // alku_sidebar_primary_after ?>

<?php endif; // is_active_sidebar() ?>