/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/layouts/master.js ***!
  \****************************************/
//* ajax request setup 
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var body = document.querySelector('body'),
    modals = body.querySelectorAll('.modal'),
    scrollTopBtn = body.querySelector('.scroll-top-btn'); //* hide modals start

body.addEventListener('click', function (e) {
  modals.forEach(function (modal) {
    modal.classList.add('hidden');
  });
}); //* hide modals end
//* scroll to top start

window.addEventListener('scroll', function () {
  if (window.pageYOffset > 300) {
    scrollTopBtn.classList.remove('hidden');
  } else {
    scrollTopBtn.classList.add('hidden');
  }
});
$(".scroll-top-btn").click(function () {
  $("html, body").animate({
    scrollTop: 0
  }, "slow");
  return false;
}); //* scroll to top end
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/layouts/header.js ***!
  \****************************************/
var header = document.querySelector('.header'),
    body = document.querySelector('body');

if (header) {
  var countdown = function countdown() {
    var year = document.querySelector('[data-id="year"]').value,
        month = +document.querySelector('[data-id="month"]').value - 1,
        dayEl = document.querySelector('[data-id="day"]').value,
        daysEl = timesLeftEl.querySelector('[data-id="days"]'),
        hoursEl = timesLeftEl.querySelector('[data-id="hours"]'),
        minutesEl = timesLeftEl.querySelector('[data-id="minutes"]'),
        secondsEl = timesLeftEl.querySelector('[data-id="seconds"]'),
        now = new Date(),
        eventDate = new Date(year, month, dayEl),
        currentTime = now.getTime(),
        eventTime = eventDate.getTime(),
        remTime = eventTime - currentTime;
    var sec = Math.floor(remTime / 1000);
    var min = Math.floor(sec / 60);
    var hour = Math.floor(min / 60);
    var day = Math.floor(hour / 24);
    hour %= 24;
    min %= 60;
    sec %= 60;
    hour = hour < 10 ? "0" + hour : hour;
    min = min < 10 ? "0" + min : min;
    sec = sec < 10 ? "0" + sec : sec;
    daysEl.textContent = day;
    hoursEl.textContent = hour;
    minutesEl.textContent = min;
    secondsEl.textContent = sec;
    setTimeout(countdown, 1000);
  };

  var searchForm = header.querySelector('.search-form'),
      searchInput = searchForm.querySelector('.search-input'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      feedbackModal = header.querySelector('.feedback-modal'),
      feedbackBtn = header.querySelector('.feedback'); //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();

    if (!searchForm.classList.contains('opened')) {
      searchInput.focus();
    }

    searchForm.classList.toggle('opened');
    searchForm.reset();
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchForm.classList.remove('opened');
      searchForm.reset();
    }
  }); //* search end
  //* countdown time  

  var timesLeftEl = document.querySelector('.taken-book-deadline');
  ;

  if (timesLeftEl) {
    countdown();
  } //* feedback start


  feedbackBtn.onclick = function () {
    feedbackModal.classList.remove('hidden');
  };

  feedbackModal.addEventListener('click', function (e) {
    if (e.target.className == 'feedback-modal' || e.target.classList.contains('button--red')) {
      feedbackModal.classList.add('hidden');
    }
  }); //* feedback end
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************!*\
  !*** ./resources/js/layouts/footer.js ***!
  \****************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************!*\
  !*** ./resources/js/auth/master.js ***!
  \*************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************!*\
  !*** ./resources/js/auth/login.js ***!
  \************************************/
var loginPage = document.querySelector('.login-page');

if (loginPage) {
  var visibilityBtn = loginPage.querySelector('.visibility-button'),
      passwordInput = loginPage.querySelector('#password'); //* show || hide the password

  visibilityBtn.onclick = function () {
    if (visibilityBtn.classList.contains('visible')) {
      visibilityBtn.classList.remove('visible');
      passwordInput.setAttribute('type', 'password');
    } else {
      visibilityBtn.classList.add('visible');
      passwordInput.setAttribute('type', 'text');
    }
  };
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/components/book-card.js ***!
  \**********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************!*\
  !*** ./resources/js/pages/index.js ***!
  \*************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************!*\
  !*** ./resources/js/pages/about/index.js ***!
  \*******************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************************!*\
  !*** ./resources/js/pages/notifications/index.js ***!
  \***************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************************!*\
  !*** ./resources/js/pages/notifications/read.js ***!
  \**************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************************!*\
  !*** ./resources/js/pages/account/activities.js ***!
  \**************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************************!*\
  !*** ./resources/js/pages/account/booked-books.js ***!
  \****************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************************!*\
  !*** ./resources/js/pages/account/liked-books.js ***!
  \***************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************************!*\
  !*** ./resources/js/pages/account/presentation.js ***!
  \****************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/pages/account/profile.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************************!*\
  !*** ./resources/js/pages/account/read-books.js ***!
  \**************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/pages/account/readers.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/pages/account/sidebar.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************************!*\
  !*** ./resources/js/pages/activities/index.js ***!
  \************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************!*\
  !*** ./resources/js/pages/books/index.js ***!
  \*******************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************************!*\
  !*** ./resources/js/pages/books/read.js ***!
  \******************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************************!*\
  !*** ./resources/js/pages/presentations/index.js ***!
  \***************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************************!*\
  !*** ./resources/js/pages/ratings/active-reader.js ***!
  \*****************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************************!*\
  !*** ./resources/js/pages/ratings/disciplined-reader.js ***!
  \**********************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************************!*\
  !*** ./resources/js/pages/ratings/popular-book.js ***!
  \****************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!********************************************************!*\
  !*** ./resources/js/pages/ratings/proactive-member.js ***!
  \********************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************************!*\
  !*** ./resources/js/pages/ratings/reading-company.js ***!
  \*******************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/pages/ratings/sidebar.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************!*\
  !*** ./resources/js/pages/rules/index.js ***!
  \*******************************************/

})();

/******/ })()
;