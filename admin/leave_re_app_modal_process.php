<!-- Approve -->
<?php
    require_once('dbconnection.php');
    date_default_timezone_set('Asia/Kolkata');
    $emp_id = $_POST['id'];
    $posting_date = $_POST['postingdate'];
    $date = date('Y-m-d');
    $remarks = $_POST['remark'];
     $sql = mysqli_query($con,"UPDATE emp_leave SET status='1', apprv_or_rejct_date='$date',remarks='$remarks' WHERE emp_id ='$emp_id' AND posting_date='$posting_date' AND status = '2'");
     if($sql){
    ?>
<div id='success' class="alert alert-success" role="alert">
   <h5 style="color: green; text-align: center;">Re-approve successfully</h5>
</div>
<?php
   }else{?>
<div id='success' class="alert alert-success" role="alert">
   <h5 style="color: green; text-align: center;">Re-approve Unsuccessful!!!</h5>
</div>
<?php
   }
   ?>
<!-- /Approve -->
