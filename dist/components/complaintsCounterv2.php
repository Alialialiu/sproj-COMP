<?php
$total_complaints;
$resolving_complaints;
$resolved_complaints;

$total_complaints_query = $conn->query("SELECT COUNT(usrcomp_status) FROM tb_usercomplain")->fetch_column();
if ($total_complaints_query > 0) {
   $total_complaints = $total_complaints_query;
} else {
   $total_complaints = 0;
}

$resolving_query = $conn->query("SELECT COUNT(usrcomp_status) FROM tb_usercomplain WHERE usrcomp_status = '2'")->fetch_column();
if ($resolving_query > 0) {
   $resolving_complaints = $resolving_query;
} else {
   $resolving_complaints = 0;
}

$resolved_complaints_query = $conn->query("SELECT COUNT(usrcomp_status) FROM tb_usercomplain WHERE usrcomp_status = '3'")->fetch_column();
if ($resolved_complaints_query > 0) {
   $resolved_complaints = $resolved_complaints_query;
} else {
   $resolved_complaints = 0;
}
?>

<section class="w-100 container mb-4">
   <div class="row gap-3">
      <div class="col border border-2 d-flex align-items-center justify-content-between py-3">
         <h4 class="d-flex align-items-center">
            <i class="bi bi-clipboard-data-fill me-3 text-primary"></i>
            Complaints
         </h4>
         <p class="p-0 m-0 fs-5"><?php echo $total_complaints ?></p>
      </div>
      <div class="col border border-2 d-flex align-items-center justify-content-between py-3">
         <h4 class="d-flex align-items-center">
            <i class="bi bi-person-raised-hand me-3 text-primary"></i>
            Resolving
         </h4>
         <p class="p-0 m-0 fs-5"><?php echo $resolving_complaints ?></p>
      </div>
      <div class="col border border-2 d-flex align-items-center justify-content-between py-3">
         <h4 class="d-flex align-items-center">
            <i class="bi bi-clipboard2-check-fill me-3 text-primary"></i>
            Resolved
         </h4>
         <p class="p-0 m-0 fs-5"><?php echo $resolved_complaints ?></p>
      </div>
   </div>
</section>