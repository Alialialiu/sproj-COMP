<?php
require_once '../../database/connect.php';
session_start();

if (!isset($_SESSION['user_id']) && $_SESSION['user_type'] !== false) {
   header("Location: ../login/index.php");
   session_abort();
} else {
   $sessionID = $_SESSION['user_id'];
}

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
   <script src="../../src/datatables/datatables.min.js"></script>
   <script src="../../src/datatables/Buttons-2.4.2/js/buttons.dataTables.min.js"></script>
   <script src="../../src/datatables/Buttons-2.4.2/js/buttons.print.min.js"></script>
   <script src="../../src/datatables/Buttons-2.4.2/js/buttons.colVis.min.js"></script>
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
                  <a href="./complaintBulletin.php" class="nav-link active py-3 border-bottom rounded-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Bulletin" data-bs-original-title="Bulletin">
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
      <section class="container w-100 px-0 py-5">
         <?php include '../components/complaintsCounterv2.php' ?>
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
               <table id="complaint_tbl" class="table table-striped mb-3">
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
                              <div class="dropdown">
                                 <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-gear-fill"></i>
                                 </button>
                                 <ul class="dropdown-menu">
                                    <?php
                                    if ($data['usrcomp_status'] == 1) {
                                       echo '<li><a class="resolving-btn dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#complaint_modal"><i class="bi bi-person-walking me-2 text-warning"></i>Take Action</a></li>';
                                    } else if ($data['usrcomp_status'] == 2) {
                                       echo '<li><a class="resolve-btn dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#complaint_modal"><i class="bi bi-patch-check-fill me-2 text-success"></i>Resolve</a></li>';
                                    }
                                    ?>
                                    <li><a class="details-btn dropdown-item d-flex align-items-center" href="#" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="bi bi-info-circle-fill me-2 text-info"></i>Details</a></li>
                                 </ul>
                              </div>
                           </td>
                        </tr>
                     <?php } ?>
                  </tbody>
               </table>
            </div>
         </div>
      </section>
   </section>
</body>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
   <!-- complaint details here -->
</div>

<!-- modal confirmation -->
<div class="modal fade" id="complaint_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="complaint_modal_label">...</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <input type="hidden" id="complaint_id">
            <input type="hidden" id="complaint_type">
            <p id="complaint_modal_text" class="fw-bold">...</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="confirm_btn" class="btn btn-primary">Yes</button>
         </div>
      </div>
   </div>
</div>


<script>
   const date = new Date();
   let year = date.getFullYear();

   // initialization of datatable
   new DataTable('#complaint_tbl', {
      ordering: false,
      searching: false,
      dom: 'Bfrtip',
      buttons: [{
         extend: 'print',
         title: 'Complaints this ' + year,
         messageTop: 'Reports this year. Please review',
         exportOptions: {
            columns: ':visible'
         }
      }, 'colvis'],
      columnDefs: [{
         targets: -1,
         visible: true
      }]
   });

   // searchbar
   $("#com_search").on("input", function() {
      let txtValue, td, filter, table, tr, i;
      filter = $(this).val().toUpperCase();
      table = $("#complaint_tbl");
      tr = $("#complaint_tbl tr");

      for (i = 0; i < tr.length; i++) {
         td = tr[i].getElementsByTagName("td")[0, 1];
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
   $('.details-btn').on('click', function() {
      let id = $(this).parent().parent().parent().parent().parent().attr('id');

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

   // resolving button on action dropdown
   // assign values to content inside the modal, including the hidden input field
   $(".resolving-btn").on('click', function() {
      $('#complaint_modal_label').text("Take action?");
      $('#complaint_modal_text').text("Are you sure to set this status to RESOLVING?");

      let id = $(this).parent().parent().parent().parent().parent().attr("id");
      $('#complaint_id').val(id);
      $('#complaint_type').val(2);
   });
   // resolved button on action dropdown
   // assign values to content inside the modal, including the hidden input field
   $(".resolve-btn").on('click', function() {
      $('#complaint_modal_label').text("Resolve complaint?");
      $('#complaint_modal_text').text("Are you sure to set this status to RESOLVED? Further actions for this complaint will be disabled.");

      let id = $(this).parent().parent().parent().parent().parent().attr("id");
      $('#complaint_id').val(id);
      $('#complaint_type').val(3);
   });

   // to ajax when confirming an action
   $("#confirm_btn").on('click', function() {
      let id = $('#complaint_id').val();
      let type = $('#complaint_type').val();

      $.ajax({
         type: "POST",
         url: "php/comp_modify.php",
         data: {
            id,
            type
         },
         cache: "false",
         dataType: "json",
         success: function(response) {
            alert(response.msg);
            if (response.code == 1) {
               setTimeout(() => {
                  location.reload();
               }, 500);
            }
         }
      });
   });
</script>

</html>