
<?php require_once('dbconnection.php'); ?>

<?php

  $msg = " ";
  if(isset($_POST['submit'])){
  echo "<pre>";
    print_r($_POST); die();
  }

 ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Payroll and Attendance Maintenance System</title>
<link rel="shortcut icon" type="images/png" href="../images/test.svg.png">
<!--Drowpdown Box Style-->
<link rel="stylesheet" href="../css/SelectBox.css">
<!-- Bootstrap CSS CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="../css/userstyle.css">
<link rel="stylesheet" href="../css/userprofile.css">


<style>
  label{
    font-weight: 700;
  }
</style>
</head>
<body>

<?php include 'sidebar_and_header.php';?>

<div class="cssmenu">
     <ul>
        <li class="active"><a href="#">Apply Leave</a></li>
        <li><a href="#">Leave</a></li>
        <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
     </ul>
</div>
  <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
    <header>
      <h2 class="page_title"><center style="color: teal;">Apply Leave</center></h2>
    </header><hr>

     <form id="leaveform" method="post" name="leaveform">

       <div class="row">
         <div class="col-sm-8" style="padding-left: 60px;">
           <?php

            echo '<p class="error text-danger mt-3  ">'.$msg.'</p>' ?>
            <div class="row" style="margin-top: 12px;">
          <div class="col-25">
             <label for="leave">Leave Type</label>
          </div>
          <div class="col-75">
             <select name="leavetype"  style="background-color: white;border-top: none;border-left: none; border-right: none;">
               <option value="">Select Leave Type</option>
                  <?php
                  if($emp->gender == 'Male'){
                    $leave_type = 'leave_type';
                    $leave_gender = 'Male';
                    $query = mysqli_query($con, "SELECT * FROM $leave_type WHERE gender='$leave_gender'");

                  }
                  elseif($emp->gender == 'Female'){
                    $leave_type = 'leave_type';
                    $leave_gender = 'Female';
                    $query = mysqli_query($con, "SELECT * FROM $leave_type ");


                  }else{
                      $leave_type = 'leave_type';
                      $leave_gender = 'Other';
                      $query = mysqli_query($con, "SELECT * FROM $leave_type ");


                  }
                  while($row = mysqli_fetch_object($query)){
                    echo '<option value="'.$row->leave_id.'" >'.$row->type.'</option>';
                  }

                  ?>
                  
             </select>


          </div>
       </div>
             <div class="row">
                <div class="col-25">
                   <label for="fdate">From Date</label>
                </div>
                <div class="col-75">
                   <input type="date" id="fdate" name="fromdate" style="border-radius: 0; border: 1px solid #ccc; float: left; margin: 0; padding: 0; border-top: 0px;border-left: 0px; border-right: 0px;">
                </div>
                <div class="col-25">
                   <label for="todate">To Date</label>
                </div>
                <div class="col-75">
                   <input type="date" id="tdate" name="todate" style="border-radius: 0; border: 1px solid #ccc;  float: left; margin: 0; padding: 0; border-top: 0px;border-left: 0px; border-right: 0px;">
                </div>
             </div>
             <div class="row">
              <div class="col-25">
                 <label for="description">Description</label>
              </div>
              <div class="col-75">
                 <textarea id="description" name="description" placeholder="Write something.." style="height:55px"></textarea>
              </div>
              <div style="padding: 30px; margin-right: 5px; margin-left: 231px;">
                 <input type="button" class="btn btn-success btn-md" name="submit" value="Apply" id="apply">
              </div>
           </div></form>
         </div>
         <div class="col-sm-4"  style="border-left: 1px solid #ddd; padding: 0px 30px;">
           <div class="row">
             <div class="col-sm-12">
               <style>
               table.leave tr th{
                 width: 150px;
               }
               </style>
               <center><h4 class="mt-1"> Leave Balance</h4></center>
                <table class="table leave">

                <?php

                  if($emp->gender == 'Male'){
                    $leave_type = 'leave_type';
                    $leave_gender = 'Male';
                    $query2 = mysqli_query($con, "SELECT * FROM $leave_type WHERE gender='$leave_gender'");

                  }
                  elseif($emp->gender == 'Female'){
                    $leave_type = 'leave_type';
                    $leave_gender = 'Female';
                    $query2 = mysqli_query($con, "SELECT * FROM $leave_type ");


                  }else{
                      $leave_type = 'leave_type';
                      $leave_gender = 'Other';
                      $query2 = mysqli_query($con, "SELECT * FROM $leave_type ");
                  }



                    while($leave = mysqli_fetch_object($query2)){
                      if(isset($emp->emp_id) && isset($leave->type)){
                                $query3 = mysqli_query($con, "SELECT * FROM leave_balance WHERE emp_id='$emp->emp_id' AND leave_type='$leave->type'") or die(mysqli_error($con));
                                $obj = mysqli_fetch_object($query3);
                                if($obj){

                                  echo "<tr>
                                          <th>  ".$leave->type."  </th>
                                          <td>:  ".$obj->balance." / ".$leave->leave_blnc."</td>
                                        </tr>
                                        ";
                                }else{

                                  echo "<tr>
                                          <th>  ".$leave->type."  </th>
                                          <td>:  0 / ".$leave->leave_blnc."</td>
                                        </tr>
                                        ";

                                }
                            }

                      }
                  ?>
                </table>
             </div>
           </div>
         </div>
       </div>
  </div>
      <!-- this  two div's are closed in other pages -->
</div>
</div>


      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <!-- Popper.JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

      <script type="text/javascript">
         $(document).ready(function () {
             $('#sidebarCollapse').on('click', function () {
                 $('#sidebar').toggleClass('active');
             });
         });

         $(document).find('textarea').each(function () {
         var offset = this.offsetHeight - this.clientHeight;

         $(this).on('keyup input focus', function () {
             $(this).css('height', 'auto').css('height', this.scrollHeight + offset);
           });
         });
      </script>
      <!-- <script>
         $(document).find('textarea').each(function () {
          var offset = this.offsetHeight - this.clientHeight;

          $(this).on('keyup input focus', function () {
              $(this).css('height', 'auto').css('height', this.scrollHeight + offset);
            });
          });
         </script> -->
      <!-- Drowpdown-->
      <script src="../css/SelectBox.js"></script>
      <script>
         $('select').SelectBox();
      </script>
   </body>
</html>
