<?php
include 'dbconnection.php';
require("admin_detail.php");
if(isset($_POST['dname'])){
  $designation = $_POST['dname'];
  $job_type = $_POST['job_type'];
  $basic = $_POST['basic'];
  $hra = $_POST['hra'];
  $da = $_POST['da'];
  $id = $_POST['id'];
  $query = mysqli_query($con,"UPDATE salary SET designation='$designation', job_type='$job_type',basic='$basic',hra='$hra',da='$da' where salary_id='$id'");
  if($query){
    ?>
    <center><h4 style="color: green;">Updated Successfully</h4></center>
    <?php
  }else {
    ?>
    <center><h4 style="color: red;">Couldn't updated</h4></center>
    <?php
  }
}
 ?>
