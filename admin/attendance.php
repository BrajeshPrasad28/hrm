<?php
   require_once('dbconnection.php');

   require("admin_detail.php");
   // if(isset($_POST['submit'])){
   //   echo "<pre>";
   //   print_r($_POST);
   //   die();
   // }

    if(isset($_POST['delete'])){
      $emp_id = $_POST['emp_id'];

       echo "<script> alert('Are you sure you want to delete this Employee?')</script>";

       $query = mysqli_query($con,"DELETE FROM employees WHERE emp_id = '$emp_id'");
       if($query){
           echo "<script> alert('Employee Deleted Successfully')</script>";
       }else{
         echo "Not Updated, reason: ".mysqli_error($con);
       }
     }

   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Employee</title>
      <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/adminstyle.css">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Css for Tables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" type="text/css">

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
                  <center>Employee list</center>
               </b>
            </h4>
         </div>
         <hr>
         <div id="noticeboard_wrapper" style="padding: 15px;">
            <div class="content-inner">
               <table id="noticelist" class="table table-stripped table-bordered order-column" style="width: 100%;">
                  <thead class="table-dark" style="font-weight: bold;">
                     <th>Employee Id</th>
                     <th>Photo</th>
                     <th>Name</th>
                     <th>Gender</th>
                     <th>View Attendance</th>
                  </thead>
                  <tbody>
                     <?php
                        $query = mysqli_query($con, "SELECT emp_id,photo,created_on,job_type,first_name,last_name,gender,designation.d_name,schedules.time_in,schedules.time_out FROM ((employees inner join designation on employees.d_name=designation.d_id) inner join schedules on schedules.id=employees.schedule_id)");
                      //$query2 = mysqli_query($con, "SELECT * from employees");
                    while ($a = mysqli_fetch_array($query) /*AND $b = mysqli_fetch_object($query2)*/) {
                        ?>
                        <tr>
                          <td ><?php echo $a['emp_id']; ?></td>
                          <td><img id='pht' src="<?php echo $a['photo'];?>"  style="width: 30px; height: 30px;"></td>
                          <td><?php echo $a['first_name'].' '.$a['last_name'];?></td>
                          <td><?php echo $a['gender']; ?></td>
                          <td class="text-center">
                            <div class="row ml-5">
                              <!-- For MonthWise -->
                              <form  action="viewAttendanceMonth.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $a['emp_id']; ?>">
                                <button type='submit' name='viewM' id='<?php echo $a['emp_id']; ?>' style='display:inline-block;' class='btn btn-secondary btn-sm mb-1 viewMonth' data-toggle="modal" data-target="#viewAttendanceMonth">
                                  MonthWise
                                </button>
                              </form>
                              <!-- For YearWise -->
                              <form class="ml-3" action="viewAttendanceYear.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $a['emp_id']; ?>">
                                <button type='submit' name='viewY' id='<?php echo $a['emp_id']; ?>' style='display:inline-block; width:95px;' class='btn btn-secondary btn-sm viewYear' data-toggle="modal" data-target="#viewAttendanceYear">
                                  YearWise
                                </button>
                              </form>
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
      <!-- this two divs are belongs to include sidebar_navbar page -->
      </div>
      </div>
      <!-- Jquery For table -->
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>

      <!-- script for table -->
      <script>
         $(document).ready(function(){
           $("#myInput").on("keyup", function() {
             var value = $(this).val().toLowerCase();
             $("#emp_list tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });

           $('#noticelist').DataTable({
             "scrollY":        "300px",
             "scrollCollapse": true,
           });
         });
      </script>
      <!-- table script ends here -->

   </body>
</html>
