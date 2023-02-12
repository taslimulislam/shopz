 // Hide Navbar on scroll down
 var prevScrollpos = window.pageYOffset;
 window.onscroll = function() {
     var currentScrollPos = window.pageYOffset;
     if (prevScrollpos > currentScrollPos) {
         document.getElementById("navbar").style.cssText = `
         top:0; 
         transition: all .3s ease-in-out,border 1ms linear,padding-right 0s;
       `;
     } else {
         document.getElementById("navbar").style.cssText = `
         top:-44px; 
         transition: all .3s ease-in-out,border 1ms linear,padding-right 0s;
       `; /* width horizontal navbar */
     }
     prevScrollpos = currentScrollPos;

 }



 const mainNavigation = document.querySelector(".main-navigation");
 const overlay = mainNavigation.querySelector(".overlay");
 const toggler = mainNavigation.querySelector(".navbar-toggler");

 const openSideNav = () => mainNavigation.classList.add("active");
 const closeSideNav = () => mainNavigation.classList.remove("active");
 toggler.addEventListener("click", openSideNav);
 overlay.addEventListener("click", closeSideNav);

 //  back to top button

 var btn = $('#back-to-top');

 $(window).scroll(function() {
     if ($(window).scrollTop() > 300) {
         btn.addClass('show');
     } else {
         btn.removeClass('show');
     }
 });

 btn.on('click', function(e) {
     e.preventDefault();
     $('html, body').animate({ scrollTop: 0 }, '300');
 });

 //  script for owl carousel 
 $('.owl-carousel').owlCarousel({
     loop: true,
     margin: 10,
     responsiveClass: true,
     dots: false,
     nav: true,

     responsive: {
         0: {
             items: 1,
         },
         768: {
             items: 2,
         },
         1000: {
             items: 3,
             loop: false
         }
     }
 })