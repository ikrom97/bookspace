const usersPage = document.querySelector('.users-page');

if (usersPage) {
   const deleteBtns = usersPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = usersPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="user-id"]'),
      searchForm = usersPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = usersPage.querySelector('.search-result'),
      body = document.querySelector('body');

   deleteBtns.forEach(button => {
      button.onclick = () => {
         deleteInput.value = button.dataset.user;
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
         url: `/users/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
}