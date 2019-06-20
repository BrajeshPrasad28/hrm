<?php
   include('DBconnection.php');
   session_start();
   if(!isset($_SESSION['User'])){
     header('location: index.php');
   }
?>
   <!DOCTYPE html>
   <html>
   <head>
       <title>Payroll and Attendance Maintenance System</title>
       <?php include 'header1.php';?>
   </head>
   <body>
   <?php include 'sidebar.php';?>
<div class="cssmenu">
   <ul>
      <li class="active"><a href="attendance_enquiry.php">Attendance</a></li>
      <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
   </ul>
</div>
<div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
   <div class="card-content">
      <header>
         <h2 class="page_title">Year Wise Attendance</h2>
      </header>
      <hr>
      <!-- Included attendance_year_process  -->
      <?php include('attendance_year_process.php');  ?>
   </div>
</div>
</div>
</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<!-- Popper.JS -->
<script src="../js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="../js/bootstrap.min.js"></script>
<!-- Jquery For table -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
     //script for sidebarCollapse
       $('#sidebarCollapse').on('click', function () {
           $('#sidebar').toggleClass('active');
       });
   });
</script>
<!-- Print Particular Div -->
<script>
		function printDiv(printDiv){
			var printContents = document.getElementById(printDiv).innerHTML;
			var originalContents = document.body.innerHTML;
			document.body.innerHTML = printContents;
			window.print();
			document.body.innerHTML = originalContents;
		}
	</script>
</body>
</html>
