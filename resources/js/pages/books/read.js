const bookReadPage = document.querySelector('.book-read-page');

if (bookReadPage) {
   const ratingWrap = bookReadPage.querySelector('.rating-wrap'),
      ratingBtn = ratingWrap.querySelector('.book-link--rate'),
      body = document.querySelector('body');
   //* rating start
   ratingBtn.onclick = () => {
      ratingWrap.classList.toggle('open');
   };

   body.addEventListener('click', e => {
      if (e.target.dataset.family != 'rating') {
         ratingWrap.classList.remove('open');
      }
   });
   //* rating end
   //* popular books start
   $('.popular-books-carousel').owlCarousel({
      items: 4,
      margin: 9,
      loop: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      nav: true,
   })
   //* popular books end
}