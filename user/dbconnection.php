<?php
   $con=($GLOBAL["__mysqli_ston"]=mysqli_connect('localhost','root','','hrm'));
    if(!$con)
     {
        die("Please check your connection".mysqli_error());
     }
    $db_selected=mysqli_select_db($con,'hrm');
    if (!$db_selected)
     {
        die("db selection error!".mysqli_error());
     }
?>
