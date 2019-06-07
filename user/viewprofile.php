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
                      <tr><td class="lefttd">Job Type:</td><td><?php echo $emp->job_type; ?></td></tr>
                      <tr><td class="lefttd">Joined On:</td><td><?php echo $emp->created_on; ?></td></tr>
                      <tr><td class="lefttd">Name:</td><td><?php echo $emp->first_name; ?>&nbsp;<?php echo $emp->last_name; ?></td></tr>
                      <?php
                          $query=mysqli_query($con,"SELECT * FROM designation where d_id=$emp->d_name") or die(mysqli_error($con));
                          while($emp1 = mysqli_fetch_object($query))
                          {
                       ?>
                      <tr><td class="lefttd">Designation:</td><td><?php echo $emp1->d_name; ?></td></tr>
                      <?php
                        }
                      ?>
                     <tr><td class="lefttd">Uplode Picture</td><td><input type="file" id="photo" name="photo" accept="image/*"></td></tr>
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
