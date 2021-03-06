const header = document.querySelector('.header'),
   body = document.querySelector('body');

if (header) {
   const searchWrap = header.querySelector('.search-wrap'),
      searchForm = searchWrap.querySelector('.search-form'),
      searchInput = searchWrap.querySelector('.search-input'),
      searchBtn = searchWrap.querySelector('.search-submit-btn'),
      searchResult = header.querySelector('.search-result'),
      feedbackModal = header.querySelector('.feedback-modal'),
      feedbackBtn = header.querySelector('.feedback');
   //* search start
   searchBtn.onclick = e => {
      e.preventDefault();
      if (searchWrap.classList.contains('opened')) {
         searchWrap.classList.remove('opened');
         searchForm.reset();
         searchResult.innerHTML = '';
      } else {
         searchWrap.classList.add('opened');
         searchInput.focus();
      }
   }

   body.addEventListener('click', e => {
      if (e.target.dataset.family != 'search') {
         searchWrap.classList.remove('opened');
         searchForm.reset();
         searchResult.innerHTML = '';
      }
   });

   searchInput.onkeyup = e => {
      e.preventDefault();
      const keyword = searchInput.value;
      $.ajax({
         url: `/search?keyword=${keyword}`,

         success: function (result) {

            searchResult.innerHTML = result;

            const feedbackButton = header.querySelector('.feedback');

            feedbackButton.onclick = () => {
               feedbackModal.classList.remove('hidden');
            }
         }
      })
   }
   //* search end
   //* countdown time  
   const timesLeftEl = document.querySelector('.taken-book-deadline');
   function countdown() {
      const year = document.querySelector('[data-id="year"]').value,
         month = (+document.querySelector('[data-id="month"]').value - 1),
         dayEl = document.querySelector('[data-id="day"]').value,
         daysEl = timesLeftEl.querySelector('[data-id="days"]'),
         hoursEl = timesLeftEl.querySelector('[data-id="hours"]'),
         minutesEl = timesLeftEl.querySelector('[data-id="minutes"]'),
         secondsEl = timesLeftEl.querySelector('[data-id="seconds"]'),
         now = new Date(),
         eventDate = new Date(year, month, dayEl),
         currentTime = now.getTime(),
         eventTime = eventDate.getTime(),
         remTime = eventTime - currentTime

      let sec = Math.floor(remTime / 1000);
      let min = Math.floor(sec / 60);
      let hour = Math.floor(min / 60);
      let day = Math.floor(hour / 24);

      hour %= 24;
      min %= 60;
      sec %= 60;

      hour = (hour < 10) ? "0" + hour : hour;
      min = (min < 10) ? "0" + min : min;
      sec = (sec < 10) ? "0" + sec : sec;

      daysEl.textContent = day;
      hoursEl.textContent = hour;
      minutesEl.textContent = min;
      secondsEl.textContent = sec;

      setTimeout(countdown, 1000);
   };
   if (timesLeftEl) {
      countdown();
   }
   //* feedback start
   feedbackBtn.onclick = () => {
      feedbackModal.classList.remove('hidden');
   }
   feedbackModal.addEventListener('click', e => {
      if (e.target.className == 'feedback-modal' || e.target.classList.contains('button--red')) {
         feedbackModal.classList.add('hidden');
      }
   });
   //* feedback end
}