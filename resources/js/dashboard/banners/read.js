const bannersReadPage = document.querySelector('.banners-read-page');

if (bannersReadPage) {
   const deleteBtn = bannersReadPage.querySelector('.toolbar-delete'),
      deleteModal = bannersReadPage.querySelector('.delete-modal'),
      searchForm = bannersReadPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = bannersReadPage.querySelector('.search-result'),
      body = document.querySelector('body');
   //* delete modal start
   deleteBtn.onclick = () => {
      deleteModal.classList.remove('hidden');
   };
   deleteModal.addEventListener('click', e => {
      if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
         deleteModal.classList.add('hidden');
      }
   });
   //* delete modal end
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

