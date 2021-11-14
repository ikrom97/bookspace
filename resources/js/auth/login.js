const loginPage = document.querySelector('.login-page');
if (loginPage) {
   const visibilityBtn = loginPage.querySelector('.visibility-button'),
      passwordInput = loginPage.querySelector('#password');
   //* show || hide the password
   visibilityBtn.onclick = () => {
      if (visibilityBtn.classList.contains('visible')) {
         visibilityBtn.classList.remove('visible');
         passwordInput.setAttribute('type', 'password');
      } else {
         visibilityBtn.classList.add('visible');
         passwordInput.setAttribute('type', 'text');
      }
   }
}