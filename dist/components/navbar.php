<?php
session_start();
$sessionID = $_SESSION['user_id'];
$query = $conn->prepare("SELECT firstname FROM tb_user WHERE user_id = ?");
$query->bind_param("s", $sessionID);
$query->execute();

$result = $query->get_result();
$name = $result->fetch_column();
session_abort();
?>

<nav class="container navbar navbar-expand-lg bg-body-tertiary w-100">
   <div class="container-fluid shadow">
      <a class="navbar-brand" href="#">BRGY Complaint System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="complaintBulletin.php">Complaint</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">About</a>
            </li>
         </ul>
         <span class="navbar-text">
            Welcome
            <strong><?php echo $name ?></strong>
            <a href="../../database/logout.php" class="btn btn-outline-secondary ms-3">Logout</a>
         </span>
      </div>
   </div>
</nav>