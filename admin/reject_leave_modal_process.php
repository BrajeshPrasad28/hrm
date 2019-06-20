<?php
require_once('dbconnection.php');
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');
$emp_id = $_POST['id'];
$posting_date = $_POST['postingdate'];
$remarks = $_POST['remark'];
$sql = mysqli_query($con,"UPDATE emp_leave SET status='2', apprv_or_rejct_date='$date',remarks = '$remarks' WHERE emp_id ='$emp_id' AND posting_date='$posting_date' AND status = '0'");
if($sql){
?>
<div id='success' class="alert " role="alert">
<h5 style="color: green; text-align: center;">Rejected successfully</h5>
</div>
<?php
}else{?>
<div id='success' class="alert" role="alert">
<h5 style="color: green; text-align: center;">Rejection Unsuccessful!!!</h5>
</div>
<?php
}
?>
