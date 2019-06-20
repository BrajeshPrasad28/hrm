<!DOCTYPE html>
<html>
   <head>
      <title>Forgoy Password</title>
      <link href="../css/bootstrap.min.css" rel="stylesheet">
      <script src="../js/bootstrap.min.js"></script>
      <script src="../js/jquery-3.3.1.min.js"></script>
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         .form-gap {
         padding-top: 70px;
         }
         .container{
         width: max-content;
         }
         body{
         background-color: aliceblue;
         }
      </style>
   </head>
   <body>
      <div class="form-gap"></div>
      <div class="container">
         <div class="row col-3"></div>
         <div class="panel-body">
            <div class="text-center">
               <h3><i class="fa fa-lock fa-4x"></i></h3>
               <h2 class="text-center">Forgot Password?</h2>
               <p>You can reset your password here.</p>
               <div class="panel-body">
                  <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                     <div class="form-group">
                        <div class="input-container">
                           <input class="input-field form-control" type="text" placeholder="Username" name="username">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-container">
                           <input class="input-field form-control" type="password" placeholder="New Password" name="new_password">
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="input-container">
                           <input class="input-field form-control" type="password" placeholder="Confirm Password" name="confirm_password">
                        </div>
                     </div>
                     <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="row col-3"></div>
      </div>
   </body>
</html>
