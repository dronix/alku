<?php 
/**
 * Primary Menu Template
 *
 * Displays the Primary Menu if it has active menu items.
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GPL 2.0 +
 */

if ( has_nav_menu( 'primary' ) ) : ?>

  <nav id="page-nav">

    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => '', 'menu_class' => 'menu', 'menu_id' => 'menu-main', 'fallback_cb' => '' ) ); ?>

  </nav><!-- #page-nav -->

  <a href="" class="mobile-menu-toggle">Menu<i class="icon-menu" aria-hidden="true">&equiv;</i></a>
  <div class="mobile-menu-container"></div><!-- .mobile-menu-container -->

<?php endif; ?>