<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin</title>
   <!-- custom -->
   <link rel="stylesheet" href="style/style.css
   ">
   <!-- bootstrap -->
   <link href="css/datatables-bootstrap3.css" rel="stylesheet">
   <link href="../../src/animate.css" rel="stylesheet">
   <link href="../../src/bootstrap/css/bootstrap.css" rel="stylesheet">
   <!-- scripts -->
   <script src="../../src/jquery.js"></script>
   <script src="js/index.js"></script>
   <script src="../../src/jquery.dataTables.js"></script>
   <script src="../../src/datatables-bootstrap3.js"></script>
   <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
   <div class="adminContainer">
      <div class="adminCompList">
         <table id="adminCompTable" class="table table-hover">
            <thead>
               <th> Firstname </th>
               <th> Middlename </th>
               <th> Lastname </th>
               <th> Address </th>
               <th> Email </th>
               <th> contact </th>
               <th> Status </th>
               <th> Complain Category </th>
               <th> View </th>

            </thead>
            <tbody>
               <?php
               include("../../database/connect.php");

               $query = $conn->query("SELECT tb_usercomplain.*, tb_complaintype.comp_name FROM tb_usercomplain INNER JOIN tb_complaintype ON tb_usercomplain.usrcomp_fk = tb_complaintype.comp_id");



               while ($data = mysqli_fetch_array($query)) {
               ?>
                  <tr id="tr_<?php echo $data['usrcomp_id'] ?>">
                     <td> <?php echo $data['usrcomp_fname'] ?> </td>
                     <td> <?php echo $data['usrcomp_mname'] ?> </td>
                     <td> <?php echo $data['usrcomp_lname'] ?> </td>
                     <td> <?php echo $data['usrcomp_addr'] ?> </td>
                     <td> <?php echo $data['usrcomp_email'] ?> </td>
                     <td> <?php echo $data['usrcomp_contact'] ?> </td>
                     <td> <?php echo $data['usrcomp_status'] ?> </td>
                     <td> <?php echo $data['comp_name'] ?> </td>
                     <td>
                        <button class="tablebtnComp edit" id="<?php echo $data['usrcomp_id'] ?> type=" button" data-bs-toggle="modal" data-bs-target="#editCompModal">
                           <i class='bx bx-folder-open fs-2'></i>
                        </button>
                     </td>

                  </tr>
               <?php } ?>
            </tbody>
         </table>
      </div>
   </div>
   <!-- modals -->
   <!-- Modal -->
   <div class="modal fade" id="editCompModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body userCompBody">
               ...
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
         </div>
      </div>
   </div>
   <!-- scripts -->
   <script src="../../src/bootstrap/js/bootstrap.js"></script>
   <script src="../../src/popper.js"></script>
</body>

</html>