//* ajax request setup 
$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
const body = document.querySelector('body'),
   modals = body.querySelectorAll('.modal'),
   scrollTopBtn = body.querySelector('.scroll-top-btn');
//* hide modals start
body.addEventListener('click', e => {
   modals.forEach(modal => {
      modal.classList.add('hidden');
   });
});
//* hide modals end
//* scroll to top start
window.addEventListener('scroll', () => {
   if (window.pageYOffset > 300) {
      scrollTopBtn.classList.remove('hidden');
   } else {
      scrollTopBtn.classList.add('hidden');
   }
});

$(".scroll-top-btn").click(function () {
   $("html, body").animate({ scrollTop: 0 }, "slow");
   return false;
});
//* scroll to top end