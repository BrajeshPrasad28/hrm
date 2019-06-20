<?php
   require_once('dbconnection.php');



    $msg = "";
    $msg1 = "";
    if(isset($_POST["submit"]))
    {
      //
      // echo "<pre>";
      // print_r($_POST); die();
    $job_type=$_POST["job_type"];
    $first_name=$_post["first_name"];
    $last_name=$_post["last_name"]
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $d_name=$_POST["d_name"];
    $schedule_id=$_POST["schedule_id"];

     $rs=mysqli_query($con,"UPDATE employees (job_type, first_name, last_name, address, phone, email, d_name, schedule_id) VALUES ('$job_type','$first_name','$last_name','$address','$phone','$email','$d_name','$schedule_id')") or die(mysqli_error());
     	if($rs)
     	{
     		echo"<script> alert(' Updated successfully')</script>";
     	}
     	else
     	{
     		echo"<script> alert('unable to Updated')</script>".mysqli_error($con);
     	}

   } else {
      echo "Sorry, there was an error uploading your file.";
   }


   }

   }

   ?>
<!-- The Modal -->
<div class="container-fluid">
<div class="modal fade" id="edit_emp_modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
               <div class="form-group">
                  <div class="row">
                     <label for="created_on" class="col-sm-3 control-label">Created On</label>
                     <div class="col-sm-9">
                        <input type="date" class="form-control" id="created_on" name="created_on" required="">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="job_type" class="col-sm-3 control-label">Job Type</label>
                     <div class="col-sm-9">
                        <select class="form-control" name="job_type" id="job_type" required="">
                           <option value="" selected="">- Select -</option>
                           <option value="Parmanent">Parmanent</option>
                           <option value="Contractual">Contractual</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="first_name" class="col-sm-3 control-label">Firstname</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" id="first_name" name="first_name" required="">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="last_name" class="col-sm-3 control-label">Lastname</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" id="last_name" name="last_name" required="">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="dob" class="col-sm-3 control-label">Birthdate</label>
                     <div class="col-sm-9">
                        <input type="date" class="form-control" id="dob" name="dob">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="gender" class="col-sm-3 control-label">Gender</label>
                     <div class="col-sm-9">
                        <select class="form-control" name="gender" id="gender" required="">
                           <option value="" selected="">- Select -</option>
                           <option value="Male">Male</option>
                           <option value="Female">Female</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="address" class="col-sm-3 control-label">Address</label>
                     <div class="col-sm-9">
                        <textarea class="form-control" name="address" id="address"></textarea>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="phone" class="col-sm-3 control-label">phone</label>
                     <div class="col-sm-9">
                        <input type="number" class="form-control" id="phone" name="phone">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="email" class="col-sm-3 control-label">Email</label>
                     <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="d_name" class="col-sm-3 control-label">Position</label>
                     <div class="col-sm-9">
                        <select class="form-control" name="d_name" id="d_name" required="">
                           <option value="" selected="">- Select -</option>
                           <?php
                              $query=mysqli_query($con,"SELECT * FROM designation") or die(mysqli_error($con));

                                while($rows = mysqli_fetch_array($query)) {
                                  echo '<option value="'.$rows['d_id'].'"> '.$rows['d_name'].'</option>';
                                }
                              ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="schedule_id" class="col-sm-3 control-label">Schedule</label>
                     <div class="col-sm-9">
                        <select class="form-control" id="schedule_id" name="schedule_id" required="">
                           <option value="" selected="">- Select -</option>
                           <?php
                              $query=mysqli_query($con,"SELECT * FROM schedules") or die(mysqli_error($con));

                                while($rows = mysqli_fetch_array($query)) {
                                  echo '<option value="'.$rows['id'].'"> '.$rows['time_in'].'-'.$rows['time_out'].'</option>';
                                }
                              ?>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="photo" class="col-sm-3 control-label">Photo</label>
                     <div class="col-sm-9">
                        <input type="file" name="photo" id="photo">
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <label for="password" class="col-sm-3 control-label">Password</label>
                     <div class="col-sm-9">
                        <input type="text" class="form-control" id="password" name="password">
                     </div>
                  </div>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
