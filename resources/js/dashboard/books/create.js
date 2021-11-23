const booksCreatePage = document.querySelector('.books-create-page');

if (booksCreatePage) {
   const imageInputs = booksCreatePage.querySelectorAll('.form-img-input'),
      searchForm = booksCreatePage.querySelector('.search-form'),
      searchBtn = searchForm.querySelector('.search-submit-btn'),
      searchInput = searchForm.querySelector('.search-input'),
      searchResult = booksCreatePage.querySelector('.search-result'),
      body = document.querySelector('body');
   //* tempstore books images start
   imageInputs.forEach(imageInput => {
      imageInput.onchange = () => {
         const type = imageInput.dataset.type,
            imageSize = imageInput.files[0].size / 1024,
            label = booksCreatePage.querySelector(`[data-label="${type}"]`),
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
            url: `/books/tempstore?type=${type}`,
            data: file,
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,

            success: function (response) {
               const images = booksCreatePage.querySelectorAll(`[data-img="${type}"]`);
               images.forEach(image => {
                  image.src = response;
               });
            }
         });
      }
   })
   //* tempstore books images end
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
         url: `/books/search?keyword=${keyword}`,

         success: function (result) {
            searchResult.innerHTML = result;
         }
      })
   }
   //* search end
}