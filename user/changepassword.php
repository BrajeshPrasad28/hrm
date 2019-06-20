<?php
  session_start();
  if(!isset($_SESSION['User'])){
    header('location: index.php');
  }
  $emp_id=$_SESSION['User'];
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Payroll and Attendance Maintenance System</title>
      <?php include 'header.php'; ?>
   </head>
   <body>
    <?php include 'sidebar.php'; ?>
            <div class="cssmenu">
                <ul>
                    <li class="active"><a href="#">Change Password</a></li>
                    <li><a href="#">Account</a></li>
                    <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            <div class="card">
              <div id="success" style="display:none;">
             </div>
            <form id='changepassword' name='changepassword' class="form-horizontal" method="post">
              <input type="hidden" name="emp_id" id='emp_id' value="<?php echo $emp_id; ?>">
              <div class="form-group row">
               <label class="col-sm-2 control-label">Current Password</label>
               <div class="col-sm-4">
                 <input type="password" class="form-control" id='current_pass' name='current_pass' onkeyup='check1();' required>
               </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id='new_pass' name="new_pass" onkeyup='check();' required>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 control-label">Confirm New Password</label>
                <div class="col-sm-4">
                  <input type="password" class="form-control" id='confirm_new_pass' name="confirm_new_pass" onkeyup='check();'  required>
                </div>
                <span id='message'></span>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                    <input type="button" name="save_btn" class="btn btn-success" value="Change Password" id="save_btn">
                </div>
              </div>
            </form>
            </div>
          </div>
    </div>

    <!-- jQuery - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
        //script for password matching for new Password
        var check = function() {
        if (document.getElementById('new_pass').value ==
          document.getElementById('confirm_new_pass').value) {
          document.getElementById('message').style.color = 'green';
          if(document.getElementById('new_pass').value == '' &&
            document.getElementById('confirm_new_pass').value ==''){
              document.getElementById('message').innerHTML = '';
            }else {
              document.getElementById('message').innerHTML = 'Matching';
            }

        } else {
          document.getElementById('message').style.color = 'red';
          document.getElementById('message').innerHTML = 'Not matching';
        }
      }
      //onchange remove disabled button
      var check1 = function() {
        $("#save_btn").removeAttr("disabled");
      }
    </script>
    <!-- Ajax for changing password -->
    <script>
    $(document).ready(function() {
    	$('#save_btn').on('click', function() {
    		$("#save_btn").attr("disabled", "disabled");
    		var current_pass = $('#current_pass').val();
    		var new_pass = $('#new_pass').val();
    		var confirm_new_pass = $('#confirm_new_pass').val();
        var emp_id = $('#emp_id').val();
    		if(current_pass!="" && new_pass!="" && confirm_new_pass!=""){
          if(new_pass==confirm_new_pass){
    			$.ajax({
    				url: "changepassword_process.php",
    				type: "POST",
    				data: {	current_pass: current_pass,	confirm_new_pass: confirm_new_pass, emp_id: emp_id},
    				// cache: false,
    				success: function(data) {

    											$("#save_btn").removeAttr("disabled");
                          $('#success').fadeIn().html(data);
    											//$('#success').html('Leave has been applied Successfully');
                      		setTimeout(function() {
                      				$('#success').fadeOut("slow");
                      		}, 3000);
    											$('#changepassword').trigger('reset');

                      }
    			});
        }else {
          alert('New password and Confirm New password must be same');
        }
    		}
    		else{
    			alert('Please fill all the field !');
    		}
    	});
    });
    </script>
</body>

</html>
