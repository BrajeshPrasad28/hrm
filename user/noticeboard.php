<?php
   include('dbconnection.php');
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
                    <li class="active"><a href="#">Notice Board</a></li>
                    <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
                <div class="card-content">
                  <header>
                    <h2 class="page_title">Notice List</h2>
                  </header><hr>
                  <!--  <div id="search">
                        <input id="myInput" type="text" placeholder="Search...." style="width: 18%;float: right; margin-top: -2%;">
                    </div>-->
                    <div class="content-inner">
                      <div id="notice">
                        <table id="leavehistory" class="table table-stripped table-bordered" name="leavehistory">
                           <thead style="background-color: #660066; color: white;">
                               <tr>
                                 <th style="width: 5%;">#</th>
                                 <th style="width: 10%;">Date</th>
                                 <th>Title</th>
                                 <th>Message</th>
                                 <th>Status</th>
                               </tr>
                           </thead>
                           <tbody id='view'>

                           </tbody>
                         </table>
                      </div>
                    </div>
              </div>
          </div>
          <!-- These two divs for sidebar -->
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->
    <!-- Bootstrap JS -->
    <script src="../js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
  <!-- Jquery For table -->
  <script src="../js/jquery.dataTables.min.js"></script>
  <!-- JavaScript for table -->
  <script type="text/javascript">
    $(document).ready(function() {
    $('#leavehistory').DataTable( {
      "scrollY":        "300px",
      "scrollCollapse": true,
      //"paging":         false
      } );
      } );
  </script>
  <!-- Ajax for data view -->
<script type="text/javascript">
  $.ajax({
    url: "noticedisplay.php",
    type: "POST",
    cache: false,
    success: function(data){
      $('#view').html(data);
    }
  });
</script>
</body>
</html>
