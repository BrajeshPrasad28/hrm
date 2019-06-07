<?php
  include('DBconnection.php');
$q = "select * from noticeboard where status='Active'";
$query = mysqli_query($conn,$q);
if($query){
  while($result = mysqli_fetch_array($query)){
  ?>
  <tr>
  <td><?php echo $result['date'] ?></td>
  <td><?php echo $result['title'] ?></td>
  <td><?php echo $result['message'] ?></td>
  <td style="color: green;"><?php echo $result['status'] ?></td>
  </tr>
  <?php
    }
  }
?>
