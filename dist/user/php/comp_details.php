<?php
require_once '../../../database/connect.php';
$id = $_POST['id'];

$complaints_details = $conn->query(
   "SELECT * FROM tb_usercomplain as a
      INNER JOIN tb_complaintype as b
         ON a.usercomp_type = b.comp_id
      INNER JOIN tb_complainstatus as c
         ON a.usrcomp_status = c.comstat_id
      INNER JOIN tb_user as d
         ON a.usrcomp_reqBy = d.user_id
   WHERE usrcomp_id = '$id'"
)->fetch_assoc();
?>

<div class="offcanvas-header">
   <h5 class="offcanvas-title fw-bold" id="offcanvasRightLabel"><?php echo $complaints_details['usrcomp_title'] ?></h5>
   <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body">
   <div class="card mb-3">
      <div class="card-header fw-bold">
         Complaint by
      </div>
      <div class="card-body">
         <span class="text-capitalize">
            <?php echo $complaints_details['firstname'] . ' ' ?>
         </span>
         <span class="text-capitalize">
            <?php echo $complaints_details['lastname'] ?>
         </span>
      </div>
   </div>
   <div class="card mb-3">
      <div class="card-header fw-bold">
         Type
      </div>
      <div class="card-body">
         <?php echo $complaints_details['comp_name'] ?>
      </div>
   </div>
   <div class="card mb-3">
      <div class="card-header fw-bold">
         Status
      </div>
      <div class="card-body">
         <?php echo $complaints_details['comstat_label'] ?>
      </div>
   </div>
   <div class="card">
      <div class="card-header fw-bold">
         Description
      </div>
      <div class="card-body">
         <?php echo $complaints_details['usrcomp_mess'] ?>
      </div>
   </div>
</div>