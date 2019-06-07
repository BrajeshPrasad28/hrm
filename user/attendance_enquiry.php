<?php
   include('DBconnection.php');

   ?>
<?php include 'sidebar_and_header1.php';?>
<div class="cssmenu">
   <ul>
      <li class="active"><a href="#">Attendance</a></li>
      <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
   </ul>
</div>
<div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue; height: 350px">
   <div class="card-content">
      <header>
         <h2 class="page_title">Attendance</h2>
      </header>
      <hr>
      <div class="text-center" style="font-family: Arial, Helvetica, sans-serif;">
         <h3>Month wise / Year Wise Attendance</h3>
      </div>
      <div class="content-inner">
         <div id="month_Year" style="margin-left: 31%; margin-right: 31%;">
            <form name="monthYear" action="attendance_enq_process.php" method="post" id='monthYear'>
               <div class="form-group">
                 <div class="row">
                   <select class="form-control" name="my_wise" required>
                      <option value="" hidden>Select Monthwise/Yearwise</option>
                      <option value="monthwise">Monthwise</option>
                      <option value="yearwise">Yearwise</option>
                   </select>
                   <button type="submit" class="btn btn-success mt-3" name="month_year_wise">Submit</button>
                   </div>
                 </div>
               </div>
            </form>
         </div>
      </div>
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
<script type="text/javascript">
   $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
           $('#sidebar').toggleClass('active');
       });
   });
</script>
</body>
</html>
