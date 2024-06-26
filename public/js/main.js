(function ($) {
  "use strict";

  var isTrans = false;
  
  // Preloader
  $(window).on('load', function () {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function () {
        $(this).remove();
      });
    }
  });

  switch(window.location.pathname) {
	case "/":
		$('#navbarDefault [data-id="home"]').addClass("active")
		isTrans = true;
		break;
	case "/contact":
		$('.logo').attr('src', '/images/erb-logo.png')
		$('#navbarDefault [data-id="contact"]').addClass("active")
		$('.navbar-default').addClass('navbar-white-top');
		$('.navbar-default').css("background", "#fff")
		$('.section-footer').hide();
	break;
	case "/house-and-lot":
		$('#navbarDefault [data-id="house-and-lot"]').addClass("active")
		break;
	case "/condominium":
		$('#navbarDefault [data-id="condominium"]').addClass("active")
		break;
	case "/for-rent":
		$('.logo').attr('src', '/images/erb-logo.png')
		$('#navbarDefault [data-id="properties"]').addClass("active")
		$('.navbar-default').addClass('navbar-white-top');
		$('.navbar-default').css("background", "#fff")
		$('.proptery-tag-1').remove()
		break;
  }

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 50) {
		//$('#searchButton').addClass("search-button-lg");
		// $('#searchButon').css("top", "120px")
		// $('#backtotop').fadeIn('slow');
    } else {
		//$('#searchButton').removeClass("search-button-lg");
		// $('#searchButon').css("top", "180px")
		//$('#backtotop').fadeOut('slow');
	
		if(window.location.pathname != '/contact')
			$('.navbar-default').removeAttr("style");
    }
  });
  
  $('#backtotop').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });
  
	var nav = $('nav');
	var navHeight = nav.outerHeight();

	/*--/ ScrollReveal /Easy scroll animations for web and mobile browsers /--*/
	window.sr = ScrollReveal();
	sr.reveal('.foo', { duration: 800, delay: 10 });

	/*--/ Carousel owl /--*/
	$('#carousel').owlCarousel({
		loop: true,
		margin: -1,
		items: 1,
		nav: true,
		navText: ['<i class="ion-ios-arrow-back" aria-hidden="true"></i>', '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'],
		autoplay: true,
		autoplayTimeout: 3000,
		autoplayHoverPause: true
	});

	/*--/ Animate Carousel /--*/
	$('.intro-carousel').on('translate.owl.carousel', function () {
		$('.intro-content .intro-title').removeClass('zoomIn animated').hide();
		$('.intro-content .intro-price').removeClass('fadeInUp animated').hide();
		$('.intro-content .intro-title-top, .intro-content .spacial').removeClass('fadeIn animated').hide();
	});

	$('.intro-carousel').on('translated.owl.carousel', function () {
		$('.intro-content .intro-title').addClass('zoomIn animated').show();
		$('.intro-content .intro-price').addClass('fadeInUp animated').show();
		$('.intro-content .intro-title-top, .intro-content .spacial').addClass('fadeIn animated').show();
	});

	/*--/ Navbar Collapse /--*/
	$('.navbar-toggle-box-collapse').on('click', function () {
		$('body').removeClass('box-collapse-closed').addClass('box-collapse-open');
	});
	$('.close-box-collapse, .click-closed').on('click', function () {
		$('body').removeClass('box-collapse-open').addClass('box-collapse-closed');
		$('.menu-list ul').slideUp(700);
	});

	/*--/ Navbar Menu Reduce /--*/
	$(window).bind('scroll', function () {
		var pixels = 2;
		var top = 100;

		if(isTrans) {
			if ($(window).scrollTop() > pixels) {
				$('.black-header').addClass('black-header-trans');
				$('.navbar-default').addClass('navbar-reduce');
				$('.navbar-default').removeClass('navbar-trans');
				$('.logo').attr('src', '/images/erb-logo.png')
			} else {
				$('.black-header').removeClass('black-header-trans');
				$('.navbar-default').addClass('navbar-trans');
				$('.navbar-default').removeClass('navbar-reduce');
				$('.logo').attr('src', '/images/erb-logo-white.png')
			}
		}
		else
		{
			$('.logo').attr('src', '/images/erb-logo.png')
			$('.navbar-default').addClass('navbar-reduce');
			$('.navbar-default').removeClass('navbar-trans');
		}
		
		
		if ($(window).scrollTop() > top) {
			$('.black-header').addClass('black-header-trans');
			$('.scrolltop-mf').fadeIn(1000, "easeInOutExpo");
		} else {
			$('.black-header').removeClass('black-header-trans');
			$('.scrolltop-mf').fadeOut(1000, "easeInOutExpo");
		}
	});

	$(window).trigger('scroll');


	/*--/ Property owl /--*/
	$('#property-carousel').owlCarousel({
		loop: true,
		margin: 30,
		responsive: {
			0: {
				items: 1,
			},
			769: {
				items: 2,
			},
			992: {
				items: 3,
			}
		}
	});

	/*--/ Property owl owl /--*/
	$('#property-single-carousel').owlCarousel({
		loop: true,
		margin: 0,  
		nav: true,
		navText: ['<i class="ion-ios-arrow-back" aria-hidden="true"></i>', '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'],
		responsive: {
			0: {
				items: 1,
			}
		}
	});

	/*--/ News owl /--*/
	$('#new-carousel').owlCarousel({
		loop: true,
		margin: 30,
		responsive: {
			0: {  
				items: 1,
			},
			769: {
				items: 2,
			},
			992: {
				items: 3,
			}
		}
	});

	/*--/ Testimonials owl /--*/
	$('#testimonial-carousel').owlCarousel({
		margin: 0,
		autoplay: true,
		nav: true,
		animateOut: 'fadeOut',
		animateIn: 'fadeInUp',
		navText: ['<i class="ion-ios-arrow-back" aria-hidden="true"></i>', '<i class="ion-ios-arrow-forward" aria-hidden="true"></i>'],
		autoplayTimeout: 4000,
		autoplayHoverPause: true,
		responsive: {
			0: {
				items: 1,
			}
		}
	});
})(jQuery);
