const accountPresentationPage = document.querySelector('.account-presentation-page');

if (accountPresentationPage) {
   $('#picker').dateTimePicker({
      dateFormat: "YYYY-MM-DD HH:mm",
      locale: 'ru',
      showTime: true,
      selectData: "now",
      positionShift: { top: 20, left: 0 },
      title: "Select Date and Time",
      buttonTitle: "Select"
   });
}