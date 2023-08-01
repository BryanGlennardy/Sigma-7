/*------------------------------------------------------------------
Template Name:  N. agency - Responisve Landing Page for Agency
Version:        1.0
Last update:    12/17/2017
Author:         tabthemes
URL:            http://www.tabthemes.com/
-------------------------------------------------------------------*/

$(function () {
	'use strict';

/*--------------------------------------------------
    WOW Effects Animation
---------------------------------------------------*/

  var wow = new WOW({
    boxClass:     'wow',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       100,          // distance to the element when triggering the animation (default is 0)
    mobile:       false        // trigger animations on mobile devices (true is default)
  });
  wow.init();


/*--------------------------------------------------
    Preloader Page 
---------------------------------------------------*/

  $(window).load(function () {
    $("#preloader").delay(600).fadeOut("slow");
  });


/*--------------------------------------------------
    Menu Features 
---------------------------------------------------*/

  // Sticky Navigation
  
  $(window).scroll(function(){
    if ($(window).scrollTop() > 1 && $('.navbar-toggle').is(":hidden")){
      $('.navigation-overlay, .navigation, .nav-solid').addClass("sticky");
      $('.logo-wrap').addClass("shrink");
    } else {
      $('.navigation-overlay, .navigation, .nav-solid').removeClass("sticky");
      $('.logo-wrap').removeClass("shrink");
    }
  });
  
  // Closes the Responsive Menu on Menu Item Click        
  $('.navbar-collapse ul li a').on('click',function() {
    $(".navbar-collapse").collapse('hide');
  });
  
  // Mobile Menu Resize
  $(".navbar .navbar-collapse").css("max-height", $(window).height() - $(".navbar-header").height() );
  

/*--------------------------------------------------
    CountTo Facts 
---------------------------------------------------*/

  $('.countup').appear(function() {
    var count_element =  $(this);
        count_element.countTo({
          from: 0,
          to: parseInt( count_element.text() , 10 ) ,
          speed: 3000
        });
  });


/* ---------------------------------------------
 Height 100%
 --------------------------------------------- */

  $(function () {
      $(".js-height-full").height($(window).height());
      $(".js-height-parent").each(function(){
          $(this).height($(this).parent().first().height());
      });
  });


/*--------------------------------------------------
  Back to Top
---------------------------------------------------*/

  if ($('#back-to-top').length) {
    var scrollTrigger = 100, // px
        backToTop = function() {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#back-to-top').addClass('show');
            } else {
                $('#back-to-top').removeClass('show');
            }
        };
    backToTop();
    $(window).on('scroll', function() {
        backToTop();
    });
    $('#back-to-top').on('click', function(e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });
  }


});
