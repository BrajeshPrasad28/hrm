<?php
 require_once('dbconnection.php');

 require("admin_detail.php");

  if(!isset($_SESSION['username'])){
    header("location: logout.php");
  }
   //echo "<pre>";
   //print_r($_POST); die();

  $msg = "";
  if(isset($_POST["submit"]))
  {
   $date=trim($_POST["date"]);
   $title=trim($_POST["title"]);
   $message=trim($_POST["message"]);

   $rs=mysqli_query($con,"insert into noticeboard (date,title,message) VALUES ('$date','$title','$message')") or die(mysqli_error());
      	if($rs)
      	{
      		echo"<script> alert('Posted successfully')</script>";
      	}
      	else
      	{
      		echo"<script> alert('Unable to post')</script";
      	}
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
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

          <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
            <header>
              <h2 class="page_title">Create New Notice</h2>
            </header>
            <div class="content-inner">
              <div class="form-wrapper">
                <form method="post">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" class="form-control" name="date">
                  </div>
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
                    <button type="submit" name="submit" class="btn btn-primary pull-right">Publish</button>
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
</script>

</body>
</html>
