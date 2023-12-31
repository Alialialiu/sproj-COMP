$(document).ready(function () {
   $("#login_form").submit(function (e) {
      e.preventDefault();
      var url = "php/validate.php";
      var data = $(this).serialize();

      $.post(
         url,
         data,
         function (response) {
            if (response.success) {
               window.location.href = response.redirect;
            } else if (!response.success) {
               alert(response.message);
            }
         },
         "json"
      );
   });
});
