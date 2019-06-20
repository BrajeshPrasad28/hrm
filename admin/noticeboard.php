<?php
 require_once('dbconnection.php');

 require("admin_detail.php");

  if(!isset($_SESSION['username'])){
    header("location: logout.php");
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="05"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

    <title>Noticeboard</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/adminstyle.css">
    <!--Style for noticeboard-->
    <link rel="stylesheet" href="css/adminstyle2.css">

    <!-- Editor style. -->
   <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

  <body>
    <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
             <li class="active"> <a href="#"><i class="fa fa-list-alt"></i>&nbsp; Noticeboard</a></li>
             <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
          <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
            <header>
              <h3 style="color: teal; text-align: center;">Create New Notice</h3>
            </header>
            <?php
            $msg = "";
            if(isset($_POST["submit"]))
            {
             $date=date('Y-m-d');
             $title=trim($_POST["title"]);
             $message=trim($_POST["message"]);

             $rs=mysqli_query($con,"INSERT into noticeboard (date,title,message) VALUES ('$date','$title','$message')");
                	if($rs)
                	{
                    ?>
                    <div class="alert alert-success" id='success'>
                      <h5 style="text-align: center;">Notice Successfully Published.</h5>
                    </div>
                    <?php
                   	}
             }
             mysqli_close($con);
             ?>
            <div class="content-inner">
              <div class="form-wrapper">
                <form method="post">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title...">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <div class="gj-editor gj-editor-bootstrap" style=" background-color: white;">
                      <textarea id="editor" name="message"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix">
                    <button type="submit" name="submit" class="btn btn-primary pull-right mt-1">Publish</button>
                  </div>
                </form>
              </div>
            </div>
    <!-- this two divs are belongs to include sidebar_navbar page -->
  </div>
  </div>

<!-- JS file for txt editor -->
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

<!-- JS for Text editor -->
<script type="text/javascript">
       $(document).ready(function () {
           $("#editor").editor({
               uiLibrary: 'bootstrap4'
           });
       });
       //script for alert message
       $(document).ready(function(){
       setTimeout(function() {
         $('#success').fadeOut('slow');
       }, 2000);
       });
</script>

</body>
</html>
