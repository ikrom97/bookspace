const presentationsPage = document.querySelector('.presentations-page');

if (presentationsPage) {
   const deleteBtns = presentationsPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = presentationsPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="presentation-id"]'),
      searchForm = presentationsPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = presentationsPage.querySelector('.search-result'),
      body = document.querySelector('body');
   //* delete presentation start
   deleteBtns.forEach(button => {
      button.onclick = () => {
         deleteInput.value = button.dataset.presentation;
         deleteModal.classList.remove('hidden');
      };
   });
   deleteModal.addEventListener('click', e => {
      if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
         deleteModal.classList.add('hidden');
      }
   });
   //* delete presentation end
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
         url: `/presentations/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
}