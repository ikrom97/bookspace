const dashboardSidebar = document.querySelector('.dashboard-sidebar');

if (dashboardSidebar) {
   const dashboardBtn = dashboardSidebar.querySelector('.dashboard-btn');

   dashboardBtn.onclick = () => {
      dashboardSidebar.classList.toggle('hidden');
   };
}