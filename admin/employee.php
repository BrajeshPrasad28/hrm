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
      <?php include 'edit_emp_modal.php'; ?>

      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
              <li class="active"> <a href="#"><i class="fa fa-dashboard"></i>&nbsp; Employee</a></li>
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
           <ul style="list-style: none" >
              <li style="float: left; margin-left: -41px;" class="mb-3"><a href="employee.php"><button type="button"  class="btn btn-info btn-sm">All</button></li></a>
              <li style="float: left; margin-left: -2px;" class="mb-3"><a href="parmanent_emp.php"><button type="button" class="btn btn-info btn-sm">Parmanent</button></li>
              <li style="float: left; margin-left: 5px;" class="mb-3"><a href="contractual_emp.php"><button type="button"  class="btn btn-info btn-sm" >Contractual</button></li></a>
              <li style="float: left; margin-left: 5px;" class="mb-3"><button type="button"  data-toggle="modal" data-target="#add_emp_modal" class="btn btn-success btn-sm" >+ New</button></li>
           </ul>
            <div class="content-inner">
               <table id="noticelist" class="table table-stripped table-bordered order-column" style="width: 100%;">
                  <thead class="table-dark" style="font-weight: bold;">
                     <th>Employee Id</th>
                     <th>Photo</th>
                     <th>Job Type</th>
                     <th>Name</th>
                     <th>Gender</th>
                     <th>Position</th>
                     <th>Schedule</th>
                     <th>Member Since</th>
                     <th>View Attendance</th>
                     <th>Tool</th>
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
                          <td><?php echo $a['job_type']; ?></td>
                          <td><?php echo $a['first_name'].' '.$a['last_name'];?></td>
                          <td><?php echo $a['gender']; ?></td>
                          <td><?php echo $a['d_name']; ?></td>
                          <td><?php echo $a['time_in'].'-'.$a['time_out'];?></td>
                          <td><?php echo $a['created_on']; ?></td>
                          <td class="text-center">
                              <button type='button' name='viewM' id='<?php echo $a['emp_id']; ?>' style='display:inline-block;' class='btn btn-secondary btn-sm mb-1 viewMonth' data-toggle="modal" data-target="#viewAttendanceMonth">
                                MonthWise
                              </button>
                              <button type='button' name='viewY' id='<?php echo $a['emp_id']; ?>' style='display:inline-block; width:95px;' class='btn btn-secondary btn-sm viewYear' data-toggle="modal" data-target="#viewAttendanceYear">
                                YearWise
                              </button>
                          </td>

                            <!-- <form method='post'> <input type='hidden' name='emp_id' value='<?php echo $a['emp_id']; ?>' > <button type='submit' name='edit' style='margin:0px 5px; display:inline-block; float:left; width: 62px;' class='btn btn-success btn-sm mb-1'>Edit</button></form>
                            <form  method='post'>  <input type='hidden' name='emp_id' value='<?php echo $a['emp_id']; ?>' > <button  type='submit' name='delete'  style='margin:0px 5px; display:inline-block;  float:left;' class='btn btn-danger btn-sm'>Delete</button> </form> -->
                            <?php
                            echo "<td><button type='update' name='emp_id' value='".$a['emp_id']."' data-toggle='modal' data-target='#edit_emp_modal' name='disable'  style='margin:0px 5px; display:inline-block; float:left; width: 62px;' class='btn btn-success btn-sm mb-1'> Edit </button>
                            <form  style='display: inline-block;' method='post'>
                            <input type='hidden' name='emp_id' value='".$a['emp_id']."' >
                            <button  type='submit' name='delete'   style='margin:0px 5px; display:inline-block;  float:left;' class='btn btn-danger btn-sm'>Delete</button> </form> </td>";
                            echo " </tr>";
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
                      $('#dataModal').modal('show');
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
                    $('#dataModal').modal('show');
                }
            });
        }
    });
    </script>
   </body>
</html>
