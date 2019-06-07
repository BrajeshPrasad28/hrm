<?php
require_once('dbconnection.php');
$emp_id = $_POST['id'];
$year = $_POST['year'];
if(isset($_POST['id'])){
 ?>
<center> <h2 style="color: teal;"><?php echo "Year: ".$year; ?> </h2> </center>
<?php
 $jan = array(); $feb = array(); $march = array(); $april = array(); $may = array(); $june = array(); $july = array();
 $august = array(); $september = array(); $october = array(); $november = array(); $december = array();
 for($i=1;$i<=12;$i++)
 {
   switch($i){
     case 1: $sdate = $year."-01-01";
             $edate = $year."-01-31";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $jan[] = $row['date'];
             }
             $jan1 = count($jan);

             break;

     case 2: $sdate = $year."-02-01";
             $edate = $year."-02-29";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $feb[] = $row['date'];
             }
             $feb1 = count($feb);
             break;
     case 3: $sdate = $year."-03-01";
             $edate = $year."-03-31";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $march[] = $row['date'];
             }
             $march1 = count($march);
             break;

     case 4: $sdate = $year."-04-01";
             $edate = $year."-04-30";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $april[] = $row['date'];
             }
             $april1 = count($april);
             //echo $jan1;
            break;

     case 5: $sdate = $year."-05-01";
             $edate = $year."-05-31";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $may[] = $row['date'];
             }
             $may1 = count($may);
            break;

     case 6: $sdate = $year."-06-01";
             $edate = $year."-06-30";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $june[] = $row['date'];
             }
             $june1 = count($june);
            break;

     case 7: $sdate = $year."-07-01";
             $edate = $year."-07-31";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $july[] = $row['date'];
             }
             $july1 = count($july);
            break;
     case 8:$sdate = $year."-08-01";
             $edate = $year."-08-31";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $august[] = $row['date'];
             }
             $august1 = count($august);
           break;
     case 9:$sdate = $year."-09-01";
             $edate = $year."-09-30";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $september[] = $row['date'];
             }
             $september1 = count($september);
           break;
     case 10:$sdate = $year."-10-01";
             $edate = $year."-10-31";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $october[] = $row['date'];
             }
             $october1 = count($october);
           break;
     case 11:$sdate = $year."-11-01";
             $edate = $year."-11-30";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $november[] = $row['date'];
             }
             $november1 = count($november);
            break;
     case 12:$sdate = $year."-12-01";
             $edate = $year."-12-31";
             $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$emp_id'";
             $result = mysqli_query($con,$sql);
             while($row = mysqli_fetch_array($result))
             {
               $december[] = $row['date'];
             }
             $december1 = count($december);
           break;
     default:echo "Error!";
   }
 }
 // Total sum of Present in particular year
 $totalPresent = $jan1+$feb1+$march1+$april1+$may1+$june1+$july1+$august1+$september1+$october1+$november1+$december1;
 $jan_ab=0;$feb_ab=0;$march_ab=0;$april_ab=0;$may_ab=0;$june_ab=0;$july_ab=0;$august_ab=0;$september_ab=0;$october_ab=0;$november_ab=0;$december_ab=0;
 $sunday1=0;$sunday2=0;$sunday3=0;$sunday4=0;$sunday5=0;$sunday6=0;$sunday7=0;$sunday8=0;$sunday9=0;$sunday10=0;$sunday11=0;$sunday12=0;
