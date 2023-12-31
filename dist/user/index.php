<?php
require_once '../../database/connect.php';

session_start();

if (!isset($_SESSION['user_id']) && $_SESSION['user_type'] !== false) {
   header("Location: ../login/index.php");
   session_abort();
} else {
   $sessionID = $_SESSION['user_id'];
}

// query for getting content headers from database
$landing_header = $conn->query("SELECT content FROM system_info WHERE label = 'landing_header'")->fetch_column();
$landing_content = $conn->query("SELECT content FROM system_info WHERE label = 'landing_header_content'")->fetch_column();
$landing_img = $conn->query("SELECT content FROM system_info WHERE label = 'landing_header_img'")->fetch_column();
session_abort();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User</title>

   <!-- plugins css -->
   <link rel="stylesheet" href="../../src/bootstrap/css/bootstrap.css">
   <link rel="stylesheet" href="../../src/icons/bootstrap-icons.css">
   <link rel="stylesheet" href="../../src/datatables/datatables.css">

   <!-- custom css -->
   <link rel="stylesheet" href="style/style.css">

   <!-- plugins js -->
   <script src="../../src/jquery.js"></script>
   <script src="../../src/popper.js"></script>
   <script src="../../src/bootstrap/js/bootstrap.min.js"></script>
   <script src="../../src/datatables/datatables.min.css"></script>
</head>

<body>
   <?php require '../components/navbar.php' ?>
   <section class="container w-100 h-100">
      <div class="container col-xxl-8 px-4 py-5 h-100 w-100">
         <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
               <img src="<?php echo $landing_img ?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
               <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?php echo $landing_header ?></h1>
               <p class="lead"><?php echo $landing_content ?></p>
               <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                  <a href="complaintBulletin.php" type="button" class="btn btn-primary btn-lg px-4 me-md-2">Submit complaint</a>
                  <a href="complaintBulletin.php" type="button" class="btn btn-outline-secondary btn-lg px-4">Bulletin</a>
               </div>
            </div>
         </div>
      </div>
   </section>
   <?php include '../components/complaintsCounter.php' ?>
   <?php include '../components/footer.php' ?>
</body>

</html>