<?php
	include 'dbconnection.php';
  $username = $_POST['username'];
  $current_pass = hash('gost',md5($_POST["current_pass"]));
	$confirm_new_pass = hash('gost',md5($_POST["confirm_new_pass"]));

	$query = mysqli_query($con,"SELECT * from employees where emp_id='$username' and role='admin'");
  $tot = mysqli_num_rows($query);
  while($row=mysqli_fetch_array($query)){
		$password = $row['password'];
	}
	if($current_pass!=$password){
	?>
  <div class="alert alert-danger alert-dismissible">
    Current Passwrod is incorrect..!!!
 </div>
  <?php
	}else {
    $sql = mysqli_query($con,"UPDATE employees SET password='$confirm_new_pass' where emp_id='$username' and role='admin'");
    if($sql){
      ?>
      <div class="alert alert-success alert-dismissible">
        Password Successfully changed
      </div>
      <?php
    }else {
      ?>
      <div class="alert alert-danger alert-dismissible">
        Couldn't change the passwrod..!!!
      </div>
      <?php
    }
	}

?>
