const activitiesCreatePage = document.querySelector('.activities-create-page');

if (activitiesCreatePage) {
   const searchForm = activitiesCreatePage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = activitiesCreatePage.querySelector('.search-result'),
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
         url: `/activities/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
   //* datetime picker start
   $('#start').dateTimePicker({
      dateFormat: "YYYY-MM-DD HH:mm",
      locale: 'ru',
      showTime: true,
      selectData: "now",
      positionShift: { top: 20, left: 0 },
      title: "Select Date and Time",
      buttonTitle: "Select"
   });
   $('#end').dateTimePicker({
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