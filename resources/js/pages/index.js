const homePage = document.querySelector('.home-page');
if (homePage) {
   //* banner start
   $('.vitrin-carousel').owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      nav: true,
   })
   //* banner end
   //* popular books start
   $('.popular-books-carousel').owlCarousel({
      items: 4,
      margin: 15,
      loop: true,
      autoWidth: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      nav: true,
   })
   //* popular books end
}