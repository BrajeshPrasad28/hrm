<?php
   require_once('dbconnection.php');

   require("admin_detail.php");

   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Attendance</title>
      <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/adminstyle.css">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Css for Tables -->
      <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
      <!-- style is here -->
      <style media="screen">
         /* tr:hover{
         background-color: #1C2833;
         } */
         select:hover{
         box-shadow: 4px 1px 20px lightblue;
         border-radius: 5px;
         }
         select{
         border-radius: 5px;
         }
         input:hover{
         box-shadow: 4px 1px 20px lightblue;
         border-radius: 5px;
         }
         input{
         border-radius: 5px;
         }
         #pht:hover {
         -ms-transform: scale(4.5); /* IE 9 */
         -webkit-transform: scale(4.5); /* Safari 3-8 */
         transform: scale(4.5);
         border-radius: 10%;
         }
      </style>
      <!-- ends here -->
   </head>
   <body>
      <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <?php include 'add_emp_modal.php'; ?>
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
         <ul>
            <li class="active"> <a href="#"><i class="fa fa-signal"></i>&nbsp; Attendance</a></li>
            <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
         </ul>
      </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
         <div class="header mt-2">
            <h4>
               <b>
                  <center><h3 style="color: teal;">Attendance</h3></center>
               </b>
            </h4>
         </div>
         <hr>
         <div id="noticeboard_wrapper" style="padding: 15px;">
            <div class="content-inner">
               <table id="noticelist" class="table table-stripped table-bordered order-column" style="width: 100%;">
                  <thead  style="background-color: #660066; color: white;font-weight: bold;">
                     <th>Employee Id</th>
                     <th>Photo</th>
                     <th>Name</th>
                     <th>Gender</th>
                     <th>View Attendance</th>
                  </thead>
                  <tbody>
                     <?php
                        $query = mysqli_query($con, "SELECT emp_id,photo,created_on,job_type,first_name,last_name,gender,designation.d_name,schedules.time_in,schedules.time_out FROM ((employees inner join designation on employees.d_name=designation.d_id) inner join schedules on schedules.id=employees.schedule_id)");
                        while ($a = mysqli_fetch_array($query)) {
                        ?>
                     <tr>
                        <td ><?php echo $a['emp_id']; ?></td>
                        <td><img id='pht' src="<?php echo $a['photo'];?>"  style="width: 30px; height: 30px;"></td>
                        <td><?php echo $a['first_name'].' '.$a['last_name'];?></td>
                        <td><?php echo $a['gender']; ?></td>
                        <td>
                           <div class="row ml-5">
                              <!-- For MonthWise -->
                              <button  name='viewM' id='<?php echo $a['emp_id']; ?>' style='display:inline-block;' class='btn btn-info viewMonth' data-toggle="modal" data-target="#viewAttendanceMonth">
                              MonthWise
                              </button>
                              <!-- For YearWise -->
                              <button  name='viewY' id='<?php echo $a['emp_id']; ?>' style='display:inline-block;' class='btn btn-info ml-2 viewYear' data-toggle="modal" data-target="#viewAttendanceYear">
                              YearWise
                              </button>
                           </div>
                        </td>
                     </tr>
                     <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <!-- Modal part -->
      <!-- The Modal For MonthWise -->
      <div class="modal fade" id="viewAttendanceMonth">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title" style="color: teal; text-align: center;">Monthwise Attendace</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body" id="month_Wise">
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- The Modal for YearWise -->
      <div class="modal fade" id="viewAttendanceYear">
         <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title" style="color: teal;">Yearwise Attendance</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body" id='year_wise'>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
      <!-- script for table -->
      <script>
         $('#noticelist').DataTable({
           "scrollY":        "300px",
           "scrollCollapse": true,
         });
      </script>
      <!-- table script ends here -->
      <!-- Ajax for MonthWise data -->
      <script>
         $(document).on('click', '.viewMonth', function() {
             var id = $(this).attr("id");
             if (id != '') {
                 $.ajax({
                     url: "viewAttendanceMonth.php",
                     method: "POST",
                     data: {
                         id: id
                     },
                     success: function(data) {
                         $('#month_Wise').html(data);
                         //$('#dataModal').modal('show');
                     }
                 });
             }
         });
      </script>
      <!-- Ajax for YearWise data -->
      <script>
         $(document).on('click', '.viewYear', function() {
             var id = $(this).attr("id");
             if (id != '') {
                 $.ajax({
                     url: "viewAttendanceYear.php",
                     method: "POST",
                     data: {
                         id: id
                     },
                     success: function(data) {
                         $('#year_wise').html(data);
                         //$('#dataModal').modal('show');
                     }
                 });
             }
         });
      </script>
   </body>
</html>
