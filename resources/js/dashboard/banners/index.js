const bannersPage = document.querySelector('.banners-page');

if (bannersPage) {
   const deleteBtns = bannersPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = bannersPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="banner-id"]'),
      searchForm = bannersPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = bannersPage.querySelector('.search-result'),
      body = document.querySelector('body');
   //* delete banner start
   deleteBtns.forEach(button => {
      button.onclick = () => {
         deleteInput.value = button.dataset.banner;
         deleteModal.classList.remove('hidden');
      };
   });
   deleteModal.addEventListener('click', e => {
      if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
         deleteModal.classList.add('hidden');
      }
   });
   //* delete banner end
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
         url: `/banners/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
}