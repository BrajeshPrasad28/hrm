<?php
   $con=mysqli_connect('localhost','root','','hrm');
    if(!$con)
     {
        die("dbconnection error".mysqli_error());
     }
    // $db_selected=mysqli_select_db($con,'bbms');
    // if (!$db_selected)
    //  {
    //     die("db selection error!".mysqli_error());
    //  }
?>
