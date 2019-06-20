<?php
  session_start();
  if(!isset($_SESSION['User'])){
    header('location: index.php');
  }
 ?>
<!DOCTYPE html>
<html>
   <head>
      <title>Payroll and Attendance Maintenance System</title>
      <?php include 'header.php'; ?>
   </head>
   <body>
    <?php include 'sidebar.php'; ?>
          <div class="cssmenu">
                <ul>
                    <li class="active"><a href="#">Contact</a></li>
                    <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
                </ul>
            </div>
            <div class="card" style="width: 567px; box-shadow: 0 8px 12px 0 rgba(0,0,0,0.5);  border-radius: 25px;">
                <div class="card-content">
                <div style="margin-left: 15px;">
                  <h5>
                    <strong>Address and Contact Details of the Head of office:<br/>
                            DIRECTORATE OF ACCOUNTS AND TREASURIES,ASSAM</strong><br/>
                  </h5>
                  <p>5th Floor, New Kar Bhawan, Ganeshguri,<br/>
                  Dispur, Guwahati, Assam-781006<br/>
                  Email: <strong style="color: blue;">director_treasury@rediffmail.com</strong> /
                  <strong style="color: blue;">assam_treasury@rediffmail.com</strong><br/>
                  <strong style="color: black;">Phone: 0361- 2232507 / 0361-2232508</strong></p>
                </div>
            </div>
          </div>
          <!-- These two divs is for sidebar  -->
        </div>
      </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../js/jquery-3.3.1.slim.min.js" ></script>
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
</body>

</html>
