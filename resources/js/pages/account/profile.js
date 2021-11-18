const accountProfilePage = document.querySelector('.account-profile-page');

if (accountProfilePage) {
   const passwordForm = accountProfilePage.querySelector('.password-form'),
      visionBtns = passwordForm.querySelectorAll('.form-password-btn');

   visionBtns.forEach(button => {
      button.onclick = () => {
         const input = passwordForm.querySelector(`[data-input="${button.dataset.button}"]`);
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