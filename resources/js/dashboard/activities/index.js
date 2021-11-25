const activitiesPage = document.querySelector('.activities-page');

if (activitiesPage) {
   const deleteBtns = activitiesPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = activitiesPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="activity-id"]'),
      searchForm = activitiesPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = activitiesPage.querySelector('.search-result'),
      body = document.querySelector('body');

   deleteBtns.forEach(button => {
      button.onclick = () => {
         deleteInput.value = button.dataset.activity;
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
         url: `/activities/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
}