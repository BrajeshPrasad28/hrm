
<?php
 require_once('dbconnection.php');

  $msg = "";
  $msg1 = "";
  if(isset($_POST["submit"]))
  {
    //
    // echo "<pre>";
    // print_r($_POST); die();
  $created_on=$_POST["created_on"];
  $job_type=$_POST["job_type"];
  $first_name=$_POST["first_name"];
  $last_name=$_POST["last_name"];
  $dob=$_POST["dob"];
  $gender=$_POST["gender"];
  $address=$_POST["address"];
  $phone=$_POST["phone"];
  $email=$_POST["email"];
  $d_name=$_POST["d_name"];
  $schedule_id=$_POST["schedule_id"];
  $password=$_POST["password"];

  //
  $letters = '';
  $numbers = '';
  foreach (range('A', 'Z') as $char) {
      $letters .= $char;
  }
  for($i = 0; $i < 10; $i++){
    $numbers .= $i;
  }
  $emp_id = substr(str_shuffle($letters), 0, 3).substr(str_shuffle($numbers), 0, 9);
  //

  $target_dir = "../upload/";
  $target_file = $target_dir . basename($_FILES["photo"]["name"]);
  $uploadOk = 1;

  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  //creating employeeid
      $check = getimagesize($_FILES["photo"]["tmp_name"]);
      if($check !== false) {
          // echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
      } else {
          echo "File is not an image.";
          $uploadOk = 0;
      }

  // Check if file already exists
  // if (file_exists($target_file)) {
  //     echo "Sorry, file already exists.";
  //     $uploadOk = 0;
  // }
  // Check file size
  if ($_FILES["photo"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
  }
  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
  }
  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  }else{

          if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
              // echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";

             $rs=mysqli_query($con,"INSERT INTO employees (emp_id, created_on, job_type, first_name, last_name, dob, gender, address, phone, email, d_name, schedule_id, password, photo) VALUES ('$emp_id','$created_on','$job_type','$first_name','$last_name','$dob','$gender','$address','$phone','$email','$d_name','$schedule_id','$password','$target_file')") or die(mysqli_error());
             	if($rs)
             	{
             		echo"<script> alert(' Added successfully')</script>";
             	}
             	else
             	{
             		echo"<script> alert('unable to saved')</script>".mysqli_error($con);
             	}

          } else {
              echo "Sorry, there was an error uploading your file.";
          }


        }

}

   ?>

<!-- The Modal -->
<div class="container-fluid">
<div class="modal fade" id="add_emp_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Employee</h4>
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
                  <option value="" selected="">- Select Job Type -</option>

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
