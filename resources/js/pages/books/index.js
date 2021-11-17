const booksPage = document.querySelector('.books-page');

if (booksPage) {
   const catalogWrap = booksPage.querySelector('.catalog-dropdown'),
      catalogBtn = catalogWrap.querySelector('.catalog-dropdown__button'),
      body = document.querySelector('body');

   catalogBtn.onclick = () => {
      catalogWrap.classList.toggle('open');
   };
   body.addEventListener('click', e => {
      if (e.target.dataset.family != 'catalog') {
         catalogWrap.classList.remove('open');
      }
   });
}