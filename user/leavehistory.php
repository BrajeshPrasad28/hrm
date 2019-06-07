<?php
  include 'DBconnection.php';
  include 'sidebar_and_header1.php';
  $emp_id=$_SESSION['User'];

 ?>
 <style media="screen">
  /* Automatic Serial Number Row */
  .css-serial {
  counter-reset: serial-number; /* Set the serial number counter to 0 */
  }
  .css-serial td:first-child:before {
  counter-increment: serial-number; /* Increment the serial number counter */
  content: counter(serial-number); /* Display the counter */
  }
 </style>
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
                      <table id="leavehistory" class="table table-stripped css-serial" name="leavehistory">
                         <thead class="table-dark">
                             <tr>
                                 <th>#</th>
                                 <th>Leave Type</th>
                                 <th>Posting Date</th>
                                 <th>From</th>
                                 <th>To</th>
                                 <th>Description</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <?php
                          $sql = "SELECT * FROM emp_leave where emp_id='$emp_id' ORDER BY leave_id";
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
                                 echo "Pregnancy Leave";
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
    <!-- Jquery For table -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- JavaScript for table-->
    <script type="text/javascript">
      $(document).ready(function() {
      $('#leavehistory').DataTable( {
          "scrollY":        "250px",
          "scrollCollapse": true,
          //"paging":         false
      } );
      } );
    </script>

</body>

</html>
