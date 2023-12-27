<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <link rel="stylesheet" href="./index.css">
   <script src="../../src/jquery.js"></script>

   <title>index</title>
</head>

<body>
   <div class="main-index">
      <div class="main-cont">
         <div class="index-head">
            <h1 class="h1">Complaint Management System</h1>
            <p>"Embrace the journey, cherish the moments."</p>
         </div>
         <button class="animated-button" id="btn-index">
            <svg viewBox="0 0 24 24" class="arr-2" xmlns="http://www.w3.org/2000/svg">
               <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z" />
               </path>
            </svg>
            <span class="text">Let me in!</span>
            <span class="circle"></span>
            <svg viewBox="0 0 24 24" class="arr-1" xmlns="http://www.w3.org/2000/svg">
               <path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z">
               </path>
            </svg>
         </button>
      </div>
   </div>

   <script>
      $("#btn-index").click(function() {
         window.location.href = "../login/index.php";
      });
   </script>

</body>

</html>