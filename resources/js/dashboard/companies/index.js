const companiesPage = document.querySelector('.companies-page');

if (companiesPage) {
   const deleteBtns = companiesPage.querySelectorAll('[data-action="delete"]'),
      deleteModal = companiesPage.querySelector('.delete-modal'),
      deleteInput = deleteModal.querySelector('[data-id="company-id"]'),
      createBtn = companiesPage.querySelector('[data-action="create"]'),
      createModal = companiesPage.querySelector('.create-modal'),
      createForm = createModal.querySelector('form'),
      updateBtns = companiesPage.querySelectorAll('[data-action="update"]'),
      updateModal = companiesPage.querySelector('.update-modal'),
      updateInputID = updateModal.querySelector('[data-id="company-id"]'),
      updateInputTitle = updateModal.querySelector('[data-id="title"]');
   //* create company start
   createBtn.onclick = e => {
      e.preventDefault();
      createModal.classList.remove('hidden');
   };
   createModal.addEventListener('click', e => {
      if (e.target.className == 'create-modal' || e.target.className == 'button button--red') {
         createForm.reset();
         createModal.classList.add('hidden');
      }
   });
   //* create company end
   //* update company start
   updateBtns.forEach(button => {
      button.onclick = () => {
         updateInputID.value = button.dataset.company;
         updateInputTitle.value = button.dataset.title;
         updateModal.classList.remove('hidden');
      };
   });
   updateModal.addEventListener('click', e => {
      if (e.target.className == 'update-modal' || e.target.className == 'button button--red') {
         updateModal.classList.add('hidden');
      }
   });
   //* update company end
   //* delete company start
   deleteBtns.forEach(button => {
      button.onclick = () => {
         deleteInput.value = button.dataset.company;
         deleteModal.classList.remove('hidden');
      };
   });
   deleteModal.addEventListener('click', e => {
      if (e.target.className == 'delete-modal' || e.target.className == 'button button--green') {
         deleteModal.classList.add('hidden');
      }
   });
   //* delete company end
}