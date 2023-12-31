$(document).ready(function () {
   $("#register_form").submit(function (e) {
      e.preventDefault();
      let url = "php/registration.php";
      let data = $(this).serialize();
      $.post(
         url,
         data,
         function (response) {
            if (response.success) {
               window.location.href = response.url;
            } else {
               alert(response.message);
            }
         },
         "json"
      );
   });
});
