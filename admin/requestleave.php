<?php
   require_once('dbconnection.php');
   require("admin_detail.php");
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <!-- <meta http-equiv="refresh" content="05"> -->
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">
      <title>Leave Request</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/adminstyle.css">
      <!--Style for noticeboard-->
      <link rel="stylesheet" href="css/adminstyle2.css">
      <!-- Css for Tables -->
      <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Table Heeader Style-->
      <style media="screen">
         /* tr:hover{
         background-color: #1C2833;
         } */
         select:hover{
         box-shadow:4px 1px 20px lightblue;
         border-radius: 5px;
         }
         select{
         border-radius: 5px;
         }
         input:hover{
         box-shadow:4px 1px 20px lightblue;
         border-radius: 5px;
         }
         input{
         border-radius: 5px;
         }
      </style>
   </head>
   <body>
      <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
             <li class="active"> <a href="#"><i class="fa fa-plane"></i>&nbsp; Requested Leave</a></li>
             <li> <a href="#"><i class="fa fa-plane"></i>&nbsp; Leave</a></li>
             <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
         <header>
            <h2 style="color: teal; text-align: center;">Requested Leave</h2>
         </header>
         <div class="content-inner">
            <table id="noticelist" class="table table-stripped table-bordered">
               <thead style="background-color: #660066; color: white;">
                  <!-- <th>Id</th> -->
                  <th>Name</th>
                  <th>Posting Date</th>
                  <th>Form Date</th>
                  <th>To Date</th>
                  <th>Leave Type</th>
                  <th>Leave Description</th>
                  <th>Action</th>
               </thead>
               <tbody>
                  <?php
                     $query = mysqli_query($con, "SELECT employees.first_name,employees.last_name,emp_leave.emp_id,emp_leave.posting_date,emp_leave.from_date,emp_leave.to_date,emp_leave.leave_description,leave_details.leave_type FROM (emp_leave INNER JOIN employees on emp_leave.emp_id=employees.emp_id) INNER JOIN leave_details ON leave_details.leave_id=emp_leave.leave_id where status='0'");
                     while ($row = mysqli_fetch_array($query)) {
                        $empID = $row['emp_id'];
                       ?>
                  <tr>
                     <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                     <td><?php echo $row['posting_date']; ?></td>
                     <td><?php echo $row['from_date']; ?></td>
                     <td><?php echo $row['to_date']; ?></td>
                     <td><?php echo $row['leave_type']; ?></td>
                     <td><?php echo $row['leave_description']; ?></td>
                     <td>
                           <button name='<?php echo $row['posting_date']; ?>' id='<?php echo $row['emp_id']; ?>' style='margin:0px 5px; display:inline-block;width: 94px;' class='btn btn-secondary mb-1 approve_btn' data-toggle="modal" data-target="#approve_modal">Approve</button>
                           <button  name='<?php echo $row['posting_date']; ?>' id='<?php echo $row['emp_id']; ?>' style='margin:0px 5px; display:inline-block; width: 94px;' class='btn btn-danger reject_btn' data-toggle="modal" data-target="#reject">Reject</button>
                     </td>
                  </tr>
                  <?php
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
    <!-- The Modal for reject -->
      <div class="modal fade" id="reject">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title" style="color: teal;">Reject Leave Request</h4>
                  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();" >&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body" id='reject_show'>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
               </div>
            </div>
         </div>
      </div>
      <!-- Modal Part Ends Here -->
      <!-- this two divs are belongs to include sidebar_navbar page -->
      </div>
      </div>
      <!-- Jquery For table -->
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/jquery.dataTables.min.js"></script>

      <script>
      // <!-- Ajax for leave approve -->
         $(document).on('click', '.approve_btn', function() {
             var id = $(this).attr("id");
             var postingdate = $(this).attr("name");
             if (confirm("Are you sure want to Approve?")) {
             if (id != '' && postingdate!= '') {
                 $.ajax({
                     url: "approve_leave.php",
                     method: "POST",
                     data: {
                         id: id,
                         postingdate: postingdate
                     },
                     success: function(data) {
                         alert(data);
                         location.reload();
                     }
                 });
             }
           }
         });
         // <!-- Ajax for leave reject -->
         $(document).on('click', '.reject_btn', function() {
             var id = $(this).attr("id");
             var postingdate = $(this).attr("name");
             if (id != '' && postingdate!= '') {
                 $.ajax({
                     url: "reject_leave_modal.php",
                     method: "POST",
                     data: {
                         id: id,
                         postingdate: postingdate
                     },
                     success: function(data) {
                         $('#reject_show').html(data);
                         $('#noticelist').trigger('reset');
                     }
                 });
             }
         });
      </script>
      <!-- script for table -->
      <script type="text/javascript">
         $(document).ready(function() {
           $('#noticelist').DataTable({
             "scrollY":        "350px",
             "scrollCollapse": true,
           });
         } );
      </script>
      <!-- javascript for alert message -->
      <script type="text/javascript">
         $(document).ready(function(){
         setTimeout(function() {
           $('#success').fadeOut('slow');
         }, 2000);
         });
      </script>
      <!-- /alert  -->
   </body>
</html>
