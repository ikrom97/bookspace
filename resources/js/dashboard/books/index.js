const booksPage = document.querySelector('.books-page');

if (booksPage) {
   const deleteBtns = booksPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = booksPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="book-id"]');

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
}