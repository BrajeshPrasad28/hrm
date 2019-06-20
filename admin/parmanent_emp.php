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
      <title>Employee</title>
      <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">
      <!-- Bootstrap CSS  -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/adminstyle.css">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Css for Tables -->
      <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
      <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
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
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
              <li class="active"> <a href="#"><i class="fa fa-list"></i>&nbsp; Employee List</a></li>
              <li> <a href="employee.php"><i class="fa fa-user"></i>&nbsp; Employee</a></li>
              <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
         <div class="header mt-2">
            <h4>
               <b>
                  <center><h3 style="color: teal;">Employee list</h3></center>
               </b>
            </h4>
         </div>
         <hr>
         <div id="noticeboard_wrapper" style="padding: 15px;">
           <ul style="list-style: none" >
              <li style="float: left; margin-left: -41px;" class="mb-3"><a href="employee.php"><button type="button"  class="btn btn-info btn-sm">All</button></li></a>
              <li style="float: left; margin-left: -2px;" class="mb-3"><a href="parmanent_emp.php"><button type="button" class="btn btn-info btn-sm">Parmanent</button></li>
              <li style="float: left; margin-left: 5px;" class="mb-3"><a href="contractual_emp.php"><button type="button"  class="btn btn-info btn-sm" >Contractual</button></li></a>
              <li style="float: left; margin-left: 5px;" class="mb-3"><button type="button"  data-toggle="modal" data-target="#add_emp_modal" class="btn btn-success btn-sm" >+ New</button></li>
           </ul>
           <?php
            include 'add_emp_modal.php';
            ?>
            <div class="content-inner">
               <table id="emplist" class="table table-stripped table-bordered order-column" style="width: 100%;">
                  <thead class="table-dark" style="color: white; font-weight: bold;">
                     <th>Employee Id</th>
                     <th>Photo</th>
                     <th>Job Type</th>
                     <th>Name</th>
                     <th>Gender</th>
                     <th>Position</th>
                     <th>Schedule</th>
                     <th>Member Since</th>
                     <th style="text-align: center;">Action</th>
                  </thead>
                  <tbody>
                     <?php
                  $query = mysqli_query($con, "SELECT emp_id, photo, created_on, job_type, first_name, last_name, gender, designation.d_name,schedules.time_in,schedules.time_out FROM ((employees inner join designation on employees.d_name=designation.d_id) inner join schedules on schedules.id=employees.schedule_id) where job_type = 'Permanent'");
                //$query2 = mysqli_query($con, "SELECT * from employees");
                while ($a = mysqli_fetch_array($query)) {
                ?>
                <tr>
                  <td ><?php echo $a['emp_id']; ?></td>
                  <td><img id='pht' src="<?php echo $a['photo'];?>"  style="width: 30px; height: 30px;"></td>
                  <td><?php echo $a['job_type']; ?></td>
                  <td><?php echo $a['first_name'].' '.$a['last_name'];?></td>
                  <td><?php echo $a['gender']; ?></td>
                  <td><?php echo $a['d_name']; ?></td>
                  <td><?php echo $a['time_in'].'-'.$a['time_out'];?></td>
                  <td><?php echo $a['created_on']; ?></td>
                  <td style="text-align: center;">
                    <button id='<?php echo $a['emp_id']; ?>' style='margin:0px 5px; display:inline-block; width: 62px;' class='btn btn-secondary btn-sm mb-1 edit_btn' data-toggle="modal" data-target="#edit_modal">Edit</button>
                    <input type="button" data-id="<?php echo $a['emp_id']; ?>" style='margin:0px 5px; display:inline-block;' class="btn btn-danger btn-sm delete_btn" value="Delete">
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
  <!-- The Modal for YearWise -->
  <div class="modal fade" id="edit_modal">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content">
       <!-- Modal Header -->
       <div class="modal-header">
          <h4 class="modal-title" style="color: teal;">Update Employee Data</h4>
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
  <!-- Bootstrap JS -->
  <link rel="stylesheet" href="../js/bootstrap.min.js">
  <!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script> -->
  <script src="../js/jquery.dataTables.min.js"></script>
  <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
  <!-- Ajax for employee delete data -->
  <script>
  $(document).on('click', '.delete_btn', function() {
     var id = $(this).data("id");
     if (confirm("Are you sure want to delete?")) {
         $.ajax({
             url: "employee_delete.php",
             type: "POST",
             data: {
                 id: id
             },
             dataType: "text",
             success: function(data) {
                 alert(data);
                 location.reload();
             }

         });
     }
     return false;
  });
  </script>
  <script type="text/javascript">
  // <!-- Ajax for employee edit -->
  $(document).on('click', '.edit_btn', function() {
  var id = $(this).attr("id");
  if (id != '') {
      $.ajax({
          url: "edit_modal.php",
          method: "POST",
          data: {
              id: id
          },
          success: function(data) {
              $('#show').html(data);
          }
      });
  }
  });
  </script>
  <!-- script for table -->
  <script>
  $('#emplist').DataTable({
   "scrollY":        "300px",
   "scrollCollapse": true,
  });
  </script>
  <!-- table script ends here -->
  <!-- javascript for alert message -->
  <script type="text/javascript">
  $(document).ready(function(){
  setTimeout(function() {
   $('#success').fadeOut('slow');
  }, 3000);
  });
  </script>
  <!-- /alert  -->
  </body>
  </html>
