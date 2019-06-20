<?php
  require_once('dbconnection.php');
  if(isset($_POST['submit'])){
    $designation = $_POST['d_name'];
    $job_type = $_POST['job_type'];
    $basic = $_POST['basic'];
    $hra = $_POST['hra'];
    $da = $_POST['da'];

    $sql = mysqli_query($con,"INSERT INTO salary(designation,job_type,basic,hra,da) VALUES('$designation','$job_type','$basic','$hra','$da')");
    if($sql){
      ?>
      <div id='success' class="alert " role="alert">
      <h5 style="color: green; text-align: center;">Salary Added successfully</h5>
      </div>
      <?php
    }
  }
 ?>
<div class="modal fade" id="add_salary_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="color: teal;">Add Salary</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="form-horizontal" method="POST"  enctype="multipart/form-data">
          <div class="form-group">
            <div class="row">
            <label for="d_name" class="col-sm-3 control-label">Designation</label>

            <div class="col-sm-9">
              <select class="form-control" name="d_name" id="d_name" required>
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

            	<label for="job_type" class="col-sm-3 control-label">Job Type</label>

              <div class="col-sm-9">
                <select class="form-control" name="job_type" id="job_type" required>
                  <option value="" selected="">- Select -</option>

                        <option value="Permanent">Permanent</option>

                        <option value="Contractual">Contractual</option>

                  </select>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">

            	<label for="first_name" class="col-sm-3 control-label">Basic</label>

            	<div class="col-sm-9">
              	<input type="number" class="form-control" id="basic" name="basic" required>
            	</div>
            </div>
          </div>

          <div class="form-group">
            <div class="row">

            	<label for="last_name" class="col-sm-3 control-label">House Rent Allowance (HRA)</label>

            	<div class="col-sm-9">
              	<input type="number" class="form-control" id="hra" name="hra">
            	</div>
            </div>
          </div>

          <div class="form-group">
              <div class="row">
              <label for="dob" class="col-sm-3 control-label">Dearness Allowance (DA)</label>

              <div class="col-sm-9">
                  <input type="number" class="form-control" id="da" name="da">
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
