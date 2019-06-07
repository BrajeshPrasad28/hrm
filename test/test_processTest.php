<?php

$con = mysqli_connect("localhost","root","Root@101#Ok","hrm");
$query = mysqli_query($con,"SELECT COUNT(emp_id) FROM attendance");
$row = mysqli_fetch_array($query);
?>
<tr>
  <td><?php echo "$row[0]" ?></td>
</tr>
<?php
 ?>
