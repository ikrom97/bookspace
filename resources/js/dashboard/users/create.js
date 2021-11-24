const userCreatePage = document.querySelector('.users-create-page');

if (userCreatePage) {
   const searchForm = userCreatePage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = userCreatePage.querySelector('.search-result'),
      imageInput = userCreatePage.querySelector('.form-img-input'),
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
         url: `/users/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
   //* tempstore books images start
   imageInput.onchange = () => {
      const imageSize = imageInput.files[0].size / 1024,
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

         success: function (response) {
            console.log(response);
            const image = userCreatePage.querySelector('.form-avatar');
            image.src = response;
         }
      });
   }
   //* tempstore books images end
}

