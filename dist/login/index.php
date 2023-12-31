<?php
require_once '../../database/connect.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- custom -->
   <link rel="stylesheet" href="index.css">
   <!-- bootstrap -->
   <link href="../../src/animate.css" rel="stylesheet">
   <link href="../../src/bootstrap/css/bootstrap.css" rel="stylesheet">

   <script src="../../src/jquery.js"></script>
   <script src="js/registration.js"></script>
   <script src="js/validate.js"></script>
   <title>index</title>
</head>

<body>
   <div class="main-form d-flex align-items-center">
      <div class="d-flex flex-column justify-content-center text-center w-50">
         <h1 class="text-light">Welcome to Complaint Management System!</h1>
         <p class="text-light">"Your feedback shapes our improvement. Speak up, and together we create positive change."</p>
      </div>

      <div class="form-cont d-flex justify-content-center align-items-center w-50 h-100 overflow-hidden">

         <!-- login container -->
         <div id="login" class="d-flex flex-column align-items-center w-100 slide-in-blurred-bottom">
            <h3 class="mb-3 fw-bold text-uppercase">login</h3>
            <form id="login_form" method="post" class="p-3 border border-2 rounded w-50">

               <!-- login username -->
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="login_username" name="login_username" placeholder="sample_username" required>
                  <label for="login_username">Username</label>
               </div>
      
               <!-- login password -->
               <div class="form-floating">
                  <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password" required>
                  <label for="login_password">Password</label>
               </div>

               <!-- form controls -->
               <div class="d-flex flex-column w-100 mt-4 gap-2">
                  <button type="submit" id="login_btn" class="btn btn-primary text-uppercase" disabled>login</button>
                  <button type="button" class="switch btn btn-outline-secondary text-uppercase">register</button>
               </div>

            </form>
         </div>

         <!-- register container -->
         <div id="register" class="d-none flex-column align-items-center w-100">
            <h3 class="mb-3 fw-bold text-uppercase">register</h3>
            <form id="register_form" method="post" class="p-3 border border-2 rounded w-75">

               <!-- register name -->
               <div class="d-flex gap-3 mb-3 w-100">
                  <div class="form-floating w-50">
                     <input type="text" class="form-control" id="register_fname" name="register_fname" placeholder="sample_fname" required>
                     <label for="register_fname">First name</label>
                  </div>

                  <div class="form-floating w-50">
                     <input type="text" class="form-control" id="register_lname" name="register_lname" placeholder="sample_lname" required>
                     <label for="register_lname">Last name</label>
                  </div>
               </div>

               <!-- register address -->
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="register_address" name="register_address" placeholder="sample_address" required>
                  <label for="register_address">Address</label>
               </div>

               <!-- register username -->
               <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="register_username" name="register_username" placeholder="sample_username" required>
                  <label for="register_username">Username</label>
               </div>

               <!-- register password -->
               <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="register_password" name="register_password" placeholder="Password" required>
                  <label for="register_password">Password</label>
               </div>

               <!-- register confirm password -->
               <div class="form-floating">
                  <input type="password" class="form-control" id="register_repassword" name="register_repassword" name="register_repassword" placeholder="Password" required>
                  <label for="register_repassword">Confirm password</label>
               </div>

               <!-- form controls -->
               <div class="d-flex flex-column w-100 mt-4 gap-2">
                  <button type="submit" id="register_btn" class="btn btn-primary text-uppercase" disabled>register</button>
                  <button type="button" class="switch btn btn-outline-secondary text-uppercase">login</button>
               </div>

            </form>
         </div>

      </div>

   </div>

   <script src="./js/index.js"></script>
   <script src="../../src/bootstrap/js/bootstrap.js"></script>
   <script src="jquery/registration.js"></script>
   <script src="jquery/validate.js"></script>
</body>

</html>