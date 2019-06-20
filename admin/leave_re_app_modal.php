<!-- Reject -->
<?php
     require_once('dbconnection.php');
     $emp_id = $_POST['id'];
     $posting_date = $_POST['postingdate'];
 ?>
   <div  id='Show'>

   </div>
     <input type="hidden" name="postingdate" id='postingdate' value="<?php echo $posting_date; ?>">
     <div class="row ml-3">
       <textarea name="remark" id='remark' placeholder="Write something.." maxlength="500" required></textarea>
     </div>
     <div class="row ml-3 mt-2">
       <button class="btn btn-primary approve_btn" name="submit" id='<?php echo $emp_id; ?>'>Confirm </button>
     </div>
   <!-- Jquery For table -->
   <script src="../js/jquery-3.3.1.min.js"></script>
<script>
$(document).on('click', '.approve_btn', function() {
    var id = $(this).attr("id");
    var remark = $('#remark').val();
    var postingdate = $('#postingdate').val();
    if(remark!=''){
      $.ajax({
          url: "leave_re_app_modal_process.php",
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
