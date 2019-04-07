<?php
 require_once('dbconnection.php');

 require("admin_detail.php");

 if(isset($_POST['disable'])){
   $id = $_POST['id'];
    $query = mysqli_query($con,"UPDATE noticeboard SET status='disable' WHERE id = '$id'");
    if($query){
        echo "<script> alert('Successfully Updated')</script>";
    }else{
      echo "Not Updated, reason: ".mysqli_error($con);
    }
  }

  if(isset($_POST['delete'])){
    $id = $_POST['id'];
     $query = mysqli_query($con,"DELETE FROM noticeboard WHERE id = '$id' AND status='disable'");
     if($query){
         echo "<script> alert('Successfully Updated')</script>";
     }else{
       echo "Not Updated, reason: ".mysqli_error($con);
     }
   }

 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="05"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

    <title>Noticeboard</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/adminstyle.css">
    <!--Style for noticeboard-->
    <link rel="stylesheet" href="css/adminstyle2.css">

   <!-- Css for Tables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Table Heeader Style-->
    <style>
      tr:hover{
        background-color: #1C2833;
      }
      select:hover{
         box-shadow:4px 1px 20px lightblue;
         border-radius: 5px;
      }
      select{
        border-radius: 5px;
      }
      input:hover{
         box-shadow:4px 1px 20px lightblue;
         border-radius: 5px;
      }
      input{
        border-radius: 5px;
      }
    </style>

  </head>

  <body>

    <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>

    <!-- update page content starts here -->

          <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
            <header>
              <h2 class="page_title">Requested Notice</h2>
            </header>
            <div class="content-inner">
              <table id="noticelist" class="table table-stripped table-hover table-bordered">
                <thead class="table-dark">
                  <!-- <th>Id</th> -->
                  <th>Leave Type</th>
                  <th>From Date</th>
                  <th>To Date</th>
                  <th>Description</th>
                  <th class="text-center">Action</th>
                </thead>
                <tbody>
              <?php
                    $query = mysqli_query($con, "SELECT * FROM noticeboard");
//                    $query = mysqli_query($con, "SELECT * FROM noticeboard where status='active'");

                    while ($a = mysqli_fetch_array($query)) {
                    echo "<tr>";
                    // echo "<td>".$a['id']."</td>";
                    echo "<td>".$a['date']."</td>";
                    echo "<td>".$a['title']."</td>";
                    echo "<td>".$a['message']."</td>";
                    if($a['status'] == 'Active'){
                      echo "<td style='color: green'>".$a['status']."</td>";
                    }
                    else {
                      echo "<td style='color: grey'>".$a['status']."</td>";
                    }

                    echo "<td> <form method='post' style='display: inline-block;'> <input type='hidden' name='id' value='".$a['id']."' > <button type='submit' name='disable' style='margin:0px 5px; display:inline-block; float:left;width: 94px;' class='btn btn-secondary'>Approve</button>  </form>  <form  style='display: inline-block;' method='post'>  <input type='hidden' name='id' value='".$a['id']."' > <button  type='submit' name='delete'  style='margin:0px 5px; display:inline-block;  float:left;width: 94px;' class='btn btn-danger'>Reject</button>  </form> </td>";
                    echo "  </tr>";
                    }
                ?>
                </tbody>
              </table>
            </div>
          </div>
        <!-- this two divs are belongs to include sidebar_navbar page -->
      </div>
      </div>

<!-- Jquery For table -->
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#noticelist').DataTable();
} );
</script>
</body>
</html>
