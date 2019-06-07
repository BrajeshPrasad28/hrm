<?php
   include('DBconnection.php');

   ?>
<?php include 'sidebar_and_header1.php';?>
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

      <!-- Test -->

   </div>
</div>
</div>
</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- Jquery For table -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
