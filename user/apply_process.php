<?php
	include 'DBconnection.php';
  $emp_id = $_POST['emp_id'];echo $emp_id;
	$leavetype = $_POST['leavetype'];
	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$description = $_POST['description'];
  $date = $_POST['date'];
  $status = $_POST['status'];
	$apprv_or_rejct_date = '0';
	$sql = "INSERT INTO emp_leave(emp_id,leave_id,posting_date,from_date,to_date,leave_description,status,apprv_or_rejct_date)	VALUES ('$emp_id','$leavetype','$date','$from_date','$to_date','$description','$status','$apprv_or_rejct_date')";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode"=>200));
	}
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($con);
?>
