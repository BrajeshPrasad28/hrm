<?php
 require_once('dbconnection.php');
  $msg = "";
  $msg1 = "";
  if(isset($_POST["submit"]))
  {
  // $username=$_POST["username"];
  // $firstname=$_POST["firstname"];
  // $lastname=$_POST["lastname"];
  // $created_on=$_POST["created_on"];
  // $password=$_POST["password"];
  $target_dir = "../upload/";
 $target_file = $target_dir . basename($_FILES["photo"]["name"]);
 $uploadOk = 1;
 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 // Check if image file is a actual image or fake image

     $check = getimagesize($_FILES["photo"]["tmp_name"]);
     if($check !== false) {
         // echo "File is an image - " . $check["mime"] . ".";
         $uploadOk = 1;
     } else {
         echo "File is not an image.";
         $uploadOk = 0;
     }

 // Check if file already exists
 // if (file_exists($target_file)) {
 //     echo "Sorry, file already exists.";
 //     $uploadOk = 0;
 // }
 // Check file size
 if ($_FILES["photo"]["size"] > 500000) {
     echo "Sorry, your file is too large.";
     $uploadOk = 0;
 }
 // Allow certain file formats
 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
 && $imageFileType != "gif" ) {
     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
     $uploadOk = 0;
 }
 // Check if $uploadOk is set to 0 by an error
 if ($uploadOk == 0) {
     echo "Sorry, your file was not uploaded.";
 // if everything is ok, try to upload file
 }else{

         if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
             // echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";

               $query=mysqli_query($con,"UPDATE employees SET photo='$target_file' WHERE emp= '$emp->emp_id'") or die(mysqli_error($con));
            	if($query)
            	{
            		echo"<script> alert('successfully saved')</script>";
            	}
            	else
            	{
            		echo"<script> alert('unable to saved')</script>".mysqli_error($con);
            	}

         } else {
             echo "Sorry, there was an error uploading your file.";
         }


       }

 }

  ?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Payroll and Attendance Maintenance System</title>
    <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/userstyle.css">
    <!-- Css for Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Table Heeader Style-->

</head>

<body>

<?php include 'sidebar_and_header.php';?>

    <div class="cssmenu">
      <ul>
        <li class="active"><a href="#">View Profile</a></li>
        <li><a href="#">Account</a></li>
        <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
      </ul>
    </div>
    <div class="card">
    <div class="container">
    <div class="header">
    <h3><center style="font-weight: bolder; margin-top: 15px;"> Your Profile</h3></center>
    </div>
    <div class="main-content">
    <form class="wrap" method="post" enctype="multipart/form-data">
    <div style="height:420px; width:988px; margin:auto; margin-top:30px; margin-bottom:-107px; background-color:white; border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">

    <table cellpadding="0" cellspacing="0" style="margin:auto; width:100%;">
      <tr><td colspan="3">&nbsp;</td></tr>
        <tr><td  style=" padding-left:120px; padding-bottom: 12px;" ><img src="<?php echo $emp->photo; ?>" class="shaddoww" style="border: 2px solid powderblue; width: 170px; height:160px; border-radius: 50%; margin-top: -80px;"/>&nbsp; </td>
        <td style="vertical-align:top;padding-top:0px; font-weight: bold;">
          <p class="text-danger text-center" style="padding: 0px 0px 0px;"></p>
            <table cellpadding="0" cellspacing="1px" style="width:100%; height:424px;">
              <tr><td class="lefttd">Employee Id:</td><td><?php echo $emp->emp_id; ?></td></tr>
              <tr><td class="lefttd"> First Name:</td><td><?php echo $emp->first_name; ?></td></tr>
              <tr><td class="lefttd">Last Name:</td><td><?php echo $emp->last_name; ?></td></tr>
              <tr><td class="lefttd">Created On:</td><td><?php echo $emp->created_on; ?></td></tr>
             <tr><td class="lefttd">Uplode Picture</td><td><input type="file" id="photo" name="photo" /></td></tr>
             <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
             <tr><td>&nbsp;</td>
             <td><input type="submit" value="Update" name="submit" class="btn btn-primary" style="margin-top: -112px;">
             </td></td></tr></table></div>
      </table></form>
    </div>
    </div><br><br><br><br><br><br>
    </div>
    <!-- this two divs are belongs to include sidebar_navbar page -->
    </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>
