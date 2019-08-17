function include(url){
  document.write('<script src="'+url+'"></script>');
  return false ;
}

/* cookie.JS
========================================================*/
//include('http://localhost/santa_clara_v3/js/jquery.cookie.js');
include('http://localhost/santa_clara_v3/js/jquery.cookie.js');


/* DEVICE.JS
========================================================*/
//include('http://localhost/santa_clara_v3/js/device.min.js');
include('http://localhost/santa_clara_v3/js/device.min.js');

/* Stick up menu
========================================================*/
//include('http://localhost/santa_clara_v3/js/tmstickup.js');
include('http://localhost/santa_clara_v3/js/tmstickup.js');
$(window).load(function() { 
  if ($('html').hasClass('desktop')) {
      $('#stuck_container').TMStickUp({
      })
  }  
});

/* Easing library
========================================================*/
//include('http://localhost/santa_clara_v3/js/jquery.easing.1.3.js');
include('http://localhost/santa_clara_v3/js/jquery.easing.1.3.js');


/* ToTop
========================================================*/
//include('http://localhost/santa_clara_v3/js/jquery.ui.totop.js');
include('http://localhost/santa_clara_v3/js/jquery.ui.totop.js');
$(function () {   
  $().UItoTop({ easingType: 'easeOutQuart' });
});

/* DEVICE.JS AND SMOOTH SCROLLIG
========================================================*/
//include('http://localhost/santa_clara_v3/js/jquery.mousewheel.min.js');
include('http://localhost/santa_clara_v3/js/jquery.mousewheel.min.js');
//include('http://localhost/santa_clara_v3/js/jquery.simplr.smoothscroll.min.js');
include('http://localhost/santa_clara_v3/js/jquery.simplr.smoothscroll.min.js');

$(function () { 
  if ($('html').hasClass('desktop')) {
      $.srSmoothscroll({
        step:150,
        speed:800
      });
  }   
});

/* Copyright Year
========================================================*/
var currentYear = (new Date).getFullYear();
$(document).ready(function() {
  $("#copyright-year").text( (new Date).getFullYear() );
});


/* Superfish menu
========================================================*/
//include('http://localhost/santa_clara_v3/js/superfish.js');
include('http://localhost/santa_clara_v3/js/superfish.js');
//include('http://localhost/santa_clara_v3/js/jquery.mobilemenu.js');
include('http://localhost/santa_clara_v3/js/jquery.mobilemenu.js');


/* Orientation tablet fix
========================================================*/
$(function(){
// IPad/IPhone
	var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
	ua = navigator.userAgent,

	gestureStart = function () {viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";},

	scaleFix = function () {
		if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
			viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
			document.addEventListener("gesturestart", gestureStart, false);
		}
	};
	
	scaleFix();
	// Menu Android
	if(window.orientation!=undefined){
  var regM = /ipod|ipad|iphone/gi,
   result = ua.match(regM)
  if(!result) {
   $('.sf-menu li').each(function(){
    if($(">ul", this)[0]){
     $(">a", this).toggle(
      function(){
       return false;
      },
      function(){
       window.location.href = $(this).attr("href");
      }
     );
    } 
   })
  }
 }
});
var ua=navigator.userAgent.toLocaleLowerCase(),
 regV = /ipod|ipad|iphone/gi,
 result = ua.match(regV),
 userScale="";
if(!result){
 userScale=",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0'+userScale+'">')




/* Owl Carousel
========================================================*/
;(function ($) {
    var o = $('.owl-carousel');
    if (o.length > 0) {
        include('js/owl.carousel.min.js');
        $(document).ready(function () {
            o.owlCarousel({
                margin: 30,
                smartSpeed: 450,
                loop: true,
                dots: true,
                dotsEach: 1,
                nav: true,
                navClass: ['owl-prev fa fa-angle-left', 'owl-next fa fa-angle-right'],
                responsive: {
                    0: { items : 1 },
                    480: { items: 2 },
                    768: { items: 5},
                    980: { items: 7},
                    1200: { items: 8}
                }
            });
        });
    }
})(jQuery);


$(document).ready(function () {
    $(document).on('click', '.del-close-icon', function(event) {
        event.preventDefault();
        $(".delivery").hide();
    });
});
