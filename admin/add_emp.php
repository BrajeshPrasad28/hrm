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
      <title>Add Employee</title>
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
             <li class="active"> <a href="#"><i class="fa fa-plus"></i>&nbsp; Add Employee</a></li>
             <li> <a href="#"><i class="fa fa-user"></i>&nbsp; Employee</a></li>
             <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
         <div class="header mt-2">
            <h4>
               <b>
                  <center><h3 style="color: teal;">Add Employee</h3></center>
               </b>
            </h4>
         </div>
         <hr>
         <div id="noticeboard_wrapper" style="padding: 15px;">
            <ul style="list-style: none" >
               <li style="float: left; margin-left: -41px;" class="mb-3"><button type="button"  data-toggle="modal" data-target="#add_emp_modal" class="btn btn-primary btn-sm" >+ New</button></li>
            </ul>
            <?php
             include 'add_emp_modal.php';
             ?>
            <div class="content-inner">
               <table id="emplist" class="table table-stripped table-bordered order-column" style="width: 100%;">
                  <thead style="background-color: #660066; color: white; font-weight: bold;">
                     <th>Employee Id</th>
                     <th>Photo</th>
                     <th>Job Type</th>
                     <th>Name</th>
                     <th>Gender</th>
                     <th>Position</th>
                     <th>Schedule</th>
                     <th>Member Since</th>
                    </thead>
                  <tbody>
                     <?php
                        $query = mysqli_query($con, "SELECT emp_id,photo,created_on,job_type,first_name,last_name,gender,designation.d_name,schedules.time_in,schedules.time_out FROM ((employees inner join designation on employees.d_name=designation.d_id) inner join schedules on schedules.id=employees.schedule_id)");
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
                        </tr>
                      <?php
                        }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
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
