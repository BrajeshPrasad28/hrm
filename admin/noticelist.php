<?php
 require_once('dbconnection.php');
 require("admin_detail.php");
 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="05"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="images/png" href="../images/test.svg.png">

    <title>Noticeboard list</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/adminstyle.css">
    <!--Style for noticeboard-->
    <link rel="stylesheet" href="css/adminstyle2.css">

   <!-- Css for Tables -->
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- style is here -->
    <style media="screen">
    select:hover{
    box-shadow: 4px 1px 20px lightblue;
    border-radius: 5px;
    }
     select{
    border-radius: 5px;
     }
     input:hover{
     box-shadow: 4px 1px 20px lightblue;
     border-radius: 5px;
     }
      input{
     border-radius: 5px;
      }
    </style>

    <!-- ends here -->

  </head>

  <body>

    <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
             <li class="active"> <a href="#"><i class="fa fa-list"></i>&nbsp; Notice History</a></li>
             <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->

    <!-- update page content starts here -->

          <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
            <header>
              <h2 style="color: teal; text-align: center;">Notice History</h2>
            </header>
            <div class="content-inner">
              <table id="noticelist" class="table table-stripped table-hover table-bordered">
                <thead class="table-dark" style="color: white; font-weight: bold;">
                  <!-- <th>Id</th> -->
                  <th>Date</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th class="text-center">Action</th>
                </thead>
                <tbody>
              <?php
                    $query = mysqli_query($con, "SELECT * FROM noticeboard");
                    while ($a = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                      <td><?php echo $a['date'];?></td>
                      <td><?php echo $a['title']; ?></td>
                      <td><?php echo $a['message']; ?></td>
                      <?php
                      if($a['status']== 'Active'){
                        ?>
                        <td style='color: green'><?php echo $a['status']; ?></td>
                        <?php
                      }
                      else {?>
                         <td Style='color: grey'><?php echo $a['status']; ?></td>
                        <?php
                      }?>
                    <td>
                      <input type="button" data-id="<?php echo $a['id'] ?>" style='margin:0px 5px; display:inline-block;' class="btn btn-danger btn-sm disable_btn" value="Disable">
                    </td>
                   </tr>
                    <?php
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
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script>
   $(document).on('click', '.disable_btn', function() {
       var id = $(this).data("id");
       if (confirm("Are you sure you want to delete?")) {
           $.ajax({
               url: "notice_disable.php",
               type: "POST",
               data: {
                   id: id
               },
               dataType: "text",
               success: function(data) {
                   alert(data);
                   location.reload();
               }

           });
       }
       return false;
   });
</script>
<script type="text/javascript">
$(document).ready(function() {
  $('#noticelist').DataTable();
} );
</script>
</body>
</html>
