<?php

$con = mysqli_connect("localhost","root","Root@101#Ok","hrm");
$query = mysqli_query($con,"SELECT date FROM attendance");
$data = array();
while($row = mysqli_fetch_assoc($query))
{
  $data[] = $row;
}
echo json_encode($data);
 ?>
