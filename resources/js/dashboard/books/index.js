const booksPage = document.querySelector('.books-page');

if (booksPage) {
   const deleteBtns = booksPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = booksPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="book-id"]'),
      searchForm = booksPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = booksPage.querySelector('.search-result'),
      body = document.querySelector('body');

   deleteBtns.forEach(button => {
      button.onclick = () => {
         deleteInput.value = button.dataset.book;
         deleteModal.classList.remove('hidden');
      };
   });
   deleteModal.addEventListener('click', e => {
      if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
         deleteModal.classList.add('hidden');
      }
   });
   //* search start
   searchBtn.onclick = e => {
      e.preventDefault();
   }
   body.addEventListener('click', e => {
      if (e.target.dataset.family != 'search') {
         searchForm.reset();
         searchResult.innerHTML = '';
      }
   });
   searchInput.onkeyup = e => {
      e.preventDefault();
      const keyword = searchInput.value;
      $.ajax({
         url: `/books/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
}