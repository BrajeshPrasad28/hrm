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
      <!-- style is here -->
      <style media="screen">
         tr:hover{
         background-color: #1C2833;
         }
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
          }
      </style>
      <!-- ends here -->
   </head>
   <body>
      <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <?php include 'add_emp_modal.php'; ?>
      <?php include 'edit_emp_modal.php'; ?>


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
               <table id="noticelist" class="table table-stripped table-hover table-bordered">
                  <thead class="table-dark" style="font-weight: bold;">
                     <th>Employee Id</th>
                     <th>Photo</th>
                     <th>Job Type</th>
                     <th>Name</th>
                     <th>Gender</th>
                     <th>Position</th>
                     <th>Schedule</th>
                     <th>Joined On</th>
                     <th>Tool</th>
                  </thead>
                  <tbody>
                     <?php
                        $query = mysqli_query($con, "SELECT emp_id,photo,created_on,job_type,first_name,last_name,gender,designation.d_name,schedules.time_in,schedules.time_out FROM ((employees inner join designation on employees.d_name=designation.d_id) inner join schedules on schedules.id=employees.schedule_id)");
                      //$query2 = mysqli_query($con, "SELECT * from employees");
                    while ($a = mysqli_fetch_array($query) /*AND $b = mysqli_fetch_object($query2)*/) {
                        ?>
                        <tr>
                          <td><?php echo $a['emp_id']; ?></td>
                          <td><img id='pht' src="<?php echo $a['photo'];?>"  style="width: 30px; height: 30px;"></td>
                          <td><?php echo $a['job_type']; ?></td>
                          <td><?php echo $a['first_name'].' '.$a['last_name'];?></td>
                          <td><?php echo $a['gender']; ?></td>
                          <td><?php echo $a['d_name']; ?></td>
                          <td><?php echo $a['time_in'].'-'.$a['time_out'];?></td>
                          <td><?php echo $a['created_on']; ?></td>
                          <?php
                          echo "<td><button type='submit' name='emp_id' value='".$a['emp_id']."' data-toggle='modal' data-target='#edit_emp_modal' name='disable' style='margin:0px 5px; display:inline-block; float:left;' class='btn btn-success btn-sm'> Edit </button></form>  <form  style='display: inline-block;' method='post'>  <input type='hidden' name='emp_id' value='".$a['emp_id']."' > <button  type='submit' name='delete'  style='margin:0px 5px; display:inline-block;  float:left;' class='btn btn-danger btn-sm'>Delete</button> </form> </td>";
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

      <!-- Jquery For table -->
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <!-- script for table -->
      <script>
         $(document).ready(function(){
           $("#myInput").on("keyup", function() {
             var value = $(this).val().toLowerCase();
             $("#emp_list tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });

           $('#noticelist').DataTable();

         });
      </script>
      <!-- table script ends here -->
   </body>
</html>
