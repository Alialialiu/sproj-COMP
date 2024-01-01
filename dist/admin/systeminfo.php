<?php
require_once '../../database/connect.php';
session_start();

if (!isset($_SESSION['user_id']) && $_SESSION['user_type'] !== false) {
   header("Location: ../login/index.php");
   session_abort();
} else {
   $sessionID = $_SESSION['user_id'];
}

$landing_header = $conn->query("SELECT content FROM system_info WHERE label = 'landing_header'")->fetch_column();
$landing_content = $conn->query("SELECT content FROM system_info WHERE label = 'landing_header_content'")->fetch_column();

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Configure System Info</title>

   <!-- plugins css -->
   <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" href="../../src/icons/bootstrap-icons.css">

   <!-- custom css -->
   <link rel="stylesheet" href="style/style.css">

   <!-- plugins js -->
   <script src="../../src/jquery.js"></script>
   <script src="../../src/popper.js"></script>
   <script src="../../src/bootstrap/js/bootstrap.min.js"></script>
   <script src="../../src/tinymce/tinymce.min.js"></script>
</head>

<body>
   <section class="w-100 h-100 d-flex">
      <!-- sidebar -->
      <div class="d-flex flex-column justify-content-between flex-shrink-0 bg-body-tertiary h-100 shadow" style="width: 4.5rem;">
         <div>
            <a href="/" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
               <i class="bi bi-calendar-range-fill fs-2"></i>
               <span class="visually-hidden">Icon-only</span>
            </a>
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
               <li class="nav-item">
                  <a href="./index.php" class="nav-link py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Home" data-bs-original-title="Home">
                     <i class="bi bi-house-door fs-5"></i>
                  </a>
               </li>
               <li>
                  <a href="./complaintBulletin.php" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Bulletin" data-bs-original-title="Bulletin">
                     <i class="bi bi-clipboard-data fs-5"></i>
                  </a>
               </li>
               <li>
                  <a href="./systeminfo.php" class="nav-link active py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Customize System" data-bs-original-title="Customize System">
                     <i class="bi bi-gear fs-5"></i>
                  </a>
               </li>
            </ul>
         </div>
         <div class="dropdown border-top">
            <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
               <i class="bi bi-person-circle fs-4"></i>
            </a>
            <ul class="dropdown-menu text-small shadow">
               <li><a class="dropdown-item d-flex align-items-center" href="../../database/logout.php"><i class="bi bi-power me-2"></i>Log out</a></li>
            </ul>
         </div>
      </div>

      <!-- content -->
      <div class="container w-100 px-0">
         <h2 class="pb-2 border-bottom mt-3">System Info</h2>
         <div class="card my-3">
            <div class="card-header d-flex align-items-center">
               <i class="bi bi-houses-fill me-3"></i>
               Bulletin
            </div>
            <div class="card-body">
               <form id="landing_form" method="post">
                  <div class="row g-0 mb-3">
                     <div class="">
                        <label for="notice_header" class="form-label">Landing Header</label>
                        <textarea class="form-control" placeholder="something" name="landing_header" style="height: fit-content;"><?php echo $landing_header ?></textarea>
                     </div>
                  </div>
                  <div class="row g-0 mb-3">
                     <div class="">
                        <label for="notice_header" class="form-label">Landing Body Text</label>
                        <textarea class="form-control" placeholder="something" name="landing_content" style="height: fit-content;"><?php echo $landing_content ?></textarea>
                     </div>
                  </div>
                  <div class="row g-0 mb-3">
                     <label for="landing_img" class="form-label">Landing Image</label>
                     <input class="form-control" type="file" id="landing_img">
                  </div>

                  <div class="row g-0 justify-content-end gap-2">
                     <div class="col-9"></div>
                     <div class="col-3">
                        <button type="submit" class="btn btn-success w-100">Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </section>
</body>

<script>
   tinymce.init({
      selector: "textarea",
      menubar: false,
      resize: false,
      height: 200,
   });

   // landing customization
   $('#landing_form').on("submit", function(e) {
      e.preventDefault();

      let data = $(this).serialize();
      let fileEntry = $('#landing_img')[0];
      let selFile = fileEntry.files[0];

      let formData = new FormData();
      formData.append('file', selFile);
      formData.append('data', data);

      $.ajax({
         url: 'php/systeminfo_edit.php',
         type: 'POST',
         data: formData,
         contentType: false,
         processData: false,
         success: function(response) {
            alert(response);
         },
         error: function(err) {
            alert(err);
         }
      });
   });
</script>

</html>