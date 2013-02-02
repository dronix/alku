<?php 
/**
 * Footer Template
 *
 * Displays the sites footer and closing tags for #content and
 * #page-container.
 *
 * @package Alku
 * @subpackage Template
 * @since 0.1.0
 * @author Danny Ramirez <dronixs@gmail.com>
 * @copyright Copyright (c) 2013, Danny Ramirez
 * @link(Alku, http://demo.dronix.me/alku/)
 * @license http://www.wtfpl.net/ WTFPL
 */
?>
    <?php get_sidebar( 'primary' ); // Load the sidebar-primary.php template. ?>
    
    </div><!-- #content -->

    <?php do_atomic( 'content_after' ); // alku_content_after ?>

    <footer id="page-footer">
      <?php echo apply_atomic_shortcode( 'footer_content',
                                         '<p class="credit">' . __( 'Theme: [theme-link]', 'alku' ) . '</p>' .
                                         '<p class="copyright">' . __( 'Copyright &copy; [the-year] [site-link]. Powered by [wp-link] and [hc-link].', 'alku' ) . '</p>'
                                        ); ?>
    </footer><!-- #page-footer-->

  </div><!-- #page-container -->

  <?php do_atomic( 'body_close' ); // alku_body_close ?>

  <?php wp_footer(); ?>

</body>
</html>