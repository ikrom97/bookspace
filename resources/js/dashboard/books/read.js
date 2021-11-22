const bookReadPage = document.querySelector('.books-read-page');

if (bookReadPage) {
   const ratingWrap = bookReadPage.querySelector('.rating-wrap'),
      ratingBtn = ratingWrap.querySelector('.book-link--rate'),
      imageInputs = bookReadPage.querySelectorAll('.form-img-input'),
      body = document.querySelector('body');
   //* rating start
   ratingBtn.onclick = () => {
      ratingWrap.classList.toggle('open');
   };

   body.addEventListener('click', e => {
      if (e.target.dataset.family != 'rating') {
         ratingWrap.classList.remove('open');
      }
   });
   //* rating end
   //* tempstore books images start
   imageInputs.forEach(imageInput => {
      imageInput.onchange = () => {
         const type = imageInput.dataset.type,
            imageSize = imageInput.files[0].size / 1024,
            label = bookReadPage.querySelector(`[data-label="${type}"]`),
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
               const images = bookReadPage.querySelectorAll(`[data-img="${type}"]`);
               images.forEach(image => {
                  image.src = response;
               });
            }
         });
      }
   })
   //* tempstore books images end
}

