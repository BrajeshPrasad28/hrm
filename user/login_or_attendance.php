
<!DOCTYPE html>
<html>
 <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style -->
    <link rel="stylesheet" href="../css/userlogin.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../moment/moment.js"></script>
 </head>

   <body onload=display_ct();>
     <div class="header">
       <img src="..\images\test.svg.png" alt="header_picture" style="height: 119px; width: 81px; margin-top: 3px; margin-bottom: 3px; margin-left: 26px;">
       <b style="font-size:28px; margin-left: 342px;">HUMAN RESOURCE MANAGEMENT</b>
      <!-- <h2><strong><center>HUMAN RESOURCE MANAGEMENT</center></strong></h2> -->
       <div class="login-logo" style="margin-left:85%; font-size:19px; font-weight:bold; margin-top:-102px;">
        <strong><p id="date"></p></strong>
         <strong><p id="time"></p></strong>
      </div>
      </div>
      <div class="wrapper">
         <div class="container login-container">
            <div class="row" style="position: relative;">
               <div class="col-md-6 login-form" style="height: 400px;">
                  <h3 style="color: black;">Login</h3>
                  <form action="login_process.php" method="post" autocomplete="off" style="margin-top: -20px;">
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
                           <input class="input-field form-control" type="text" placeholder="Employee Id" name="emp_id" style="border-radius: 0 0.25rem 0.25rem 0;">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-container">
                           <i class="fa fa-key icon" style="border-radius: 0.25rem 0 0 0.25rem;"></i>
                           <input class="input-field form-control" type="password" placeholder="Password" name="password" style="border-radius: 0 0.25rem 0.25rem 0;">
                        </div>
                     </div>
                     <div class="form-group">
                        <a href="logout.php"><input type="submit" class="btnSubmit" name="login" value="Login" style="margin-top: 15px;"></a>
                     </div>
                     <div class="form-group">
                        <a href="#" class="ForgetPwd">Forget Password?</a>
                     </div>
                  </form>
               </div>
               <h3 class="vl-innertext">OR</h3>
               <div class="col-md-6 attendence" style="height: 400px;">
                  <h3>Attendance</h3>
                  <form action="attendance_process.php" method="post" style="margin-top: -20px;">
                    <?php
                       if(@$_GET['Empty1']==true)
                       {
                       ?>
                    <div class="alart-light text-danger text-center" id='msg'>
                       <?php echo $_GET['Empty1'] ?>
                    </div>
                    <?php
                       }
                       ?>

                       <?php //Message for incorrect username for attendance
                          if(@$_GET['Empty2']==true)
                          {
                          ?>
                       <div class="alart-light text-success text-center" id='msg'>
                          <?php echo $_GET['Empty2'] ?>
                       </div>
                       <?php
                          }
                          ?>

                    <?php
                       if(@$_GET['Invalid1']==true)
                       {
                       ?>
                    <div class="alart-light text-danger text-center" id='msg'>
                       <?php echo $_GET['Invalid1'] ?>
                    </div>
                    <?php
                       }
                       ?>
                     <div class="form-group">
                        <div class="input-container">
                           <i class="fa fa-clock-o icon" style="border-radius: 0.25rem 0 0 0.25rem;"></i>
                           <select class="form-control" name="attendance" style="border-radius: 0 0.25rem 0.25rem 0;">
                              <option value="" hidden>Select IN/OUT</option>
                              <option value="In">Time In</option>
                              <option value="Out">Time Out</option>
                           </select>
                        </div>
                     </div>
                     <input type="text" name="working" value='0' hidden>
                     <input type="text" name="not_working" value='1' hidden>
                     <div class="form-group">
                        <div class="input-container">
                           <i class="fa fa-user-circle-o icon" style="border-radius: 0.25rem 0 0 0.25rem;"></i>
                           <input type="password" class="form-control" name="emp_id" style="border-radius: 0 0.25rem 0.25rem 0;" placeholder="Enter Employ Id" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <input type="submit" class="btnSubmit" name="attend" value="Submit" style="margin-top: 15px;">
                     </div>
                  </form>
               </div>
               <h3 class="vl-innertext">OR</h3>
            </div>
         </div>
      </div>

      <!--footer starts here--->
    <footer>
      <div class="footer">
        <strong><style="background-color: #071833;; color: white; margin-top: -22px;">DEVELOP AND DESIGN BY BRAJESH KUMAR PRASAD<br></strong>
        <strong><style="margin-top: -20px;">&copy2018 all right reserved</strong>
    </footer>
        <!--footer ENDS here--->

        <!-- script for time and date -->
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

   </body>
</html>
