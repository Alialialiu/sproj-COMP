<?php
require '../../database/connect.php';

$combul_header = $conn->query("SELECT content FROM system_info WHERE label = 'combul_header'")->fetch_column();
$combul_content = $conn->query("SELECT content FROM system_info WHERE label = 'combul_content'")->fetch_column();

$complaints_query = $conn->query(
   "SELECT * FROM tb_usercomplain as a
      INNER JOIN tb_complaintype as b
         ON a.usercomp_type = b.comp_id
      INNER JOIN tb_complainstatus as c
         ON a.usrcomp_status = c.comstat_id
      INNER JOIN tb_user as d
         ON a.usrcomp_reqBy = d.user_id"
);

$complaint_type = $conn->query("SELECT * FROM tb_complaintype");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Complaint Bulletin</title>

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
   <?php include '../components/navbar.php' ?>
   <section class="container my-4 shadow relative">
      <div class="p-5 text-center bg-body-tertiary rounded-3">
         <i class="bi bi-ui-checks-grid mt-4 mb-3 fs-1"></i>
         <h1 class="text-body-emphasis"><?php echo $combul_header ?></h1>
         <p class="col-lg-8 mx-auto fs-5 text-muted">
            <?php echo $combul_content ?>
         </p>
         <div class="d-inline-flex gap-2 mb-5">
            <button class="d-inline-flex align-items-center btn btn-primary btn-lg px-4 rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#addcom_modal">
               Submit complaint
               <i class="bi bi-send-plus-fill ms-2"></i>
            </button>
            <a href="complaintUser.php" class="btn btn-outline-secondary btn-lg px-4 rounded-pill" type="button">
               Your complaints
            </a>
         </div>
      </div>
   </section>
   <?php include '../components/complaintsCounterv2.php' ?>
   <section class="container w-100 p-0">
      <div class="card">
         <div class="card-header d-flex justify-content-between align-items-center">
            <div class="col-8 fw-bold">Bulletin</div>
            <div class="col-4">
               <div class="input-group">
                  <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                  <input type="search" id="com_search" class="form-control" placeholder="search" aria-label="search" aria-describedby="basic-addon1">
               </div>
            </div>
         </div>
         <div class="card-body">
            <table id="complaint_tbl" class="table table-striped">
               <thead>
                  <th style="width: 30%;">Type</th>
                  <th style="width: 40%;">Title</th>
                  <th style="width: 10%;">Status</th>
                  <th style="width: 15%;">By</th>
                  <th style="width: 5%;"></th>
               </thead>
               <tbody>
                  <?php
                  foreach ($complaints_query as $data) {
                  ?>
                     <tr id="<?php echo $data['usrcomp_id'] ?>" class="align-middle">
                        <td><?php echo $data['comp_name'] ?></td>
                        <td><?php echo $data['usrcomp_title'] ?></td>
                        <td>
                           <?php
                           if ($data['usrcomp_status'] == 1) {
                              echo '<span class="badge text-bg-warning">' . $data['comstat_label'] . '</span>';
                           } else if ($data['usrcomp_status'] == 2) {
                              echo '<span class="badge text-bg-info">' . $data['comstat_label'] . '</span>';
                           } else if ($data['usrcomp_status'] == 3) {
                              echo '<span class="badge text-bg-success">' . $data['comstat_label'] . '</span>';
                           }
                           ?>
                        </td>
                        <td>
                           <span class="text-capitalize">
                              <?php echo $data['firstname'] . ' ' ?>
                           </span>
                           <span class="text-capitalize">
                              <?php echo $data['lastname'] ?>
                           </span>
                        </td>
                        <td>
                           <button class="details-btn btn btn-primary text-light d-flex align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-question-square-fill me-3"></i>Details</button>
                        </td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </section>

   <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
      <!-- complaint details here -->
   </div>

   <!-- modal -->
   <div class="modal fade" id="addcom_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
         <div class="modal-content">
            <div class="modal-header">
               <h1 class="modal-title fs-5" id="exampleModalLabel">Submit a complaint</h1>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form method="post" id="addcom_form">
                  <input type="hidden" name="addcom_id" value="<?php echo $sessionID ?>">
                  <!-- type -->
                  <div class="mb-3">
                     <select name="addcom_type" class="form-select" aria-label="Default select example">
                        <option selected disabled>Select type</option>
                        <?php
                        while ($ct = $complaint_type->fetch_assoc()) {
                        ?>
                           <option value="<?php echo $ct['comp_id'] ?>"><?php echo $ct['comp_name'] ?></option>
                        <?php } ?>
                     </select>
                  </div>
                  <!-- title -->
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">Title</label>
                     <input name="addcom_title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="A brief summary of the complaint">
                  </div>
                  <!-- content -->
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">Description</label>
                     <textarea name="addcom_content" class="form-control"></textarea>
                  </div>

                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <?php include '../components/footer.php' ?>
</body>

<script>
   // initialization of tinymce plugin
   tinymce.init({
      selector: "textarea",
      menubar: false,
      resize: false,
      height: 300,
   });
   // searchbar
   $("#com_search").on("input", function() {
      let txtValue, td, filter, table, tr, i;
      filter = $(this).val().toUpperCase();
      table = $("#complaint_tbl");
      tr = $("#complaint_tbl tr");

      for (i = 0; i < tr.length; i++) {
         td = tr[i].getElementsByTagName("td")[0];
         if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
               tr[i].style.display = "";
            } else {
               tr[i].style.display = "none";
            }
         }
      }
   });

   // shows details of a complaint
   $('.details-btn ').on('click', function() {
      let id = $(this).parent().parent().attr('id');

      $.ajax({
         type: "POST",
         url: "php/comp_details.php",
         data: {
            id
         },
         cache: "false",
         success: function(response) {
            $("#offcanvasRight").html(response);
         }
      });
   });

   $("#addcom_form").on('submit', function(e) {
      e.preventDefault();

      tinymce.triggerSave(); // saves the content inside the textarea. Without this, the textarea is empty

      let data = $(this).serialize();

      $.ajax({
         type: "POST",
         url: "php/comp_submit.php",
         data: data,
         cache: "false",
         dataType: "json",
         success: function(response) {
            alert(response.msg);
            if (response.code == 1) {
               setTimeout(() => {
                  location.reload();
               }, 1500);
            }
         }
      });
   });
</script>

</html>