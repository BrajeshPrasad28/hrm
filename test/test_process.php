<?php

$con = mysqli_connect("localhost","root","Root@101#Ok","hrm");
$query = mysqli_query($con,"SELECT date FROM attendance");

while($row = mysqli_fetch_assoc($query))
{
 ?>
 <tr>
   <td><?php echo $row['date'] ?></td>
 </tr>
 <?php
}

 ?>
