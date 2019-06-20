<?php
	include 'dbconnection.php';
  $emp_id = $_POST['emp_id'];
	$leavetype = $_POST['leavetype'];
	$from_date = $_POST['value_from_start_date'];
	$to_date = $_POST['value_from_end_date'];
	$description = $_POST['description'];
  $date = $_POST['date'];
  $status = $_POST['status'];
	$apprv_or_rejct_date = '0';
	$date1=0;
	$query = mysqli_query($con,"SELECT posting_date from emp_leave where emp_id='$emp_id'");
	while($row=mysqli_fetch_array($query)){
		$date1 = $row['posting_date'];
	}
	if(($date == $date1)||$row>0){
		?>
		<div class="alert alert-danger">
			Only one Leave is applicable in a day...!!!
		</div>
		<?php
	}else {
		$sql = "INSERT INTO emp_leave(emp_id,leave_id,posting_date,from_date,to_date,leave_description,status,apprv_or_rejct_date)	VALUES ('$emp_id','$leavetype','$date','$from_date','$to_date','$description','$status','$apprv_or_rejct_date')";
		if (mysqli_query($con, $sql)) {
			//echo json_encode(array("statusCode"=>200));
			?>
			<div class="alert alert-success">
				Leave has been applied Successfully...!!!
			</div>
			<?php
		}
		else {
			?>
			<div class="alert alert-danger">
				Cound not appy try Again...!!!
			</div>
			<?php
			//echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($con);
	}

?>
