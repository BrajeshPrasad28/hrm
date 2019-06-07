<?php
session_start();
error_reporting(0);
echo $_SESSION['User'];
$a = $_SESSION['User'];
if(isset($a))
{

}
else {
  header('location: index.php');
}
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <a href="logout.php"><input type="submit" class="btnSubmit" name="login" value="Login" /></a>
   </body>
 </html>
