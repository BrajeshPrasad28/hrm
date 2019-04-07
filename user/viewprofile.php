<?php include('dbconnection.php');?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Payroll and Attendance Maintenance System</title>
    <link rel="shortcut icon" type="images/png" href="../images/Emblem_of_India.svg">

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
      <div class="row">
        <div class="profile-pic">
          <img id="image" src="../images/avatar.png" alt="Avatar" class="avatar">
          <div class="edit">
            <i class="fa fa-camera upload-button">
            <input class="file-upload" type="file"></i>
          </div>
        </div>

      <div class="profileinfo">
       <table>
         <tr>
           <td>Employee Exchange Code</td>
           <td>
             <input type="text" name="empcode" value="RG0123" disabled>
           </td>
           <td>Employee Type</td>
           <td>
              <input type="text" name="empcode" value="Developer" disabled>
           </td>
         </tr>
         <tr>
           <td>Employee Name</td>
           <td>
             <input type="text" name="empname" value="John Wick" disabled>
           </td>
           <td>Date of Birth</td>
           <td>
             <input type="text" name="empcode" value="1995-05-04" disabled>
           </td>
         </tr>
         <tr>
           <td>Email ID:</td>
           <td>
             <input type="text" name="empemail" value="john@gmail.com" disabled>
           </td>
         </tr>
         <tr>
           <td>Contact no:</td>
           <td>
             <input type="text" name="contactno" value="45234" disabled>
           </td>
         </tr>
       </table>
     </div>
   </div>
   <!-- this div is close in other pages -->
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
