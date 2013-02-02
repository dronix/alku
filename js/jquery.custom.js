/*
 * Alku custom jQuery script
 *
 * Creates a mobile menu from a tutorial by Adi Purdila - @adipurdila
 * and sets the default arguments for the Flexsilder by WooThemes.
 *
 */
jQuery(document).ready(function($) {

  /* Mobile Menu. Props to Adi Purdila - @adipurdila */
  $('#page-nav ul:first-child').clone().appendTo('.mobile-menu-container');

  $('.mobile-menu-toggle').click(function(event){
    event.preventDefault();
    $('.mobile-menu-container').slideToggle();
  });

  /* Activate FitVids. */
  $(".entry-content").fitVids();

  /* Activate the Flexslider. */
  $('.flexslider').flexslider({
    controlNav: false,
    directionNav: false,
    smoothHeight: true,
    start: function(slider){
          $('body').removeClass('loading');
        }
  });

});