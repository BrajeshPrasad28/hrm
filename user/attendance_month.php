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
         <h2 class="page_title">Month Wise Attendance</h2>
      </header>
      <hr>
      <div class="row ml-4">
         <div class="text-center">
            <form method="post">
               <select class="btn" name="month" id='month' style="border: 1px solid black; border-radius: 0.25rem 0.25rem 0.25rem 0.25rem;" required>
                  <option value="" hidden>Select Month</option>
                  <?php
                     $months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
                     $transposed = array_slice($months, date('n'), 12, true) + array_slice($months, 0, date('n'), true);
                     $last8 = array_reverse(array_slice($transposed, -8, 12, true), true);
                     foreach ($months as $num => $name) {
                     printf('<option value="%u">%s</option>', $num, $name);
                     }
                     ?>
               </select>
               <select class="btn" name="year" id='year' style="border: 1px solid black; border-radius: 0.25rem 0.25rem 0.25rem 0.25rem; position: absolute; z-index: 100;" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;" required>
                  <option value=""hidden>Year</option>
                  <?php
                     for($i=2018; $i<=3001; $i++){
                     $selected = ($i==$year)?'selected':'';
                     echo "<option value='".$i."' ".$selected.">".$i."</option>";
                     }
                     ?>
               </select>
               <button type="submit" class="btn btn-primary" name="submit" id='submit' style="margin-left: 95px;">Search <i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
         </div>
      </div>
      <?php
         if(isset($_POST['submit'])){
           $abd = 0;//abd=absent date
           $month = $_POST['month'];
           $year = $_POST['year'];
           //for finding absent date
           $start_date = "01-".$month."-".$year;
           $start_time = strtotime($start_date);
           $end_time = strtotime("+1 month", $start_time);
           for($i=$start_time; $i<$end_time; $i+=86400)
           {
              $list[] = date('Y-m-d', $i);
           }

           //Query for present date
           $sdate = $year."-".$month."-01";
           $edate = $year."-".$month."-31";
           $emp_id=$_SESSION['User'];
           $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
           $result = mysqli_query($con,$sql);
           $date = array();
           $sql1 = mysqli_query($con,"SELECT first_name,last_name,job_type FROM employees WHERE emp_id = '$emp_id'");
           while ($row1 = mysqli_fetch_array($sql1)) {
              $name = $row1['first_name']." ".$row1['last_name'];
              $job_status = $row1['job_type'];
           }
         ?>
      <?php
         $months  = array("","January","February","March","April","May","June","July","August","September","October","November","December");
         //echo $months[$month];
         ?>
         <div class="month_Wise mt-3 ml-3 mr-3 mb-3">
         <div id='month_Wise'>
           <center><strong style="font-size: 20px"><?php echo $months[$month]."   ".$year; ?></strong></center>
           <div class="row ml-4">
             <p style="color: black;"><strong style="font-weight: bold;">Name:&nbsp;</strong><?php echo $name.", "; ?>&nbsp;</p>
             <p style="color: black;"><strong style="font-weight: bold;">Job Status:&nbsp;</strong><?php echo $job_status; ?></p>
           </div>
        <div class="content-inner">
          <!-- Php Test Area -->
          <?php
             while($row = mysqli_fetch_array($result))
             {
               $date[] = $row['date'];
               // echo $row['date']."<br>";
             }
               // if(count($date) == 0){
               //   echo "No Records Found!";
               // }
               ?>

          <table class="table table-bordered table-stripped">
            <thead>
              <tr>
                <th style="background-color: darkgrey;">Date</th>
                <th style="background-color: darkgrey;">Present</th>
                <th style="background-color: darkgrey;">Absent</th>
                <th style="background-color: darkgrey;">Works on Holiday</th>
              </tr>
            </thead>
            <tbody>
              <?php
             //Absent Calculation
             $count_sun=0;
             $sundayComp = array();

             $saturday_count = 0;
             $second_saturday = array();
             $fourth_saturday = array();
             if(count($date)!=0){
               $absent_date1 = $list;
               $fend = end($absent_date1);
               if(($month == 1)||($month == 2)||($month == 3)||($month == 4)||($month == 5)||($month == 6)||($month == 7)||($month == 8)||($month == 9)){
                  $x=$year."-0".$month."-00";
               }
               else{
                 $x=$year."-".$month."-00";
               }


               while($x<$fend)
              {
                $a=strtotime($x);
                if($month==10){
                  $b=$a+100000;//this code is only for october
                }else{
                  $b=$a+(24*60*60);//this code is for all the months exept october
                }
                $f2=date("Y-m-d",$b);
                $day=date("D",$b);
                if($day == "Sun")
                {
                 $sundayComp[] = $f2;
                }
                if($day == "Sat")
                {
                  $saturday_count++;
                  if($saturday_count == 2){
                    $second_saturday[] = $f2;//storing second saturday
                  }
                  if($saturday_count == 4){
                    $fourth_saturday[] = $f2;//stroring fourth saturday
                  }
                }
                $x=$f2;
              }
             }
             //*******************************
              $a_d = array();//$fourth saturday
              $sun_com = array();
              $sat_2nd = array();
              if(count($date)!=0){
               $absent_date = array_diff($list,$date);
               //excluding sundays, 2nd saturday and 4th saturday for absent date
               $sun_com = array_diff($absent_date,$sundayComp);
               $sat_2nd = array_diff($sun_com,$second_saturday);
               $a_d = array_diff($sat_2nd,$fourth_saturday);
               // $a_d = array_diff($absent_date,$sundayComp);
               $abd = count($a_d);
               $absent = array_values($a_d);//rearranging array

             }

               //for calculating works on holiday
               $works_on_holiday = array();
               //$sunday = array_intersect($sundayComp,$date);
               $works_on_sun = array_intersect($sundayComp,$date);
               $works_on_sat2nd = array_intersect($second_saturday,$date);
               $works_on_sat4th = array_intersect($fourth_saturday,$date);
               $sunday = array_merge($works_on_sun,$works_on_sat2nd,$works_on_sat4th);

               $total_works_on_holiday = 0;
               $total_works_on_holiday = count($sunday);
               $works_on_holiday = array_values($sunday);//rearranging array

              //Calculatinng date
               $count1=0;
               $count = count($list);
               $count1 = count($date);
               $count2 = count($works_on_holiday);
               $sub = $count-$count1;
               $sub1 = $count-$abd;
               $sub2 = $count-$count2;
               $date1 = array_values($date);//rearranging array index


               //Pushing valuse(date) to adjust the array length with length of month
               //This part is for present date
               if(count($date)!=0)
               {
                 for($i=0;$i<$sub;$i++)
                 {
                   array_push($date1,$i);
                 }
                 //This part is for absent date
                 for($i=0;$i<$sub1;$i++)
                 {
                   array_push($absent,$i);
                 }
                 //This part is for works on holidays
                 for($i=0;$i<$sub2;$i++)
                 {
                   array_push($works_on_holiday,$i);
                 }

               }

               for($i=0;$i<$count;$i++){
                  echo "<tr>";
                  echo "<td>".$list[$i]."</td>";?>
                  <!-- Present date -->
                  <td>
                    <?php
                       for($j=0;$j<count($date1);$j++)
                       {
                         if(strtotime($list[$i])==strtotime($date1[$j]))
                         {
                           echo $date1[$j];
                         }

                       }
                      ?>
                  </td>
                  <!-- Absent Date -->
                  <td>
                    <?php
                     for($j=0;$j<count($a_d);$j++)
                       {
                         if(strtotime($list[$i])==strtotime($absent[$j]))
                         {
                           echo $absent[$j];
                        }

                       }
                      ?>
                  </td>
                  <!-- Work on Holidays -->
                  <td>
                    <?php
                     for($j=0;$j<count($works_on_holiday);$j++)
                       {
                         if(strtotime($list[$i])==strtotime($works_on_holiday[$j]))
                         {
                           echo $works_on_holiday[$j];
                        }

                       }
                      ?>
                  </td>
                 <?php
                  echo "</tr>";
                }
                ?>

            </tbody>
            <tfoot>
              <tr>
                <td style="background-color: darkgrey"></td>
                <td style="font-weight: bold; background-color: darkgrey">Total:&nbsp;<?php  echo " ".$count1;?></td>
                <td style="font-weight: bold; background-color: darkgrey">Total:&nbsp;<?php echo " ".$abd; ?></td>
                <td style="font-weight: bold; background-color: darkgrey">Total:&nbsp;<?php echo " ".$total_works_on_holiday ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
         </div>

           <!-- <div id="editor"></div> -->
           <button type="button" class="btn btn-secondary ml-5 mb-3" onclick="printDiv('month_Wise')"><i class="fa fa-file-pdf-o"></i> Print</button>
           <?php
            }
            mysqli_close($con);
          ?>
       </div>
   </div>
</div>
</div>
</div>
<!-- jQuery CDN - Slim version  -->
<script src="../js/jquery-3.3.1.slim.min.js"></script>
<!-- Popper.JS -->
<script src="../js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="../js/bootstrap.min.js" ></script>
<!-- Jquery For table -->
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
<!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript">
   $(document).ready(function () {
     //script for sidebarCollapse
       $('#sidebarCollapse').on('click', function () {
           $('#sidebar').toggleClass('active');
       });
   });
</script>

<!-- script for pdf -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>
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
