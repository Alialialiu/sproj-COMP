<?php
$pending_complaints = $conn->query("SELECT COUNT(usrcomp_status) FROM tb_usercomplain WHERE usrcomp_status = 1")->fetch_column();
$action_complaints = $conn->query("SELECT COUNT(usrcomp_status) FROM tb_usercomplain WHERE usrcomp_status = 2")->fetch_column();
$resolved_complaints = $conn->query("SELECT COUNT(usrcomp_status) FROM tb_usercomplain WHERE usrcomp_status = 3")->fetch_column();
?>

<section class="w-100 m-0">
   <div class="container px-5 py-5 shadow w-100" id="hanging-icons">
      <h2 class="pb-2 border-bottom">Complaints counter</h2>
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
         <div class="col d-flex align-items-start">
            <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 py-1 px-2 flex-shrink-0 me-3">
               <i class="bi bi-stopwatch-fill text-secondary"></i>
            </div>
            <div>
               <h3 class="fs-2 text-body-emphasis"><?php echo $pending_complaints ?></h3>
               <p>Pending Complaints</p>
            </div>
         </div>
         <div class="col d-flex align-items-start">
            <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 py-1 px-2 flex-shrink-0 me-3">
               <i class="bi bi-plugin text-secondary"></i>
            </div>
            <div>
               <h3 class="fs-2 text-body-emphasis"><?php echo $action_complaints ?></h3>
               <p>Complaints resolving</p>
            </div>
         </div>
         <div class="col d-flex align-items-start">
            <div class="icon-square text-body-emphasis bg-body-secondary d-inline-flex align-items-center justify-content-center fs-4 py-1 px-2 flex-shrink-0 me-3">
               <i class="bi bi-clipboard-check-fill text-secondary"></i>
            </div>
            <div>
               <h3 class="fs-2 text-body-emphasis"><?php echo $resolved_complaints ?></h3>
               <p>Resolved complaints</p>
            </div>
         </div>
      </div>
   </div>
</section>