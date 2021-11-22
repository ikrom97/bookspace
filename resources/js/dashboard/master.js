//* ajax request setup 
$.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
const body = document.querySelector('body'),
   modals = body.querySelectorAll('.modal');
//* hide modals start
body.addEventListener('click', e => {
   modals.forEach(modal => {
      modal.classList.add('hidden');
   });
});
//* hide modals end