<?php
include 'dbconnection.php';
include "admin_detail.php";
if(isset($_POST['ide'])){

  $emp_id = $_POST['ide'];
  $job_type = $_POST['job_type'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $d_id = $_POST['d_name'];
  $schedule_id = $_POST['schedule_id'];
  $member = $_POST['member'];
  $password = hash('gost',md5($_POST["pass"]));
 $sql = mysqli_query($con,"UPDATE employees SET job_type='$job_type',first_name='$first_name',last_name='$last_name',dob='$dob',gender='$gender',address='$address',phone='$contact',email='$email',d_name='$d_id',schedule_id='$schedule_id',created_on='$member',password='$password' WHERE emp_id='$emp_id'");

 if($sql){
    ?>
    <center><h4 style="color: green;">Updated Successfully</h4></center>
    <?php
  }else {
    ?>
    <center><h4 style="color: red;">Couldn't updated</h4></center>
    <?php
 }
//  echo $_POST['ide']." ".$_POST['job_type']." ".$_POST['first_name']." ".$_POST['last_name']." ".$_POST['dob']." ".$_POST['gender']." ".$_POST['address']." ".$_POST['contact']." ".$_POST['email']." ".$_POST['d_name']." ".$_POST['schedule_id']." ".$member." ".$password;
//  $sql = mysqli_query($con,"");
}
 ?>
