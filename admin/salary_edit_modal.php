<?php
   include 'dbconnection.php';
   include "admin_detail.php";
   $designation = $_POST['designation'];
   $id = $_POST['id'];
   $job_type = $_POST['j_type'];
   $query = mysqli_query($con, "SELECT  designation.d_id,designation.d_name,salary.designation,salary.job_type,salary.basic,salary.hra,salary.da FROM salary INNER JOIN designation on designation.d_id=salary.designation WHERE designation='$designation' AND job_type='$job_type';");
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <?php
      while($row=mysqli_fetch_array($query)){
         ?>
      <form>
        <div class="form-group">
          <div class="row">
          <label class="col-sm-3 control-label">Designation</label>

          <div class="col-sm-9">
            <select class="form-control" name="dname" id="dname" >
              <option value="<?php echo $row['d_id'];?>" selected><?php echo $row['d_name']; ?></option>
              <?php
                  $query=mysqli_query($con,"SELECT * FROM designation") or die(mysqli_error($con));

                    while($rows = mysqli_fetch_array($query)) {
                      ?>
                      <option value="<?php echo $rows['d_id']; ?>"><?php echo $rows['d_name']; ?></option>
                    <?php
                    }
              ?>
              </select>
          </div>
        </div>
        </div>
        <div class="form-group">
          <div class="row">
           <label class="col-sm-3 control-label">Job Type</label>

            <div class="col-sm-9">
              <select class="form-control" name="job" id="job" >
                <option value="<?php echo $row['job_type'];?>" selected><?php echo $row['job_type']; ?></option>

                      <option value="Parmanent">Permanent</option>

                      <option value="Contractual">Contractual</option>

                </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
           <label class="col-sm-3 control-label">Basic</label>
           <div class="col-sm-9">
             <input type="number" class="form-control" id="bc" name="bc" value="<?php echo $row['basic'];?>">
           </div>
          </div>
        </div>

        <div class="form-group">
          <div class="row">
           <label class="col-sm-3 control-label">House Rent Allowance (HRA)</label>
           <div class="col-sm-9">
             <input type="number" class="form-control" id="hr" name="hr" value="<?php echo $row['hra'];?>">
           </div>
          </div>
        </div>

        <div class="form-group">
            <div class="row">
            <label class="col-sm-3 control-label">Dearness Allowance (DA)</label>
            <div class="col-sm-9">
                <input type="number" class="form-control" id="d" name="d" value="<?php echo $row['da'];?>">
            </div>
        </div>
        </div>
        <input type="submit" id="update" class="btn btn-primary btn-md update" value="Update">
    </form>
  <?php } ?>
      <div id="success1">

      </div>
  <!-- </form> -->

  <!-- Jquery For table -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script>
  $(document).ready(function() {
      $("#update").click(function() {
        var dname = $('#dname').val();
        var job_type = $('#job').val();
        var basic = $('#bc').val();
        var hra = $('#hr').val();
        var da = $('#d').val();
        var id = <?php echo $id; ?>;
          $.ajax({
              type: 'post',
              url: 'salary_edit_modal_process.php',

              data: {
                    dname: dname,
                    job_type: job_type,
                    basic: basic,
                    hra: hra,
                    da: da,
                    id: id
              },

              success: function(data) {
                   $('#success1').html(data);
              }

          });
          return false;
      });
  });
  </script>
  <!-- javascript for alert message -->
  <script type="text/javascript">
     $(document).ready(function(){
     setTimeout(function() {
       $('#success').fadeOut('slow');
     }, 2000);
     });
  </script>
  <!-- /alert  -->

    </body>
  </html>
