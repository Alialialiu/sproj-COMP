function hasval(input, target) {
   if (input) {
      $(target).removeAttr("disabled");
   } else {
      $(target).attr("disabled", "");
   }
}

$(document).ready(function () {
   setInterval(function () {
      $("#login").removeClass("slide-in-blurred-bottom");
   }, 650);

   // controls actions for login/register switch button
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
      $(":input").val("");
   });

   // sets login button disabled/!disabled when input fields are filled/empty
   let login_userInput_hasVal = false;
   login_passInput_hasVal = false;

   $("#login_username").on("input", function () {
      if ($(this).val().length > 2) {
         login_userInput_hasVal = true;
      } else {
         login_userInput_hasVal = false;
      }
      hasval(login_userInput_hasVal && login_passInput_hasVal, "#login_btn");
   });
   $("#login_password").on("input", function () {
      if ($(this).val().length > 2) {
         login_passInput_hasVal = true;
      } else {
         login_passInput_hasVal = false;
      }
      hasval(login_userInput_hasVal && login_passInput_hasVal, "#login_btn");
   });

   // sets register button disabled/!disabled when input fields are filled/empty
   let register_fnameInput_hasVal,
      register_lnameInput_hasVal,
      register_addressInput_hasVal,
      register_userInput_hasVal,
      register_passInput_hasVal,
      register_repassInput_hasVal = false;
   $("#register_fname").on("input", function () {
      if ($(this).val().length > 2) {
         register_fnameInput_hasVal = true;
      } else {
         register_fnameInput_hasVal = false;
      }
      hasval(
         register_fnameInput_hasVal &&
            register_lnameInput_hasVal &&
            register_addressInput_hasVal &&
            register_userInput_hasVal &&
            register_passInput_hasVal &&
            register_repassInput_hasVal,
         "#register_btn"
      );
   });
   $("#register_lname").on("input", function () {
      if ($(this).val().length > 2) {
         register_lnameInput_hasVal = true;
      } else {
         register_lnameInput_hasVal = false;
      }
      hasval(
         register_fnameInput_hasVal &&
            register_lnameInput_hasVal &&
            register_addressInput_hasVal &&
            register_userInput_hasVal &&
            register_passInput_hasVal &&
            register_repassInput_hasVal,
         "#register_btn"
      );
      // if (
      //    register_fnameInput_hasVal &&
      //    register_lnameInput_hasVal &&
      //    register_addressInput_hasVal &&
      //    register_userInput_hasVal &&
      //    register_passInput_hasVal &&
      //    register_repassInput_hasVal
      // ) {
      //    $("#register_btn").removeAttr("disabled");
      // } else {
      //    $("#register_btn").attr("disabled", "");
      // }
   });
   $("#register_address").on("input", function () {
      if ($(this).val().length > 2) {
         register_addressInput_hasVal = true;
      } else {
         register_addressInput_hasVal = false;
      }
      hasval(
         register_fnameInput_hasVal &&
            register_lnameInput_hasVal &&
            register_addressInput_hasVal &&
            register_userInput_hasVal &&
            register_passInput_hasVal &&
            register_repassInput_hasVal,
         "#register_btn"
      );
   });
   $("#register_username").on("input", function () {
      if ($(this).val().length > 2) {
         register_userInput_hasVal = true;
      } else {
         register_userInput_hasVal = false;
      }
      hasval(
         register_fnameInput_hasVal &&
            register_lnameInput_hasVal &&
            register_addressInput_hasVal &&
            register_userInput_hasVal &&
            register_passInput_hasVal &&
            register_repassInput_hasVal,
         "#register_btn"
      );
   });
   $("#register_password").on("input", function () {
      if ($(this).val().length > 2) {
         register_passInput_hasVal = true;
      } else {
         register_passInput_hasVal = false;
      }
      hasval(
         register_fnameInput_hasVal &&
            register_lnameInput_hasVal &&
            register_addressInput_hasVal &&
            register_userInput_hasVal &&
            register_passInput_hasVal &&
            register_repassInput_hasVal,
         "#register_btn"
      );
   });
   $("#register_repassword").on("input", function () {
      if ($(this).val().length > 2) {
         register_repassInput_hasVal = true;
      } else {
         register_repassInput_hasVal = false;
      }
      hasval(
         register_fnameInput_hasVal &&
            register_lnameInput_hasVal &&
            register_addressInput_hasVal &&
            register_userInput_hasVal &&
            register_passInput_hasVal &&
            register_repassInput_hasVal,
         "#register_btn"
      );
   });
});
