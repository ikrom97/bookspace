const dashboardSidebar = document.querySelector('.dashboard-sidebar');

if (dashboardSidebar) {
   const dashboardBtn = dashboardSidebar.querySelector('.dashboard-btn');

   dashboardBtn.onclick = e => {
      e.preventDefault();
      dashboardSidebar.classList.toggle('hidden');
      $.ajax({
         url: `/dashboard/sidebar`,

         success: function (response) {
         }
      })
   };
}