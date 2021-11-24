const presentationsPage = document.querySelector('.presentations-read-page');

if (presentationsPage) {
   const deleteBtn = presentationsPage.querySelector('.toolbar-delete'),
      deleteModal = presentationsPage.querySelector('.delete-modal'),
      searchForm = presentationsPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = presentationsPage.querySelector('.search-result'),
      body = document.querySelector('body');
   //* datetime picker start
   $('#picker').dateTimePicker({
      dateFormat: "YYYY-MM-DD HH:mm",
      locale: 'ru',
      showTime: true,
      selectData: "now",
      positionShift: { top: 20, left: 0 },
      title: "Select Date and Time",
      buttonTitle: "Select"
   });
   //* datetime picker end
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
         url: `/presentations/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
}

