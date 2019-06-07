<?php
   require_once('dbconnection.php');
   require("admin_detail.php");

   ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dasboard</title>
      <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/adminstyle.css">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Css for Tables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/fixedcolumns/3.2.6/css/fixedColumns.dataTables.min.css" type="text/css">

      <!-- style starts here -->
      <style media="screen">
         /* tr:hover{
         background-color: #1C2833;
         } */
         select:hover{
         box-shadow: 4px 1px 20px lightblue;
         border-radius: 5px;
         }
         select{
         border-radius: 5px;
         }
         input:hover{
         box-shadow: 4px 1px 20px lightblue;
         border-radius: 5px;
         }
         input{
         border-radius: 5px;
         }
         #pht:hover {
            -ms-transform: scale(4.5); /* IE 9 */
            -webkit-transform: scale(4.5); /* Safari 3-8 */
            transform: scale(4.5);
            border-radius: 10%;
          }
          .emp{
              padding: 3px;
              /* height: 185px; */
              /* border: 4px; */
              /* border-style: solid;
              border-color: limegreen; */
              background: #466368;
              background: radial-gradient(#648880, #293f50);
              border-radius: 1rem 1rem 1rem 1rem;
              box-shadow: 4px 1px 20px teal;
          }
          text{
            font-size: 16px;
          }

      </style>
      <!--Style ends here -->
   </head>
   <body>
      <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <?php include 'add_emp_modal.php'; ?>
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
              <li class="active"> <a href="userpanel.php"><i class="fa fa-dashboard"></i>&nbsp; Dasboard</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <?php
        $query = mysqli_query($con,"SELECT * FROM employees");
        $total_per_emp = 0;
        $total_contr_emp = 0;
        $year = date('Y');
        while($row=mysqli_fetch_assoc($query))
        {

          if($row['job_type'] == 'Permanent')
          {
            $total_per_emp++;
          }
          if($row['job_type'] == 'Contractual')
          {
            $total_contr_emp++;
          }
        }
        $total_emp = mysqli_num_rows($query);
       ?>
      <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
        <h3 class="mt-2" style="text-align: center; color: teal;">Year:&nbsp;<?php echo ' '.$year; ?></h3>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6" style="margin-top: 10%;">

              <!-- Eployee Part -->
              <div class="emp">
                <h4 style="text-align:center; color: goldenrod;">Employees</h4>
                <hr style="border-color: #00bfff;">
                <div class="employee ml-4 mb-3">
                  <div class="row">
                    <h5 style="color: bisque; font-family:  Arial, Helvetica, sans-serif;"> Total Employees:&nbsp;<?php echo "  ".$total_emp; ?></h5>
                  </div>
                  <div class="row">
                    <h5 style="color: bisque; font-family:  Arial, Helvetica, sans-serif;">Total Permanent Employees:&nbsp;<?php echo " ".$total_per_emp; ?></h5>
                  </div>
                  <div class="row">
                    <h5 style="color: bisque; font-family:  Arial, Helvetica, sans-serif;">Total Contractual Employees:&nbsp;<?php echo " ".$total_contr_emp; ?></h5>
                  </div>
                </div>
              </div>
            </div>

            <!-- This div is for spacing between two div -->
            <!-- <div class="col-sm-1"></div> -->

            <div class="col-sm-6">
              <!-- bar chart -->
                <div class="" id="piechart"></div>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                      ['Employees', 'Total Employees'],
                      ['Permanent  Employee', <?php echo $total_per_emp?>],
                      ['Contractual Employees', <?php echo $total_contr_emp?>],
                    ]);

                      // Optional; add a title and set the width and height of the chart
                      var options = {'title':'Employees', 'width':500, 'height':400};

                      // Display the chart inside the <div> element with id="piechart"
                      var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                      chart.draw(data, options);
                    }
                    </script>

            </div>


            <!-- Attendance part -->
            <!-- <div class="col-sm-5" style="padding: 3px; border: 4px; border-style: solid; border-color: limegreen;background: radial-gradient(#6486B0, #29406D); border-radius: 1rem 1rem 1rem 1rem;">
              <h4 style="text-align:center; color: goldenrod;">Attendance</h4>
              <hr style="border-color: #00bfff;">
              <div class="attendance ml-3 mb-3" >

              </div>
            </div> -->
          </div>
        </div>

      </div>
      <!-- this two divs are belongs to include sidebar_navbar page -->
      </div>
      </div>

      <!-- Jquery For table -->
      <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>

   </body>
</html>
