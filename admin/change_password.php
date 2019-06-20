<?php
require_once('dbconnection.php');
require("admin_detail.php");
$username = $_SESSION['username'];
 ?>


 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <!-- <meta http-equiv="refresh" content="05"> -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

     <title>Change Password</title>

     <!-- Bootstrap CSS CDN -->
     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <!-- Custom CSS -->
     <link rel="stylesheet" href="css/adminstyle.css">

     <!-- Font Awesome JS -->
     <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style media="screen">

       .passchange{
         background: #fff;
         border-radius: 10px;
         padding: 30px;
         margin-top: 50px;
       }
       .chpass{
         margin: 0px;
         margin-bottom: 30px;
         font-size: 20px;
       }
     </style>
   </head>
<!-- body starts here -->
 <body>
 <!-- div of this include page are closed down below which shows extra two div -->
 <?php include 'sidebar_navbar1.php'; ?>
 <!-- Bredcrumb -->
 <div class="cssmenu">
    <ul>
       <li class="active"><a href="#">Change Password</a></li>
       <li><a href="#">Account</a></li>
       <li><a href="adminpanel.php"><i class="fa fa-home"></i> Home</a></li>
    </ul>
 </div>
 <!-- /Bredcrumb -->
 <!-- Main Content starts here -->
 <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
   <div class="mt-2 mb-2">
     <h3 style="color: teal; text-align: center;">Change Password</h3>
   </div>
   <div id="success" style="display:none;">
  </div>
 <form id='changepassword' name='changepassword' class="form-horizontal" method="post">
   <input type="hidden" name="username" id='username' value="<?php echo $username; ?>">
   <div class="ml-4 mt-3 mb-3">
     <hr>
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
     <hr>
   </div>
 </form>
 </div>
<!-- this two divs are belongs to include sidebar_navbar page -->
</div>
</div>
<script src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
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
    var username = $('#username').val();
    if(current_pass!="" && new_pass!="" && confirm_new_pass!=""){
      if(new_pass==confirm_new_pass){
      $.ajax({
        url: "change_password_process.php",
        type: "POST",
        data: {	current_pass: current_pass,	confirm_new_pass: confirm_new_pass, username: username},
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
