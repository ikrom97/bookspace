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

  var searchWrap = header.querySelector('.search-wrap'),
      searchForm = searchWrap.querySelector('.search-form'),
      searchInput = searchWrap.querySelector('.search-input'),
      searchBtn = searchWrap.querySelector('.search-submit-btn'),
      searchResult = header.querySelector('.search-result'),
      feedbackModal = header.querySelector('.feedback-modal'),
      feedbackBtn = header.querySelector('.feedback'); //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();

    if (searchWrap.classList.contains('opened')) {
      searchWrap.classList.remove('opened');
      searchForm.reset();
      searchResult.innerHTML = '';
    } else {
      searchWrap.classList.add('opened');
      searchInput.focus();
    }
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchWrap.classList.remove('opened');
      searchForm.reset();
      searchResult.innerHTML = '';
    }
  });

  searchInput.onkeyup = function (e) {
    e.preventDefault();
    var keyword = searchInput.value;
    $.ajax({
      url: "/search?keyword=".concat(keyword),
      success: function success(result) {
        searchResult.innerHTML = result;
        var feedbackButton = header.querySelector('.feedback');

        feedbackButton.onclick = function () {
          feedbackModal.classList.remove('hidden');
        };
      }
    });
  }; //* search end
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
/*!***********************************************!*\
  !*** ./resources/js/components/books-card.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/components/pagination.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************!*\
  !*** ./resources/js/pages/index.js ***!
  \*************************************/
var homePage = document.querySelector('.home-page');

if (homePage) {
  //* banner start
  $('.vitrin-carousel').owlCarousel({
    items: 1,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true
  }); //* banner end
  //* popular books start

  $('.popular-books-carousel').owlCarousel({
    items: 4,
    margin: 9,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true
  }); //* popular books end
}
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
var accountPresentationPage = document.querySelector('.account-presentation-page');

if (accountPresentationPage) {
  $('#picker').dateTimePicker({
    dateFormat: "YYYY-MM-DD HH:mm",
    locale: 'ru',
    showTime: true,
    selectData: "now",
    positionShift: {
      top: 20,
      left: 0
    },
    title: "Select Date and Time",
    buttonTitle: "Select"
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/pages/account/profile.js ***!
  \***********************************************/
var accountProfilePage = document.querySelector('.account-profile-page');

if (accountProfilePage) {
  var passwordForm = accountProfilePage.querySelector('.password-form'),
      visionBtns = passwordForm.querySelectorAll('.form-password-btn');
  visionBtns.forEach(function (button) {
    button.onclick = function () {
      var input = passwordForm.querySelector("[data-input=\"".concat(button.dataset.button, "\"]"));

      if (button.classList.contains('visible')) {
        button.classList.remove('visible');
        input.setAttribute('type', 'password');
      } else {
        button.classList.add('visible');
        input.setAttribute('type', 'text');
      }
    };
  });
}
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
/*!***********************************************!*\
  !*** ./resources/js/pages/activities/read.js ***!
  \***********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************!*\
  !*** ./resources/js/pages/books/index.js ***!
  \*******************************************/
var booksPage = document.querySelector('.books-page');

if (booksPage) {
  var catalogWrap = booksPage.querySelector('.catalog-dropdown'),
      catalogBtn = catalogWrap.querySelector('.catalog-dropdown__button'),
      body = document.querySelector('body');

  catalogBtn.onclick = function () {
    catalogWrap.classList.toggle('open');
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'catalog') {
      catalogWrap.classList.remove('open');
    }
  });
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************************!*\
  !*** ./resources/js/pages/books/read.js ***!
  \******************************************/
var bookReadPage = document.querySelector('.book-read-page');

if (bookReadPage) {
  var ratingWrap = bookReadPage.querySelector('.rating-wrap'),
      ratingBtn = ratingWrap.querySelector('.book-link--rate'),
      body = document.querySelector('body'); //* rating start

  ratingBtn.onclick = function () {
    ratingWrap.classList.toggle('open');
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'rating') {
      ratingWrap.classList.remove('open');
    }
  }); //* rating end
  //* popular books start

  $('.popular-books-carousel').owlCarousel({
    items: 4,
    margin: 9,
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    nav: true
  }); //* popular books end
}
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

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************!*\
  !*** ./resources/js/pages/users/index.js ***!
  \*******************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************************!*\
  !*** ./resources/js/pages/users/read.js ***!
  \******************************************/

})();

/******/ })()
;