const presentationsCreatePage = document.querySelector('.presentations-create-page');

if (presentationsCreatePage) {
   const searchForm = presentationsCreatePage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = presentationsCreatePage.querySelector('.search-result'),
      body = document.querySelector('body');
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
}