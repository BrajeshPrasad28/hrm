<?php include('dbconnection.php');?>

<!-- This sidebar and header is for noticeboard and leavehistory -->
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
                        <table id="leavehistory" class="table table-hover table-stripped" name="leavehistory">
                           <thead class="table-dark">
                               <tr>
                                   <th>Date</th>
                                   <th>Title</th>
                                   <th>Message</th>
                                   <th>Status</th>
                               </tr>
                           </thead>
                           <tbody>
                             <?php
                               $q = "select * from noticeboard where status='Active'";
                               $query = mysqli_query($con,$q);

                               if($query){
                                 while($result = mysqli_fetch_array($query)){
                                   ?>
                                   <tr>
                                     <td><?php echo $result['date'] ?></td>
                                     <td><?php echo $result['title'] ?></td>
                                     <td><?php echo $result['message'] ?></td>
                                     <td style="color: green;"><?php echo $result['status'] ?></td>
                                   </tr>
                               <?php
                                 }
                               }
                                ?>
                           </tbody>
                         </table>
                      </div>

                    </div>

              </div>
          </div>
          <!-- this dev is close in other pages.. -->

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
    <!--
    <script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#notice').load('noticeboard.php #notice')
			}, 3000);
		});
	</script>
 -->
  <!-- Jquery For table -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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

</body>

</html>
