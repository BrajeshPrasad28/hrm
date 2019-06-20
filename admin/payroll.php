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
      <title>Pay-roll</title>
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
         /* Automatic Serial Number Row */
         .css-serial {
         counter-reset: serial-number; /* Set the serial number counter to 0 */
         }
         .css-serial td:first-child:before {
         counter-increment: serial-number; /* Increment the serial number counter */
         content: counter(serial-number); /* Display the counter */
         }
      </style>
   </head>
   <body>
      <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
             <li class="active"> <a href="#"><i class="fa fa-inr"></i>&nbsp; Pay-Roll</a></li>
             <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
         <header>
            <h2 style="color: teal; text-align: center;">Pay Salary</h2>
         </header>
         <div class="content-inner">
           <button class="btn btn-info btn-sm mb-2" style="width: 10%;"><a href="payroll.php">Pay</a></button>
           <button class="btn btn-info btn-sm mb-2" style="width: 10%;"><a href="payroll_list.php">Paid List</a></button>
            <table id="salarylist" class="table table-stripped css-serial table-bordered">
               <thead class="table-dark" style="color: white; font-weight: bold;">
                  <!-- <th>Id</th> -->
                  <th>#</th>
                  <th>Employee ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Status</th>
                  <th>Pay</th>
               </thead>
               <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT DISTINCT *FROM employees WHERE salary_status='Unpaid'");
                  while ($a = mysqli_fetch_array($query)) {
                       ?>
                  <tr>
                     <td></td>
                     <td><?php echo $a['emp_id']; ?></td>
                     <td><img id='pht' src="<?php echo $a['photo'];?>"  style="width: 30px; height: 30px;"></td>
                     <td><?php echo $a['first_name']." ".$a['last_name']; ?></td>
                     <td style="color: grey;"><?php echo $a['salary_status']; ?></td>
                     <td>
                        <button  id='<?php echo $a['emp_id'];?>'  class='btn btn-primary edit_btn btn-sm' data-toggle="modal" data-target="#edit_modal">
                          Pay
                        </button>

                     </td>
                  </tr>
                  <?php
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </div>
      <!-- The Modal for approve -->
      <div class="modal fade" id="edit_modal">
         <div class="modal-dialog  modal-md"> <!-- modal-dialog-centered -->
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title" style="color: teal;">Update Salary</h4>
                  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body" id='show'>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload();">Close</button>
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
         $(document).on('click', '.edit_btn', function() {
             var id = $(this).attr("id");
                 $.ajax({
                     url: "payroll_modal.php",
                     method: "POST",
                     data: {
                         id: id,
                     },
                     success: function(data) {
                         $('#show').html(data);
                        // $('#noticelist').trigger('reset');
                     }
                 });
         });
      </script>
      <!-- script for table -->
      <script type="text/javascript">
         $(document).ready(function() {
           $('#salarylist').DataTable({
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
