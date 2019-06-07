<?php
include('dbconnection.php');
session_start();
$emp_id = $_SESSION['User'];
echo $emp_id;
$month = $_POST['month'];
$year = $_POST['year'];
$sdate = $year.'-'.$month.'-01';//"2019"."-"."04"."-"."01";//$year.'-'.$month.'-01';
$edate = $year.'-'.$month.'-31';//"2019"."-"."04"."-"."31";//$year.'-'.$month.'-31';
$temp="CLA589607143";
 if(isset($_POST['month']))
  {

      $sql = "SELECT DISTINCT date FROM attendance WHERE  date BETWEEN '$sdate' AND '$edate' AND emp_id='$temp'";
      $result = mysqli_query($con,$sql);
      while($row = mysqli_fetch_array($result))
      {
        //echo $row['date'];
        ?>
        <tr>
          <td><?php $row['date'];?></td>
        </tr>
        <?php
       }
       if($row){
         echo ("error: ".mysqli_error());
       }
       //mysqli_close($con);
   }
 ?>
