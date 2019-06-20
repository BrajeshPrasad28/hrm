<?php
   include 'dbconnection.php';
   include "admin_detail.php";
   $ei = $_POST['id'];
   $sql = mysqli_query($con,"SELECT *FROM employees,designation,schedules where employees.emp_id = '$ei' and designation.d_id=employees.d_name AND schedules.id=employees.schedule_id;");
   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title></title>
   </head>
   <body>
      <form>
         <?php while($r = mysqli_fetch_array($sql)){
            ?>
         <div class="form-group">
            <div class="row">
               <label for="job_type" class="col-sm-3 control-label">Job Type</label>
               <div class="col-sm-9">
                  <select class="form-control" name="job_type" id="job_type" required>
                     <option value="<?php echo $r['job_type']; ?>" selected><?php echo $r['job_type']; ?></option>
                     <option value="Permanent">Permanent</option>
                     <option value="Contractual">Contractual</option>
                  </select>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="first_name" class="col-sm-3 control-label">Firstname</label>
               <div class="col-sm-9">
                  <input type="hidden" class="form-control" id="ide" name="ide" value="<?php echo $ei; ?>" required>
                  <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $r['first_name']; ?>" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="last_name" class="col-sm-3 control-label">Lastname</label>
               <div class="col-sm-9">
                  <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $r['last_name']; ?>" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="member" class="col-sm-3 control-label">Member Since</label>
               <div class="col-sm-9">
                  <input type="date" class="form-control" id="member" name="member" value="<?php echo $r['created_on']; ?>" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="dob" class="col-sm-3 control-label">Birthdate</label>
               <div class="col-sm-9">
                  <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $r['dob']; ?>" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="gender" class="col-sm-3 control-label">Gender</label>
               <div class="col-sm-9">
                  <select class="form-control" name="gender" id="gender" required>
                     <option value="<?php echo $r['gender']; ?>" selected><?php echo $r['gender']; ?></option>
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
                  <textarea class="form-control" name="address" id="address" required><?php echo $r['address']; ?></textarea>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="phones" class="col-sm-3 control-label">Phone</label>
               <div class="col-sm-9">
                  <input type="number" class="form-control" id="contact" name="contact" value='<?php echo $r['phone']; ?>' required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="email" class="col-sm-3 control-label">Email</label>
               <div class="col-sm-9">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $r['email']; ?>" required>
               </div>
            </div>
         </div>
         <div class="form-group">
            <div class="row">
               <label for="d_name" class="col-sm-3 control-label">Position</label>
               <div class="col-sm-9">
                  <select class="form-control" name="d_name" id="d_name" required>
                     <option value="<?php echo $r['d_id'] ?>" selected><?php echo $r['d_name']; ?></option>
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
                  <select class="form-control" id="schedule_id" name="schedule_id" required>
                     <option value="<?php echo $r['id']; ?>" selected=""><?php echo $r['time_in'].'-'.$r['time_out']; ?></option>
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
         <?php } ?>

         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload();">Close</button>
            <input type="submit" id="update" class="btn btn-primary btn-md update" value="Update" style="float:right;">
         </div>

      </form>
      <div id="success1">
      </div>
      <!-- Jquery For table -->
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script>
         $(document).ready(function() {
             $("#update").click(function() {
               var ide = $('#ide').val();
               var job_type = $('#job_type').val();
               var first_name = $('#first_name').val();
               var last_name = $('#last_name').val();
               var dob = $('#dob').val();
               var gender = $('#gender').val();
               var address = $('#address').val();
               var contact = $('#contact').val();
               var email = $('#email').val();
               var d_name = $('#d_name').val();
               var schedule_id = $('#schedule_id').val();
               var member = $('#member').val();
               var pass = $('#pass').val();
                 $.ajax({
                     type: 'post',
                     url: 'edit_process.php',

                     data: {
                       ide: ide,
                       job_type:job_type,
                       first_name: first_name,
                       last_name: last_name,
                       dob: dob,
                       gender: gender,
                       address: address,
                       contact:contact,
                       email: email,
                       d_name: d_name,
                       schedule_id: schedule_id,
                       member: member,
                       pass: pass
                     },

                     success: function(data) {
                          $('#success1').html(data);
                     }

                 });
                 return false;
             });
         });
      </script>
   </body>
</html>
