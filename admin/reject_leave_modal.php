<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <!-- Reject -->
    <?php
         require_once('dbconnection.php');
         $emp_id = $_POST['id'];
     ?>
       <div  id='Show'>

       </div>
         <div class="row ml-3">
           <textarea name="remark" id='remark' placeholder="Write something.." maxlength="500" required></textarea>
         </div>
         <div class="row ml-3 mt-2">
           <button class="btn btn-primary reject_btn" name="<?php echo $_POST['postingdate']; ?>" id='<?php echo $emp_id; ?>'>Confirm </button>
         </div>
       <!-- Jquery For table -->
       <script src="../js/jquery-3.3.1.min.js"></script>
    <script>
    $(document).on('click', '.reject_btn', function() {
        var id = $(this).attr("id");
        var remark = $('#remark').val();
        var postingdate = $(this).attr("name");
       if(remark!=''){
          $.ajax({
              url: "reject_leave_modal_process.php",
              method: "POST",
              data: {
                  id: id,
                  postingdate: postingdate,
                  remark: remark
              },
              success: function(data) {
                  $('#Show').html(data);
              }
          });
        }else {
          alert("Remarks Required for Cancellation reason");
        }

    });
    </script>

  </body>
</html>