?>
<div class="content-inner">
  <div id="month_Wise">
     <form name="monthWise" method="post">
        <table class="table table-stripped table-bordered" id='attendance_table'>
           <thead style="background-color: darkgrey;">
              <tr>
                 <th>Month</th>
                 <th>Total Present</th>
                 <th>Total Absent</th>
                 <th>Works On Holidays (if any)</th>
              </tr>
           </thead>
           <tbody>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">January</td>
                 <td><?php echo $jan1; ?></td>
                 <td>
                 <?php
                 //for calculating date for particular month
                 $start_date1 = "01-01-".$year;//day-month-year
                 $start_time1 = strtotime($start_date1);
                 $end_time1 = strtotime("+1 month", $start_time1);
                 for($i=$start_time1; $i<$end_time1; $i+=86400)
                 {
                    $list1[] = date('Y-m-d', $i);
                 }
                 //Holiday Calculations************
                 $sundayComp1 = array();
                 $sat_2nd_1 = array();
                 $sat_4th_1 = array();
                 $sat_count_1 = 0;
                 if(count($jan)!=0){
                   $absent_date1 = $list1;
                   $f1 = $year."-01-00";
                   $fend1 = end($absent_date1);
                   $x1=$f1;

                   while($x1<$fend1)
                  {
                    $a1=strtotime($x1);
                    $b1=$a1+(24*60*60);
                    $f2_1=date("Y-m-d",$b1);
                    $day1=date("D",$b1);
                    if($day1 == "Sun")
                    {
                     $sundayComp1[] = $f2_1;
                    }
                    if($day1 == "Sat")
                    {
                      $sat_count_1++;
                      if($sat_count_1 == 2){
                        $sat_2nd_1[] = $f2_1;
                      }
                      if($sat_count_1 == 4){
                        $sat_4th_1[] = $f2_1;
                      }
                    }
                    $x1=$f2_1;
                  }
                 }
                 //**************************
                 //this part is for excluding sunday, 2nd saturday and 4th saturday for january
                 if(count($jan)!=0){
                   $jan_absent = array_diff($list1,$jan);
                   $jan_sunday_diff = array_diff($jan_absent,$sundayComp1);
                   $jan_sat_2nd_diff = array_diff($jan_sunday_diff,$sat_2nd_1);
                   $jan_ab = count(array_diff($jan_sat_2nd_diff,$sat_4th_1));
                   echo $jan_ab;
                 }
                 else{
                   echo "0";
                 }
                  ?>
                </td>
                 <td>
                   <?php
                   $jan_sunday_merg = array_intersect($sundayComp1,$jan);
                   $jan_sat_2nd_merg = array_intersect($sat_2nd_1,$jan);
                   $jan_sat_4th_merg = array_intersect($sat_4th_1,$jan);
                   $sunday1 = count(array_merge($jan_sunday_merg,$jan_sat_2nd_merg,$jan_sat_4th_merg));
                   echo $sunday1;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">February</td>
                 <td><?php echo $feb1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date2 = "01-02-".$year;//day-month-year
                   $start_time2 = strtotime($start_date2);
                   $end_time2 = strtotime("+1 month", $start_time2);
                   for($i=$start_time2; $i<$end_time2; $i+=86400)
                   {
                      $list2[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp2 = array();
                   $sat_2nd_2 = array();
                   $sat_4th_2 = array();
                   $sat_count_2 = 0;
                   if(count($feb)!=0){
                     $absent_date2 = $list2;
                     $f2 = $year."-02-00";
                     $fend2 = end($absent_date2);
                     $x2=$f2;

                     while($x2<$fend2)
                    {
                      $a2=strtotime($x2);
                      $b2=$a2+(24*60*60);
                      $f2_2=date("Y-m-d",$b2);
                      $day2=date("D",$b2);
                      if($day2 == "Sun")
                      {
                       $sundayComp2[] = $f2_2;
                      }
                      if($day2 == "Sat")
                      {
                        $sat_count_2++;
                        if($sat_count_2 == 2){
                          $sat_2nd_2[] = $f2_2;
                        }
                        if($sat_count_2 == 4){
                          $sat_4th_2[] = $f2_2;
                        }
                      }
                      $x2=$f2_2;
                    }
                   }
                   //**************************
                   //this part is for excludig sunday, 2nd saturday and 4th saturday of feb
                   if(count($feb)!=0){
                     $feb_absent = array_diff($list2,$feb);
                     $feb_sunday_diff = array_diff($feb_absent,$sundayComp2);
                     $feb_sat_2nd_diff = array_diff($feb_sunday_diff,$sat_2nd_2);
                     $feb_ab = count(array_diff($feb_sat_2nd_diff,$sat_4th_2));
                     echo $feb_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   //this part is for calculating works on like sunday,2nd saturday and 4th saturday
                   $feb_sunday_merg = array_intersect($sundayComp2,$feb);
                   $feb_sat_2nd_merg = array_intersect($sat_2nd_2,$jan);
                   $feb_sat_4th_merg = array_intersect($sat_4th_2,$jan);
                   $sunday2 = count(array_merge($feb_sunday_merg,$feb_sat_2nd_merg,$feb_sat_4th_merg));
                   echo $sunday2;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">March</td>
                 <td><?php echo $march1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date3 = "01-03-".$year;//day-month-year
                   $start_time3 = strtotime($start_date3);
                   $end_time3 = strtotime("+1 month", $start_time3);
                   for($i=$start_time3; $i<$end_time3; $i+=86400)
                   {
                      $list3[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp3 = array();
                   $sat_2nd_3 = array();
                   $sat_4th_3 = array();
                   $sat_count_3 = 0;
                   if(count($march)!=0){
                     $absent_date3 = $list3;
                     $f3 = $year."-03-00";
                     $fend3 = end($absent_date3);
                     $x3=$f3;

                     while($x3<$fend3)
                    {
                      $a3=strtotime($x3);
                      $b3=$a3+(24*60*60);
                      $f2_3=date("Y-m-d",$b3);
                      $day3=date("D",$b3);
                      if($day3 == "Sun")
                      {
                       $sundayComp3[] = $f2_3;
                      }
                      if($day3 == "Sat")
                      {
                        $sat_count_3++;
                        if($sat_count_3 == 2){
                          $sat_2nd_3[] = $f2_3;
                        }
                        if($sat_count_3 == 4){
                          $sat_4th_3[] = $f2_3;
                        }
                      }
                      $x3=$f2_3;
                    }
                   }
                   //**************************
                   //this part is for excludig sunday, 2nd saturday and 4th saturday of march
                   if(count($march)!=0){
                     $march_absent = array_diff($list3,$march);
                     $march_sunday_diff = array_diff($march_absent,$sundayComp3);
                     $march_sat_2nd_diff = array_diff($march_sunday_diff,$sat_2nd_3);
                     $march_ab = count(array_diff($march_sat_2nd_diff,$sat_4th_3));
                     echo $march_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   //this part is for calculating works on like sunday,2nd saturday and 4th saturday
                   $march_sunday_merg = array_intersect($sundayComp3,$march);
                   $march_sat_2nd_merg = array_intersect($sat_2nd_3,$march);
                   $march_sat_4th_merg = array_intersect($sat_4th_3,$march);
                   $sunday3 = count(array_merge($march_sunday_merg,$march_sat_2nd_merg,$march_sat_4th_merg));
                   //$sunday3 = count(array_intersect($sundayComp3,$march));
                   echo $sunday3;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">April</td>
                 <td><?php echo $april1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date4 = "01-04-".$year;//day-month-year
                   $start_time4 = strtotime($start_date4);
                   $end_time4 = strtotime("+1 month", $start_time4);
                   for($i=$start_time4; $i<$end_time4; $i+=86400)
                   {
                      $list4[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp4 = array();
                   $sat_2nd_4 = array();
                   $sat_4th_4 = array();
                   $sat_count_4 = 0;
                   if(count($april)!=0){
                     $absent_date4 = $list4;
                     $f4 = $year."-04-00";
                     $fend4 = end($absent_date4);
                     $x4=$f4;
                     while($x4<$fend4)
                    {
                      $a4=strtotime($x4);
                      $b4=$a4+(24*60*60);
                      $f2_4=date("Y-m-d",$b4);
                      $day4=date("D",$b4);
                      if($day4 == "Sun")
                      {
                       $sundayComp4[] = $f2_4;
                      }
                      if($day4 == "Sat")
                      {
                        $sat_count_4++;
                        if($sat_count_4 == 2){
                          $sat_2nd_4[] = $f2_4;
                        }
                        if($sat_count_4 == 4){
                          $sat_4th_4[] = $f2_4;
                        }
                      }
                      $x4=$f2_4;
                    }
                   }
                   //**************************
                   if(count($april)!=0){
                     $april_absent = array_diff($list4,$april);
                     $april_sunday_diff = array_diff($april_absent,$sundayComp4);
                     $april_sat_2nd_diff = array_diff($april_sunday_diff,$sat_2nd_4);
                     $april_ab = count(array_diff($april_sat_2nd_diff,$sat_4th_4));
                     echo $april_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $april_sunday_merg = array_intersect($sundayComp4,$april);
                   $april_sat_2nd_merg = array_intersect($sat_2nd_4,$april);
                   $april_sat_4th_merg = array_intersect($sat_4th_4,$april);
                   $sunday4 = count(array_merge($april_sunday_merg,$april_sat_2nd_merg,$april_sat_4th_merg));
                   echo $sunday4;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">May</td>
                 <td><?php echo $may1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date5 = "01-05-".$year;//day-month-year
                   $start_time5 = strtotime($start_date5);
                   $end_time5 = strtotime("+1 month", $start_time5);
                   for($i=$start_time5; $i<$end_time5; $i+=86400)
                   {
                      $list5[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp5 = array();
                   $sat_2nd_5 = array();
                   $sat_4th_5 = array();
                   $sat_count_5 = 0;
                   if(count($may)!=0){
                     $absent_date5 = $list5;
                     $f5 = $year."-05-00";
                     $fend5 = end($absent_date5);
                     $x5=$f5;

                     while($x5<$fend5)
                    {
                      $a5=strtotime($x5);
                      $b5=$a5+(24*60*60);
                      $f2_5=date("Y-m-d",$b5);
                      $day5=date("D",$b5);
                      if($day5 == "Sun")
                      {
                       $sundayComp5[] = $f2_5;
                      }
                      if ($day5 == "Sat")
                      {
                        $sat_count_5++;
                        if($sat_count_5 == 2){
                          $sat_2nd_5[] = $f2_5;
                        }
                        if($sat_count_5 == 4){
                          $sat_4th_5[] = $f2_5;
                        }
                      }
                      $x5=$f2_5;
                    }
                   }
                   //**************************
                   if(count($may)!=0){
                     $may_absent = array_diff($list5,$may);
                     $may_sunday_diff = array_diff($may_absent,$sundayComp5);
                     $may_sat_2nd_diff = array_diff($may_sunday_diff,$sat_2nd_5);
                     $may_ab = count(array_diff($may_sat_2nd_diff,$sat_4th_5));
                     echo $may_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $may_sunday_merg = array_intersect($sundayComp5,$may);
                   $may_sat_2nd_merg = array_intersect($sat_2nd_5,$may);
                   $may_sat_4th_merg = array_intersect($sat_4th_5,$may);
                   $sunday5 = count(array_merge($may_sunday_merg,$may_sat_2nd_merg,$may_sat_4th_merg));
                   echo $sunday5;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">June</td>
                 <td><?php echo $june1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date6 = "01-06-".$year;//day-month-year
                   $start_time6 = strtotime($start_date6);
                   $end_time6 = strtotime("+1 month", $start_time6);
                   for($i=$start_time6; $i<$end_time6; $i+=86400)
                   {
                      $list6[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp6 = array();
                   $sat_2nd_6 = array();
                   $sat_4th_6 = array();
                   $sat_count_6 = 0;
                   if(count($june)!=0){
                     $absent_date6 = $list6;
                     $f6 = $year."-06-00";
                     $fend6 = end($absent_date6);
                     $x6=$f6;

                     while($x6<$fend6)
                    {
                      $a6=strtotime($x6);
                      $b6=$a6+(24*60*60);
                      $f2_6=date("Y-m-d",$b6);
                      $day6=date("D",$b6);
                      if($day6 == "Sun")
                      {
                       $sundayComp6[] = $f2_6;
                      }
                      if ($day6 == "Sat")
                      {
                        $sat_count_6++;
                        if($sat_count_6 == 2){
                          $sat_2nd_6[] = $f2_6;
                        }
                        if($sat_count_6 == 4){
                          $sat_4th_6[] = $f2_6;
                        }
                      }
                      $x6=$f2_6;
                    }
                   }
                   //**************************
                   if(count($june)!=0){
                     $june_absent = array_diff($list6,$june);
                     $june_sunday_diff = array_diff($june_absent,$sundayComp6);
                     $june_sat_2nd_diff = array_diff($june_sunday_diff,$sat_2nd_6);
                     $june_ab = count(array_diff($june_sat_2nd_diff,$sat_4th_6));
                     echo $june_ab;//$june_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $june_sunday_merg = array_intersect($sundayComp6,$june);
                   $june_sat_2nd_merg = array_intersect($sat_2nd_6,$june);
                   $june_sat_4th_merg = array_intersect($sat_4th_6,$june);
                   $sunday6 = count(array_merge($june_sunday_merg,$june_sat_2nd_merg,$june_sat_4th_merg));
                   echo $sunday6;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">July</td>
                 <td><?php echo  $july1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date7 = "01-07-".$year;//day-month-year
                   $start_time7 = strtotime($start_date7);
                   $end_time7 = strtotime("+1 month", $start_time7);
                   for($i=$start_time7; $i<$end_time7; $i+=86400)
                   {
                      $list7[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp7 = array();
                   $sat_2nd_7 = array();
                   $sat_4th_7 = array();
                   $sat_count_7 = 0;
                   if(count($may)!=0){
                     $absent_date7 = $list7;
                     $f7 = $year."-07-00";
                     $fend7 = end($absent_date7);
                     $x7=$f7;

                     while($x7<$fend7)
                    {
                      $a7=strtotime($x7);
                      $b7=$a7+(24*60*60);
                      $f2_7=date("Y-m-d",$b7);
                      $day7=date("D",$b7);
                      if($day7 == "Sun")
                      {
                       $sundayComp7[] = $f2_7;
                      }
                      if ($day7 == "Sat")
                      {
                        $sat_count_7++;
                        if($sat_count_7 == 2){
                          $sat_2nd_7[] = $f2_7;
                        }
                        if($sat_count_5 == 4){
                          $sat_4th_7[] = $f2_7;
                        }
                      }
                      $x7=$f2_7;
                    }
                   }
                   //**************************
                   if(count($july)!=0){
                     $july_absent = array_diff($list7,$july);
                     $july_sunday_diff = array_diff($july_absent,$sundayComp7);
                     $july_sat_2nd_diff = array_diff($july_sunday_diff,$sat_2nd_7);
                     $july_ab = count(array_diff($july_sat_2nd_diff,$sat_4th_7));
                     echo $july_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $july_sunday_merg = array_intersect($sundayComp7,$july);
                   $july_sat_2nd_merg = array_intersect($sat_2nd_7,$july);
                   $july_sat_4th_merg = array_intersect($sat_4th_7,$july);
                   $sunday7 = count(array_merge($july_sunday_merg,$july_sat_2nd_merg,$july_sat_4th_merg));
                   echo $sunday7;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">August</td>
                 <td><?php echo $august1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date8 = "01-08-".$year;//day-month-year
                   $start_time8 = strtotime($start_date8);
                   $end_time8 = strtotime("+1 month", $start_time8);
                   for($i=$start_time8; $i<$end_time8; $i+=86400)
                   {
                      $list8[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp8 = array();
                   $sat_2nd_8 = array();
                   $sat_4th_8 = array();
                   $sat_count_8 = 0;
                   if(count($august)!=0){
                     $absent_date8 = $list8;
                     $f8 = $year."-08-00";
                     $fend8 = end($absent_date8);
                     $x8=$f8;

                     while($x8<$fend8)
                    {
                      $a8=strtotime($x8);
                      $b8=$a8+(24*60*60);
                      $f2_8=date("Y-m-d",$b8);
                      $day8=date("D",$b8);
                      if($day8 == "Sun")
                      {
                       $sundayComp8[] = $f2_8;
                      }
                      if ($day8 == "Sat")
                      {
                        $sat_count_8++;
                        if($sat_count_8 == 2){
                          $sat_2nd_8[] = $f2_8;
                        }
                        if($sat_count_8 == 4){
                          $sat_4th_8[] = $f2_8;
                        }
                      }
                      $x8=$f2_8;
                    }
                   }
                   //**************************
                   if(count($august)!=0){
                     $august_absent = array_diff($list8,$august);
                     $august_sunday_diff = array_diff($august_absent,$sundayComp8);
                     $august_sat_2nd_diff = array_diff($august_sunday_diff,$sat_2nd_8);
                     $august_ab = count(array_diff($august_sat_2nd_diff,$sat_4th_8));
                     echo $august_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $august_sunday_merg = array_intersect($sundayComp8,$august);
                   $august_sat_2nd_merg = array_intersect($sat_2nd_8,$august);
                   $august_sat_4th_merg = array_intersect($sat_4th_8,$august);
                   $sunday8 = count(array_merge($august_sunday_merg,$august_sat_2nd_merg,$august_sat_4th_merg));
                   echo $sunday8;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">September</td>
                 <td><?php echo $september1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date9 = "01-09-".$year;//day-month-year
                   $start_time9 = strtotime($start_date9);
                   $end_time9 = strtotime("+1 month", $start_time9);
                   for($i=$start_time9; $i<$end_time9; $i+=86400)
                   {
                      $list9[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp9 = array();
                   $sat_2nd_9 = array();
                   $sat_4th_9 = array();
                   $sat_count_9 = 0;
                   if(count($september)!=0){
                     $absent_date9 = $list9;
                     $f9 = $year."-09-00";
                     $fend9 = end($absent_date9);
                     $x9=$f9;

                     while($x9<$fend9)
                    {
                      $a9=strtotime($x9);
                      $b9=$a9+(24*60*60);
                      $f2_9=date("Y-m-d",$b9);
                      $day9=date("D",$b9);
                      if($day9 == "Sun")
                      {
                       $sundayComp9[] = $f2_9;
                      }
                      if ($day9 == "Sat")
                      {
                        $sat_count_9++;
                        if($sat_count_9 == 2){
                          $sat_2nd_9[] = $f2_9;
                        }
                        if($sat_count_9 == 4){
                          $sat_4th_9[] = $f2_9;
                        }
                      }
                      $x9=$f2_9;
                    }
                   }
                   //**************************
                   if(count($september)!=0){
                     $september_absent = array_diff($list9,$september);
                     $september_sunday_diff = array_diff($september_absent,$sundayComp9);
                     $september_sat_2nd_diff = array_diff($september_sunday_diff,$sat_2nd_9);
                     $september_ab = count(array_diff($september_sat_2nd_diff,$sat_4th_9));
                     echo $september_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $september_sunday_merg = array_intersect($sundayComp9,$september);
                   $september_sat_2nd_merg = array_intersect($sat_2nd_9,$september);
                   $september_sat_4th_merg = array_intersect($sat_4th_9,$september);
                   $sunday9 = count(array_merge($september_sunday_merg,$september_sat_2nd_merg,$september_sat_4th_merg));
                   echo $sunday9;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">October</td>
                 <td><?php echo $october1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date10 = "01-10-".$year;//day-month-year
                   $start_time10 = strtotime($start_date10);
                   $end_time10 = strtotime("+1 month", $start_time10);
                   for($i=$start_time10; $i<$end_time10; $i+=86400)
                   {
                      $list10[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp10 = array();
                   $sat_2nd_10 = array();
                   $sat_4th_10 = array();
                   $sat_count_10 = 0;
                   if(count($october)!=0){
                     $absent_date10 = $list10;
                     $f10 = $year."-10-00";
                     $fend10 = end($absent_date10);
                     $x10=$f10;

                     while($x10<$fend10)
                    {
                      $a10=strtotime($x10);
                      $b10=$a10+100000;//this value is only valid for october
                      $f2_10=date("Y-m-d",$b10);
                      $day10=date("D",$b10);
                      if($day10 == "Sun")
                      {
                       $sundayComp10[] = $f2_10;
                      }
                      if ($day10 == "Sat")
                      {
                        $sat_count_10++;
                        if($sat_count_10 == 2){
                          $sat_2nd_10[] = $f2_10;
                        }
                        if($sat_count_10 == 4){
                          $sat_4th_10[] = $f2_10;
                        }
                      }
                      $x10=$f2_10;
                    }
                   }
                   //**************************
                   if(count($october)!=0){
                     $october_absent = array_diff($list10,$october);
                     $october_sunday_diff = array_diff($october_absent,$sundayComp10);
                     $october_sat_2nd_diff = array_diff($october_sunday_diff,$sat_2nd_10);
                     $october_ab = count(array_diff($october_sat_2nd_diff,$sat_4th_10));
                     echo $october_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $october_sunday_merg = array_intersect($sundayComp10,$october);
                   $october_sat_2nd_merg = array_intersect($sat_2nd_10,$october);
                   $october_sat_4th_merg = array_intersect($sat_4th_10,$october);
                   $sunday10 = count(array_merge($october_sunday_merg,$october_sat_2nd_merg,$october_sat_4th_merg));
                   echo $sunday10;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">November</td>
                 <td><?php echo $november1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date11 = "01-11-".$year;//day-month-year
                   $start_time11 = strtotime($start_date11);
                   $end_time11 = strtotime("+1 month", $start_time11);
                   for($i=$start_time11; $i<$end_time11; $i+=86400)
                   {
                      $list11[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp11 = array();
                   $sat_2nd_11 = array();
                   $sat_4th_11 = array();
                   $sat_count_11 = 0;
                   if(count($november)!=0){
                     $absent_date11 = $list11;
                     $f11 = $year."-11-00";
                     $fend11 = end($absent_date11);
                     $x11=$f11;

                     while($x11<$fend11)
                    {
                      $a11=strtotime($x11);
                      $b11=$a11+(24*60*60);
                      $f2_11=date("Y-m-d",$b11);
                      $day11=date("D",$b11);
                      if($day11 == "Sun")
                      {
                       $sundayComp11[] = $f2_11;
                      }
                      if ($day11 == "Sat")
                      {
                        $sat_count_11++;
                        if($sat_count_11 == 2){
                          $sat_2nd_11[] = $f2_11;
                        }
                        if($sat_count_11 == 4){
                          $sat_4th_11[] = $f2_11;
                        }
                      }
                      $x11=$f2_11;
                    }
                   }
                   //**************************
                   if(count($november)!=0){
                     $november_absent = array_diff($list11,$november);
                     $november_sunday_diff = array_diff($november_absent,$sundayComp11);
                     $november_sat_2nd_diff = array_diff($november_sunday_diff,$sat_2nd_11);
                     $november_ab = count(array_diff($november_sat_2nd_diff,$sat_4th_11));
                     echo $november_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $november_sunday_merg = array_intersect($sundayComp11,$november);
                   $november_sat_2nd_merg = array_intersect($sat_2nd_11,$november);
                   $november_sat_4th_merg = array_intersect($sat_4th_11,$november);
                   $sunday11 = count(array_merge($november_sunday_merg,$november_sat_2nd_merg,$november_sat_4th_merg));
                   echo $sunday11;
                   ?>
                 </td>
              </tr>
              <tr>
                 <td style="font-size: 18px; font-weight: bold;">December</td>
                 <td><?php echo $december1; ?></td>
                 <td>
                   <?php
                   //for calculating date for particular month
                   $start_date12 = "01-12-".$year;//day-month-year
                   $start_time12 = strtotime($start_date12);
                   $end_time12 = strtotime("+1 month", $start_time12);
                   for($i=$start_time12; $i<$end_time12; $i+=86400)
                   {
                      $list12[] = date('Y-m-d', $i);
                   }
                   //Holiday Calculations************
                   $sundayComp12 = array();
                   $sat_2nd_12 = array();
                   $sat_4th_12 = array();
                   $sat_count_12 = 0;
                   if(count($december)!=0){
                     $absent_date12 = $list12;
                     $f12 = $year."-12-00";
                     $fend12 = end($absent_date12);
                     $x12=$f12;

                     while($x12<$fend12)
                    {
                      $a12=strtotime($x12);
                      $b12=$a12+(24*60*60);
                      $f2_12=date("Y-m-d",$b12);
                      $day12=date("D",$b12);
                      if($day12 == "Sun")
                      {
                       $sundayComp12[] = $f2_12;
                      }
                      if ($day12 == "Sat")
                      {
                        $sat_count_12++;
                        if($sat_count_12 == 2){
                          $sat_2nd_12[] = $f2_12;
                        }
                        if($sat_count_12 == 4){
                          $sat_4th_12[] = $f2_12;
                        }
                      }
                      $x12=$f2_12;
                    }
                   }
                   //**************************
                   if(count($december)!=0){
                     $december_absent = array_diff($list12,$december);
                     $december_sunday_diff = array_diff($december_absent,$sundayComp12);
                     $december_sat_2nd_diff = array_diff($december_sunday_diff,$sat_2nd_12);
                     $december_ab = count(array_diff($december_sat_2nd_diff,$sat_4th_12));
                     echo $december_ab;
                   }
                   else{
                     echo "0";
                   }
                    ?>
                 </td>
                 <td>
                   <?php
                   $december_sunday_merg = array_intersect($sundayComp12,$december);
                   $december_sat_2nd_merg = array_intersect($sat_2nd_12,$december);
                   $december_sat_4th_merg = array_intersect($sat_4th_12,$december);
                   $sunday12 = count(array_merge($december_sunday_merg,$december_sat_2nd_merg,$december_sat_4th_merg));
                   echo $sunday12;
                   ?>
                 </td>
              </tr>
           </tbody>
           <tfoot style="background-color: darkgrey;">
              <tr>
                 <td></td>
                 <td><strong>Total Present:<?php echo " ".$totalPresent; ?></strong></td>
                 <td><strong>Total Absent:
                   <?php
                     $total_absent = $jan_ab+$feb_ab+$march_ab+$april_ab+$may_ab+$june_ab+$july_ab+$august_ab+$september_ab+$october_ab+$november_ab+$december_ab;
                     echo " ".$total_absent;
                    ?>
                 </strong></td>
                 <td><strong>Total Wokrs on Holiday:
                   <?php $total_work_on_holidays = $sunday1+$sunday2+$sunday3+$sunday4+$sunday5+$sunday6+$sunday7+$sunday8+$sunday9+$sunday10+$sunday11+$sunday12;
                     echo " ".$total_work_on_holidays;
                    ?>
                 </strong></td>
              </tr>
           </tfoot>
        </table>
     </form>
  </div>
</div>
<?php }
mysqli_close($con);
 ?>
