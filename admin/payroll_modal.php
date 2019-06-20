<?php
   include 'dbconnection.php';
   include "admin_detail.php";
   $emp_id = $_POST['id'];
   $query = mysqli_query($con, "SELECT employees.emp_id,employees.photo,employees.first_name,employees.last_name,employees.job_type,salary.salary_id,salary.designation,salary.job_type,salary.basic,salary.hra,salary.da FROM employees,salary where employees.emp_id='$emp_id' AND employees.d_name=salary.designation AND employees.job_type=salary.job_type");
  ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <form>
        <table class="table table-bordered">
          <?php
          while($row=mysqli_fetch_array($query)){
             ?>
          <tr>
            <th>Employee ID</th>
            <td>
              <input type="hidden" name="sid" id='sid' value="<?php echo $row['salary_id']; ?>">
              <input type="hidden" name="empid" id='empid'  value="<?php echo $emp_id; ?>">
              <?php echo $emp_id; ?>
            </td>
          </tr>
          <tr>
            <th>Employee Name</th>
            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
          </tr>
          <tr>
            <th>Job Type</th>
            <td><?php echo $row['job_type']; ?></td>
          </tr>
          <tr>
            <th>Basic</th>
            <td>
              <input type="hidden" id="bc" name="bc" value="<?php echo $row['basic'];?>">
              <?php echo $row['basic'];?>
            </td>
          </tr>
          <tr>
            <th>House Rent Allowance(HRA)</th>
            <td>
              <input type="hidden" id="hr" name="hr" value="<?php echo $row['hra'];?>">
              <?php echo $row['hra'];?>
            </td>
          </tr>
          <tr>
            <th>Dearness Allowance(DA)</th>
            <td>
              <input type="hidden" id="d" name="d" value="<?php echo $row['da'];?>">
              <?php echo $row['da'];?>
            </td>
          </tr>
        <?php } ?>
        <tr>
          <th>Deduction</th>
          <td>
            <input type="number" class="form-control" id="dedct" name="dedct" value='<?php echo '0'; ?>'>
          </td>
        </tr>
        <tr>
          <th>Deduction Reason</th>
          <td>
            <input type="text" class="form-control" id='dedct_reason' name="dedct_reason" >
          </td>
        </tr>
        <tr>
          <th>Bonus</th>
          <td>
            <input type="number" class="form-control" id='bonus' name="bonus" value="<?php echo '0'; ?>">
          </td>
        </tr>
        <tr>
          <th>Bonus Reason</th>
          <td>
            <input type="text" class="form-control" id='bonus_reasons' name="bonus_reasons">
          </td>
        </tr>
        </table>

        <input type="submit" id="update" class="btn btn-primary btn-md update" value="Pay">
    </form>

      <div id="success1">

      </div>
  <!-- </form> -->

  <!-- Jquery For table -->
  <script src="../js/jquery-3.3.1.min.js"></script>
  <script>
  $(document).ready(function() {
      $("#update").click(function() {
        var empid = $('#empid').val();
        var basic = $('#bc').val();
        var hra = $('#hr').val();
        var da = $('#d').val();
        var dedct = $('#dedct').val();
        var dedct_reason = $('#dedct_reason').val();
        var bonus = $('#bonus').val();
        var bonus_reasons = $('#bonus_reasons').val();
        var sid = $('#sid').val();
          $.ajax({
              type: 'post',
              url: 'payroll_process.php',

              data: {
                    empid:empid,
                    basic: basic,
                    hra: hra,
                    da: da,
                    dedct: dedct,
                    dedct_reason: dedct_reason,
                    bonus: bonus,
                    bonus_reasons: bonus_reasons,
                    sid: sid
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
