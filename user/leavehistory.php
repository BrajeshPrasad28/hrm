 <?php
    include('dbconnection.php');
    session_start();
    if(!isset($_SESSION['User'])){
      header('location: index.php');
    }
    $emp_id=$_SESSION['User'];
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
                    <li class="active"><a href="#">Leave History</a></li>
                    <li><a href="#">Leave</a></li>
                    <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
                <div class="card-content">
                  <header>
                    <h2 class="page_title">Leave History</h2>
                  </header><hr>
                  <!--  <div id="search">
                        <input id="myInput" type="text" placeholder="Search...." style="width: 18%;float: right; margin-top: -2%;">
                    </div>-->
                    <div class="content-inner">
                      <table id="leavehistory" class="table table-stripped css-serial table-bordered order-column" name="leavehistory">
                         <thead style="background-color: #660066; color: white;">
                             <tr>
                                 <th>#</th>
                                 <th>Leave Type</th>
                                 <th>Posting Date</th>
                                 <th>From</th>
                                 <th>To</th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Remarks</th>
                                 <th>Approval Date</th>
                             </tr>
                         </thead>
                         <?php
                          $sql = "SELECT *FROM emp_leave where emp_id='$emp_id' ORDER BY posting_date";
                          $result = mysqli_query($con,$sql);
                          ?>
                         <tbody>
                           <?php
                             while($row = mysqli_fetch_array($result))
                             {
                            ?>
                           <tr>
                             <td></td>
                             <td>
                               <?php
                               if($row['leave_id']==1){
                                 echo "Emergency Leave";
                               }elseif($row['leave_id']==2){
                                 echo "Medical Leave";
                               }elseif($row['leave_id']==3){
                                 echo "Maternity Leave";
                               }elseif($row['leave_id']==4){
                                 echo "Educational Leave";
                               }elseif($row['leave_id']==5){
                                 echo "Casual Leave";
                               }
                               ?>
                             </td>
                             <td><?php echo $row['posting_date']; ?></td>
                             <td><?php echo $row['from_date']; ?></td>
                             <td><?php echo $row['to_date']; ?></td>
                             <td><?php echo $row['leave_description']; ?></td>
                             <?php
                              if($row['status']==1){
                              ?>
                             <td style="color: green;">
                               <?php
                                echo "Approved";
                                ?>
                             </td>
                           <?php } ?>
                           <?php
                            if($row['status']==0){
                            ?>
                           <td style="color: grey;">
                             <?php
                              echo "Pending";
                              ?>
                           </td>
                         <?php } ?>
                         <?php
                          if($row['status']==2){
                          ?>
                         <td style="color: red;">
                           <?php
                            echo "Rejected";
                            ?>
                         </td>
                       <?php } ?>
                         <td><?php echo $row['remarks']; ?></td>
                         <td><?php echo $row['apprv_or_rejct_date']; ?></td>
                           </tr>
                           <?php
                              }
                            ?>
                         </tbody>
                       </table>
                    </div>

              </div>
          </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="../js/jquery-3.3.1.slim.min.js"></script> -->
        <script src="../js/jquery-3.3.1.min.js"></script>
    <!-- Popper.JS -->
    <script src="../js/popper.min.js"></script>
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
    <!-- JavaScript for table-->
    <script type="text/javascript">
      $('#leavehistory').DataTable( {
          "scrollY":        "250px",
          "scrollCollapse": true,
          "orderClasses": true
      } );
    </script>
</body>
</html>
