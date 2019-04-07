<?php
  session_start();
  unset($_SESSION['emp_id']);
  session_destroy();
  header("location: login_or_attendance.php");
 ?>
