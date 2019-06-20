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
      <title>salary</title>
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
             <li class="active"> <a href="#"><i class="fa fa-money"></i>&nbsp; Salary</a></li>
             <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
         <header>
            <h2 style="color: teal; text-align: center;">Salary</h2>
         </header>
         <div class="content-inner">
           <?php include 'salary_add_modal.php'; ?>
           <button  class='btn btn-primary btn-sm reject_btn mb-2' data-toggle="modal" data-target="#add_salary_modal"><i class="fa fa-money"></i> Add</button>
            <table id="salarylist" class="table table-stripped css-serial table-bordered">
               <thead style="background-color: #660066; color: white;">
                  <!-- <th>Id</th> -->
                  <th>#</th>
                  <th>Designation</th>
                  <th>Job Type</th>
                  <th>Basic</th>
                  <th>House Rent Allowance (HRA)</th>
                  <th>Dearness Allowance (DA) </th>
                  <th>Action</th>
               </thead>
               <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT  designation.d_name,salary.designation,salary.job_type,salary.salary_id,salary.basic,salary.hra,salary.da FROM salary INNER JOIN designation on salary.designation=designation.d_id ORDER BY basic and hra desc");
                    while ($row = mysqli_fetch_array($query)) {
                       ?>
                  <tr>
                     <td></td>
                     <td><?php echo $row['d_name']; ?></td>
                     <td><?php echo $row['job_type']; ?></td>
                     <td><?php echo $row['basic']."/-"; ?></td>
                     <td><?php echo $row['hra']."/-"; ?></td>
                     <td><?php echo $row['da']."/-"; ?></td>
                     <td>
                        <button value='<?php echo $row['salary_id']; ?>' name='<?php echo $row['job_type']; ?>' id='<?php echo $row['designation'];?>'  class='btn btn-primary edit_btn btn-sm' data-toggle="modal" data-target="#edit_modal">
                          Edit
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
         <div class="modal-dialog modal-dialog-centered modal-md">
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
         $(document).on('click', '.edit_btn', function() {
             var designation = $(this).attr("id");
             var j_type = $(this).attr("name");
             var id = $(this).attr("value");
                 $.ajax({
                     url: "salary_edit_modal.php",
                     method: "POST",
                     data: {
                         id: id,
                         designation: designation,
                         j_type: j_type
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
