<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- style -->
      <link rel="stylesheet" href="../css/userlogin.css">
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src="../moment/moment.js"></script>
   </head>
   <body>
      <div class="header">
         <a href="#" class="logo"><img src="..\images\test.svg.png" alt="header_picture" style="height: 65px; width: 56px; margin-top: 10px; margin-bottom: 9px; margin-left: 26px; margin-right: 100px;"></a><br>
         <h2 style="text-align: center;">Attendance and Pay-roll System</h2>
         <div class="header-right">
            <span id='date' style="font-weight: bold; font-size: 25px" ></span><br>
            <span id='time' style="font-weight: bold; font-size: 25px" ></span>
         </div>
      </div>
      <div class="wrapper">
         <div class="container login-container">
            <div class="row" style="position: relative;">
               <div class="col-md-6 login-form">
                  <h3 style="color: black;">Login</h3>
                  <form action="login_process.php" method="post" autocomplete="off">
                     <?php
                        if(@$_GET['Empty']==true)
                        {
                        ?>
                     <div class="alart-light text-danger text-center" id='msg'>
                        <?php echo $_GET['Empty'] ?>
                     </div>
                     <?php
                        }
                        ?>

                     <?php
                        if(@$_GET['Invalid']==true)
                        {
                        ?>
                     <div class="alart-light text-danger text-center" id='msg'>
                        <?php echo $_GET['Invalid'] ?>
                     </div>
                     <?php
                        }
                        ?>
                     <div class="form-group">
                        <div class="input-container">
                           <i class="fa fa-user icon" style="border-radius: 0.25rem 0 0 0.25rem;"></i>
                           <input class="input-field form-control" type="text" placeholder="Username" name="username" style="border-radius: 0 0.25rem 0.25rem 0;">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-container">
                           <i class="fa fa-key icon" style="border-radius: 0.25rem 0 0 0.25rem;"></i>
                           <input class="input-field form-control" type="password" placeholder="Password" name="password" style="border-radius: 0 0.25rem 0.25rem 0;">
                        </div>
                     </div>
                     <div class="form-group">
                        <a href="logout.php"><input type="submit" class="btnSubmit" name="login" value="Login" /></a>
                     </div>
                     <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                     </div>
                  </form>
               </div>
               <h3 class="vl-innertext">OR</h3>
               <div class="col-md-6 attendence">
                  <h3>Attendance</h3>
                  <div class="alart-light text-danger text-center" id="success">
                  </div>
                  <form id="attendanceform" method="post" name="attendanceform">
                     <div class="form-group">
                        <div class="input-container">
                           <i class="fa fa-clock-o icon" style="border-radius: 0.25rem 0 0 0.25rem;"></i>
                           <select class="form-control" name="attendance" id='attendance' onchange="check()" style="border-radius: 0 0.25rem 0.25rem 0;">
                              <option value="" hidden>Select IN/OUT</option>
                              <option value="In">Time In</option>
                              <option value="Out">Time Out</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-container">
                           <i class="fa fa-user-circle-o icon" style="border-radius: 0.25rem 0 0 0.25rem;"></i>
                           <input type="password" class="form-control" name="emp_id" id='emp_id' style="border-radius: 0 0.25rem 0.25rem 0;" placeholder="Enter Employ Id" required>
                        </div>
                     </div>
                     <div class="form-group">
                       <input type="button" name="attendance_btn" class="btnSubmit" value="Submit" id="attendance_btn">
                     </div>
                  </form>
               </div>
               <h3 class="vl-innertext">OR</h3>
            </div>
         </div>
      </div>
      <div class="footer">
         <h5>DEVELOP BY PRANJAL BASUMATARY</h5>
         <h5 style="text-align: center;">&copy2018 All Right Reserved</h5>
      </div>
      <!-- jQuery CDN - Slim version (=without AJAX) -->
      <script src="../js/jquery-3.3.1.slim.min.js"></script>
      <!-- Bootstrap JS -->
      <script src="../js/bootstrap.min.js"></script>
      <!-- javascript -->
      <script src="../js/jquery-3.3.1.min.js"></script>
       <!-- script for time and date -->
       <!-- ajax for attendance -->
       <script>
       $(document).ready(function() {
       	$('#attendance_btn').on('click', function() {
       		$("#attendance_btn").attr("disabled", "disabled");
       		var attendance = $('#attendance').val();
       		var emp_id = $('#emp_id').val();
       		if(attendance!="" && emp_id!="" ){
       			$.ajax({
       				url: "attendance_process.php",
       				type: "POST",
       				data: {	attendance: attendance,	emp_id: emp_id},
       				// cache: false,
       				success: function(data) {

       											$("#attendance_btn").removeAttr("disabled");
                             $('#success').fadeIn().html(data);
       										//	$('#success').html('Leave has been applied Successfully');
                         		setTimeout(function() {
                         				$('#success').fadeOut("slow");
                         		}, 4000 );
       											$('#attendanceform').trigger('reset');

                         }
       			});
       		}
       		else{
       			alert('Timein/Timeot OR Emploee ID cannot be empty');
       		}
       	});
       });
       //onchange remove disabled button
       var check = function() {
         $("#attendance_btn").removeAttr("disabled");
       }
       </script>

       <script type="text/javascript">
       $(function() {
         var interval = setInterval(function() {
           var momentNow = moment();
           $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
           $('#time').html(momentNow.format('hh:mm:ss A'));
         }, 100);

         setTimeout(function(){
            $('#msg').remove();
          }, 4000);
       });
       </script>
       <!-- script ends here -->
      <?php echo \par ?>
   </body>
</html>
