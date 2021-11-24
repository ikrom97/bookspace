/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************************!*\
  !*** ./resources/js/dashboard/master.js ***!
  \******************************************/
//* ajax request setup 
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
var body = document.querySelector('body'),
    modals = body.querySelectorAll('.modal'); //* hide modals start

body.addEventListener('click', function (e) {
  modals.forEach(function (modal) {
    modal.classList.add('hidden');
  });
}); //* hide modals end
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************!*\
  !*** ./resources/js/dashboard/sidebar.js ***!
  \*******************************************/
var dashboardSidebar = document.querySelector('.dashboard-sidebar');

if (dashboardSidebar) {
  var dashboardBtn = dashboardSidebar.querySelector('.dashboard-btn');

  dashboardBtn.onclick = function (e) {
    e.preventDefault();
    dashboardSidebar.classList.toggle('hidden');
    $.ajax({
      url: "/dashboard/sidebar",
      success: function success(response) {}
    });
  };
}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!****************************************************!*\
  !*** ./resources/js/dashboard/activities/index.js ***!
  \****************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************************!*\
  !*** ./resources/js/dashboard/activities/create.js ***!
  \*****************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************************!*\
  !*** ./resources/js/dashboard/activities/read.js ***!
  \***************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************************!*\
  !*** ./resources/js/dashboard/activities/update.js ***!
  \*****************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/dashboard/books/index.js ***!
  \***********************************************/
var booksPage = document.querySelector('.books-page');

if (booksPage) {
  var deleteBtns = booksPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = booksPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="book-id"]'),
      searchForm = booksPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = booksPage.querySelector('.search-result'),
      body = document.querySelector('body');
  deleteBtns.forEach(function (button) {
    button.onclick = function () {
      deleteInput.value = button.dataset.book;
      deleteModal.classList.remove('hidden');
    };
  });
  deleteModal.addEventListener('click', function (e) {
    if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
      deleteModal.classList.add('hidden');
    }
  }); //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchForm.reset();
      searchResult.innerHTML = '';
    }
  });

  searchInput.onkeyup = function (e) {
    e.preventDefault();
    var keyword = searchInput.value;
    $.ajax({
      url: "/books/search?keyword=".concat(keyword),
      success: function success(result) {
        searchResult.innerHTML = result;
      }
    });
  }; //* search end

}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************************!*\
  !*** ./resources/js/dashboard/books/create.js ***!
  \************************************************/
var booksCreatePage = document.querySelector('.books-create-page');

if (booksCreatePage) {
  var imageInputs = booksCreatePage.querySelectorAll('.form-img-input'),
      searchForm = booksCreatePage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = booksCreatePage.querySelector('.search-result'),
      body = document.querySelector('body'); //* tempstore books images start

  imageInputs.forEach(function (imageInput) {
    imageInput.onchange = function () {
      var type = imageInput.dataset.type,
          imageSize = imageInput.files[0].size / 1024,
          label = booksCreatePage.querySelector("[data-label=\"".concat(type, "\"]")),
          file = new FormData();

      if (imageSize > 200) {
        label.classList.add('error');
        return;
      } else {
        label.classList.remove('error');
      }

      file.append('file', imageInput.files[0]);
      $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: "/books/tempstore?type=".concat(type),
        data: file,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function success(response) {
          var images = booksCreatePage.querySelectorAll("[data-img=\"".concat(type, "\"]"));
          images.forEach(function (image) {
            image.src = response;
          });
        }
      });
    };
  }); //* tempstore books images end
  //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchForm.reset();
      searchResult.innerHTML = '';
    }
  });

  searchInput.onkeyup = function (e) {
    e.preventDefault();
    var keyword = searchInput.value;
    $.ajax({
      url: "/books/search?keyword=".concat(keyword),
      success: function success(result) {
        searchResult.innerHTML = result;
      }
    });
  }; //* search end

}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/dashboard/books/read.js ***!
  \**********************************************/
var bookReadPage = document.querySelector('.books-read-page');

if (bookReadPage) {
  var ratingWrap = bookReadPage.querySelector('.rating-wrap'),
      ratingBtn = ratingWrap.querySelector('.book-link--rate'),
      imageInputs = bookReadPage.querySelectorAll('.form-img-input'),
      deleteBtn = bookReadPage.querySelector('.toolbar-delete'),
      deleteModal = bookReadPage.querySelector('.delete-modal'),
      searchForm = bookReadPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = bookReadPage.querySelector('.search-result'),
      body = document.querySelector('body'); //* rating start

  ratingBtn.onclick = function () {
    ratingWrap.classList.toggle('open');
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'rating') {
      ratingWrap.classList.remove('open');
    }
  }); //* rating end
  //* tempstore books images start

  imageInputs.forEach(function (imageInput) {
    imageInput.onchange = function () {
      var type = imageInput.dataset.type,
          imageSize = imageInput.files[0].size / 1024,
          label = bookReadPage.querySelector("[data-label=\"".concat(type, "\"]")),
          file = new FormData();

      if (imageSize > 200) {
        label.classList.add('error');
        return;
      } else {
        label.classList.remove('error');
      }

      file.append('file', imageInput.files[0]);
      $.ajax({
        type: 'POST',
        enctype: 'multipart/form-data',
        url: "/books/tempstore?type=".concat(type),
        data: file,
        processData: false,
        contentType: false,
        cache: false,
        timeout: 600000,
        success: function success(response) {
          var images = bookReadPage.querySelectorAll("[data-img=\"".concat(type, "\"]"));
          images.forEach(function (image) {
            image.src = response;
          });
        }
      });
    };
  }); //* tempstore books images end
  //* delete modal start

  deleteBtn.onclick = function () {
    deleteModal.classList.remove('hidden');
  };

  deleteModal.addEventListener('click', function (e) {
    if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
      deleteModal.classList.add('hidden');
    }
  }); //* delete modal end
  //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchForm.reset();
      searchResult.innerHTML = '';
    }
  });

  searchInput.onkeyup = function (e) {
    e.preventDefault();
    var keyword = searchInput.value;
    $.ajax({
      url: "/books/search?keyword=".concat(keyword),
      success: function success(result) {
        searchResult.innerHTML = result;
      }
    });
  }; //* search end

}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/dashboard/news/index.js ***!
  \**********************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***************************************************!*\
  !*** ./resources/js/dashboard/companies/index.js ***!
  \***************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************************************!*\
  !*** ./resources/js/dashboard/presentations/index.js ***!
  \*******************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!********************************************************!*\
  !*** ./resources/js/dashboard/presentations/create.js ***!
  \********************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************************************!*\
  !*** ./resources/js/dashboard/presentations/read.js ***!
  \******************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!********************************************************!*\
  !*** ./resources/js/dashboard/presentations/update.js ***!
  \********************************************************/

})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!***********************************************!*\
  !*** ./resources/js/dashboard/users/index.js ***!
  \***********************************************/
