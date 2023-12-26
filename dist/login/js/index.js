$(document).ready(function () {
   setInterval(function () {
      $("#login").removeClass("slide-in-blurred-bottom");
   }, 650);

   // controls actions for login switch button
   let trigger = false;
   $(".switch").click(function () {
      if (!trigger) {
         $("#login").addClass("slide-in-blurred-left-reverse");
         setTimeout(function () {
            $("#login").toggleClass("d-flex d-none");
            $("#login").removeClass("slide-in-blurred-left-reverse");
            $("#register")
               .toggleClass("d-none d-flex")
               .addClass("slide-in-blurred-right");
            setTimeout(function () {
               $("#register").removeClass("slide-in-blurred-right");
               trigger = true;
            }, 650);
         }, 650);
      } else if (trigger) {
         $("#register").addClass("slide-in-blurred-right-reverse");
         setTimeout(function () {
            $("#register").toggleClass("d-flex d-none");
            $("#register").removeClass("slide-in-blurred-right-reverse");
            $("#login")
               .toggleClass("d-none d-flex")
               .addClass("slide-in-blurred-left");
            setTimeout(function () {
               $("#login").removeClass("slide-in-blurred-left");
               trigger = false;
            }, 650);
         }, 650);
      }
   });

   // --
   var confirmPass = false;
   var confirmMatch = false;
   $(".act2").addClass("highlight");
   $("#form-cont2").hide(500);
   $("#card2").hide();
   $("#form-btn-submit").css("visibility", "hidden");

   // forms-js
   $("#form-btn-nxt").click(function () {
      $("#card1").hide(500);
      $("#card2").show(500);
      $("#hide-nxt").hide();
      if (confirmPass === true && confirmMatch === true) {
         $("#form-btn-submit").css("visibility", "visible");
      }
   });
   $("#form-btn-prv").click(function () {
      $("#card1").show(500);
      $("#card2").hide(500);
      $("#form-btn-nxt").show();
      $("#form-btn-submit").css("visibility", "hidden");
   });
   $("#lgn-btn").click(function () {
      $("#form-cont1").hide(500);
      $("#form-cont2").show(500);
      $(".act1").addClass("highlight");
      $(".act2").removeClass("highlight");
   });
   $("#reg-btn").click(function () {
      $("#form-cont2").hide(500);
      $("#form-cont1").show(500);
      $(".act2").addClass("highlight");
      $(".act1").removeClass("highlight");
   });

   // prevent forms validation
   $("#passwordinp").on("input", function () {
      if ($(this).val().trim().length === 0) {
         $("#form-feedbackpass").hide(); // Clear the warning message
      } else if ($(this).val().length < 8) {
         $(".form-feedbackpass").fadeIn(700).text("Password is too short");
      } else {
         $(".form-feedbackpass").fadeIn(500).text("Strong Password");
         setTimeout(() => {
            $(".form-feedbackpass").fadeOut(500);
         }, 1000);
         confirmPass = true;
         if (confirmPass === true && confirmMatch === true) {
            $("#form-btn-submit").css("visibility", "visible");
         }
      }
   });

   $("#confirmPassword").on("input", function () {
      var Password = $("#passwordinp").val();
      var PasswordCnfrm = $("#confirmPassword").val();
      if (Password !== PasswordCnfrm) {
         $("#form-feedbackconf").fadeIn(700).text("Password NOT match");
         $("#form-btn-submit").css("visibility", "hidden");
      } else {
         $("#form-feedbackconf").text("Password match");
         setTimeout(() => {
            $("#form-feedbackconf").fadeOut(500);
         }, 1000);
         confirmMatch = true;
         if (confirmPass === true && confirmMatch === true) {
            $("#form-btn-submit").css("visibility", "visible");
         }
      }
   });
});
