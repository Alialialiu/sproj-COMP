<?php
require_once '../../database/connect.php';
session_start();

if (!isset($_SESSION['user_id']) && $_SESSION['user_type'] !== false) {
   header("Location: ../login/index.php");
   session_abort();
} else {
   $sessionID = $_SESSION['user_id'];
}
$query = $conn->prepare("SELECT firstname FROM tb_user WHERE user_id = ?");
$query->bind_param("s", $sessionID);
$query->execute();

$result = $query->get_result();
$name = $result->fetch_column();
session_abort();

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>
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
                  <a href="./index.php" class="nav-link active py-3 border-bottom rounded-0" aria-current="page" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Home" data-bs-original-title="Home">
                     <i class="bi bi-house-door fs-5"></i>
                  </a>
               </li>
               <li>
                  <a href="./complaintBulletin.php" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Bulletin" data-bs-original-title="Bulletin">
                     <i class="bi bi-clipboard-data fs-5"></i>
                  </a>
               </li>
               <li>
                  <a href="./systeminfo.php" class="nav-link py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Customize System" data-bs-original-title="Customize System">
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
      <div class="w-100 h-100 overflow-scroll">
         <div class="container px-1 py-4">
            <h2 class="pb-2 border-bottom">Home</h2>

            <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
               <div class="col d-flex flex-column align-items-start gap-2">
                  <h2 class="fw-bold text-body-emphasis">Welcome <?php echo $name ?></h2>
                  <p class="text-body-secondary">This is your admin panel. You have full control of the system in here. Navigate to your sidebar to see what else you can do</p>
                  <a href="./complaintBulletin.php" class="btn btn-primary btn-lg">Complaint Bulltetin</a>
               </div>

               <div class="col p-3">
                  <div class="row row-cols-1 row-cols-sm-2 g-4">
                     <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3 px-2" style="width: fit-content;">
                           <i class="bi bi-card-checklist fs-3"></i>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Review complaints</h4>
                        <p class="text-body-secondary">Navigate to your bulletin list to start reviewing resident complaints</p>
                     </div>

                     <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3 px-2" style="width: fit-content;">
                           <i class="bi bi-kanban fs-3"></i>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Manage easily</h4>
                        <p class="text-body-secondary">Navigate to your bulletin list to start reviewing resident complaints</p>
                     </div>

                     <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3 px-2" style="width: fit-content;">
                           <i class="bi bi-pencil-square fs-3"></i>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Customize the system</h4>
                        <p class="text-body-secondary">Edit what the user can see. Navigate to your Configuration Page to start reviewing resident complaints</p>
                     </div>

                     <div class="col d-flex flex-column gap-2">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3 px-2" style="width: fit-content;">
                           <i class="bi bi-three-dots fs-3"></i>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">and more!</h4>
                        <p class="text-body-secondary">Navigate to your sidebar to see what else you can do</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php include '../components/complaintsCounterv2.php' ?>
      </div>
   </section>
</body>

</html>