var usersPage = document.querySelector('.users-page');

if (usersPage) {
  var deleteBtns = usersPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = usersPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="user-id"]'),
      searchForm = usersPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = usersPage.querySelector('.search-result'),
      body = document.querySelector('body');
  deleteBtns.forEach(function (button) {
    button.onclick = function () {
      deleteInput.value = button.dataset.user;
      deleteModal.classList.remove('hidden');
    };
  });
  deleteModal.addEventListener('click', function (e) {
    if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
      deleteModal.classList.add('hidden');
    }
  }); //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchForm.reset();
      searchResult.innerHTML = '';
    }
  });

  searchInput.onkeyup = function (e) {
    e.preventDefault();
    var keyword = searchInput.value;
    $.ajax({
      url: "/users/search?keyword=".concat(keyword),
      success: function success(result) {
        searchResult.innerHTML = result;
      }
    });
  }; //* search end

}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************************!*\
  !*** ./resources/js/dashboard/users/create.js ***!
  \************************************************/
var userCreatePage = document.querySelector('.users-create-page');

if (userCreatePage) {
  var searchForm = userCreatePage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = userCreatePage.querySelector('.search-result'),
      imageInput = userCreatePage.querySelector('.form-img-input'),
      body = document.querySelector('body'); //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchForm.reset();
      searchResult.innerHTML = '';
    }
  });

  searchInput.onkeyup = function (e) {
    e.preventDefault();
    var keyword = searchInput.value;
    $.ajax({
      url: "/users/search?keyword=".concat(keyword),
      success: function success(result) {
        searchResult.innerHTML = result;
      }
    });
  }; //* search end
  //* tempstore books images start


  imageInput.onchange = function () {
    var imageSize = imageInput.files[0].size / 1024,
        avatarWrap = userCreatePage.querySelector('.form-avatar-wrap'),
        file = new FormData();

    if (imageSize > 200) {
      avatarWrap.classList.add('error');
      return;
    } else {
      avatarWrap.classList.remove('error');
    }

    file.append('file', imageInput.files[0]);
    $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: '/users/tempstore',
      data: file,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      success: function success(response) {
        console.log(response);
        var image = userCreatePage.querySelector('.form-avatar');
        image.src = response;
      }
    });
  }; //* tempstore books images end

}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**********************************************!*\
  !*** ./resources/js/dashboard/users/read.js ***!
  \**********************************************/
var userReadPage = document.querySelector('.users-read-page');

if (userReadPage) {
  var deleteBtn = userReadPage.querySelector('.toolbar-delete'),
      deleteModal = userReadPage.querySelector('.delete-modal'),
      searchForm = userReadPage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = userReadPage.querySelector('.search-result'),
      imageInput = userReadPage.querySelector('.form-img-input'),
      body = document.querySelector('body'); //* delete modal start

  deleteBtn.onclick = function () {
    deleteModal.classList.remove('hidden');
  };

  deleteModal.addEventListener('click', function (e) {
    if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
      deleteModal.classList.add('hidden');
    }
  }); //* delete modal end
  //* search start

  searchBtn.onclick = function (e) {
    e.preventDefault();
  };

  body.addEventListener('click', function (e) {
    if (e.target.dataset.family != 'search') {
      searchForm.reset();
      searchResult.innerHTML = '';
    }
  });

  searchInput.onkeyup = function (e) {
    e.preventDefault();
    var keyword = searchInput.value;
    $.ajax({
      url: "/users/search?keyword=".concat(keyword),
      success: function success(result) {
        searchResult.innerHTML = result;
      }
    });
  }; //* search end
  //* tempstore books images start


  imageInput.onchange = function () {
    var imageSize = imageInput.files[0].size / 1024,
        avatarWrap = userReadPage.querySelector('.form-avatar-wrap'),
        file = new FormData();

    if (imageSize > 200) {
      avatarWrap.classList.add('error');
      return;
    } else {
      avatarWrap.classList.remove('error');
    }

    file.append('file', imageInput.files[0]);
    $.ajax({
      type: 'POST',
      enctype: 'multipart/form-data',
      url: '/users/tempstore',
      data: file,
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000,
      success: function success(response) {
        console.log(response);
        var image = userReadPage.querySelector('.form-avatar');
        image.src = response;
      }
    });
  }; //* tempstore books images end

}
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************************!*\
  !*** ./resources/js/dashboard/library/index.js ***!
  \*************************************************/

})();

/******/ })()
;