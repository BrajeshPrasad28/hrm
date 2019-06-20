<?php
include('dbconnection.php');
$q = "SELECT * from noticeboard where status='Active'";
$query = mysqli_query($con,$q);
$counter=1;
if($query){
  while($result = mysqli_fetch_array($query)){
  ?>
  <tr>
    <td><?php echo $counter++; ?></td>
    <td><?php echo $result['date'] ?></td>
    <td><?php echo $result['title'] ?></td>
    <td><?php echo $result['message'] ?></td>
    <td style="color: green;"><?php echo $result['status'] ?></td>
  </tr>
  <?php
    }
  }
  else{
    echo "0";
  }
  mysqli_close($con);
?>
