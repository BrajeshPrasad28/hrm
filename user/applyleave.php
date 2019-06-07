<?php
   include 'DBconnection.php';
   include 'sidebar_and_header.php';
   $emp_id=$_SESSION['User'];
   date_default_timezone_set('Asia/Kolkata');
   $date = date('Y-m-d');
   ?>
<div class="cssmenu">
   <ul>
      <li class="active"><a href="#">Apply Leave</a></li>
      <li><a href="#">Leave</a></li>
      <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
   </ul>
</div>
<div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
   <form id="leaveform" method="post" name="leaveform">
     <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
   	  <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
   	</div>
      <div class="row">
         <div class=" ml-5" id='1'>
            <div class="row ml-3 mt-3">
               <div>
                  <label for="leave">Leave Type</label>
               </div>
               <?php
                  //query for retrieving employee's gender
                  $sql = "SELECT gender FROM employees WHERE  emp_id='$emp_id'";
                  $result = mysqli_query($con,$sql);
                  while($row = mysqli_fetch_array($result)){
                    $gender = $row['gender'];
                  }
                  //query for retrieving leave type
                  if($gender=='Male'){
                     $sql1 = "SELECT leave_id,leave_type, leave_balance FROM leave_details where eligible_for='MF'";
                  }
                  elseif($gender=='Female'){
                     $sql1 = "SELECT * FROM leave_details";
                  }
                  $result1 = mysqli_query($con,$sql1);

                   ?>
               <div class="ml-5" style="width: 60%;">
                  <select name="leavetype" id="leavetype" style="background-color: white;border-top: none;border-left: none; border-right: none;">
                     <option value="" selected disabled hidden>Select Leave Type</option>
                     <?php
                        while($row1 = mysqli_fetch_array($result1)){
                        ?>
                     <option value="<?php echo $row1['leave_id']; ?>"><?php echo $row1['leave_type']; ?></option>
                     <?php
                        }
                        ?>
                  </select>
               </div>
            </div>
            <div class="row ml-3 mt-3">
               <div>
                  <label for="fdate">From Date</label>
               </div>
               <div class="ml-5">
                  <input type="date" id="from_date" name="from_date" style="width: auto; border-radius: 0; border: 1px solid #ccc; float: left; margin: 0; padding: 0; border-top: 0px;border-left: 0px; border-right: 0px;">
               </div>
               <div class="ml-5">
                  <label for="todate">To Date</label>
               </div>
               <div class="ml-5">
                  <input type="date" id="to_date" name="to_date" style="width: auto; border-radius: 0; border: 1px solid #ccc;  float: left; margin: 0; padding: 0; border-top: 0px;border-left: 0px; border-right: 0px;">
               </div>
            </div>
            <div class="row ml-3 mt-3">
               <div class="">
                  <label for="description">Description</label>
               </div>
               <div class="ml-5" style="width: 60%;">
                  <textarea id="description" name="description" placeholder="Write something.." style="height:55px;width: auto;"></textarea>
               </div>
            </div>
           <input type="hidden" name="date" id='date' value="<?php echo $date;?>">
           <input type="hidden" name="status" id='status' value="0">
           <input type="hidden" name="emp_id" id='emp_id' value="<?php echo $emp_id; ?>">
            <div class="row" style="padding: 30px;">
               <input type="button" name="save" class="btn btn-success" value="Apply" id="butsave">
            </div>
         </div>
         <div style="width: 10%;"></div>
         <div class="ml-5 mt-3 mb-4" id='2'>
            <h3>Leave Balance</h3>
            <table class="table table-bordered">
               <thead>
                  <th>Leave Name</th>
                  <th>Balance</th>
               </thead>
               <?php
               // this part is calculation of leave balance of employee
               $sql3 = "SELECT * FROM emp_leave where emp_id='$emp_id' and status='1'";
               $result3 = mysqli_query($con,$sql3);
               $from_date_emergency = array(); $to_date_emergency = array(); $emergency_total = 0;
               $from_date_medical = array(); $to_date_medical = array(); $medical_total = 0;
               $from_date_pregnancy = array(); $to_date_pregnancy = array(); $pregnancy_total = 0;
               $from_date_educational = array(); $to_date_educational = array(); $educational_total = 0;
               $from_date_casual = array(); $to_date_casual = array(); $casual_total = 0;
               while($row3 = mysqli_fetch_array($result3)){

                 if($row3['leave_id']==1){
                   $from_date_emergency[] = $row3['from_date'];
                   $to_date_emergency[] = $row3['to_date'];
                 }

                 if($row3['leave_id']==2){
                   $from_date_medical[] = $row3['from_date'];
                   $to_date_medical[] = $row3['to_date'];
                 }

                 if($row3['leave_id']==3){
                   $from_date_pregnancy[] = $row3['from_date'];
                   $to_date_pregnancy[] = $row3['to_date'];
                 }

                 if ($row3['leave_id']==4) {
                   $from_date_educational[] = $row3['from_date'];
                   $to_date_educational[] = $row3['to_date'];
                 }

                 if ($row3['leave_id']==5) {
                   $from_date_casual[] = $row3['from_date'];
                   $to_date_casual[] = $row3['to_date'];
                 }

                }
                //This part is for granted leave calculation***********
                // this part is for Emergency
                for($i=0;$i<count($from_date_emergency);$i++){
                  $emergency_total = $emergency_total+(strtotime($to_date_emergency[$i])-strtotime($from_date_emergency[$i]))/(24*60*60);

                }
                // this part is for medical leave granted calculation
                for($i=0;$i<count($from_date_medical);$i++){
                   $medical_total = $medical_total+(strtotime($to_date_medical[$i])-strtotime($from_date_medical[$i]))/(24*60*60);
                }
                // this part is for Pregnancy leave
                for($i=0;$i<count($from_date_pregnancy);$i++){
                  $pregnancy_total = $pregnancy_total+(strtotime($to_date_pregnancy[$i])-strtotime($from_date_pregnancy[$i]))/(24*60*60);

                }
                //this part is for edcucational leave
                for($i=0;$i<count($from_date_educational);$i++){
                  $educational_total = $educational_total+(strtotime($to_date_educational[$i])-strtotime($from_date_educational[$i]))/(24*60*60);

                }
                //this part is for casual leave
                for($i=0;$i<count($from_date_casual);$i++){
                  $casual_total = $casual_total+(strtotime($to_date_casual[$i])-strtotime($from_date_casual[$i]))/(24*60*60);

                }
                //****************************************
                // this part is for displing leave balance of employee
                if($gender=='Male'){
                   $sql2 = "SELECT * FROM leave_details where eligible_for='MF'";
                }
                elseif($gender=='Female'){
                   $sql2 = "SELECT * FROM leave_details";
                }

               $result2 = mysqli_query($con,$sql2);
               ?>
               <tbody>
                 <?php
                   $emergency_balance = 0;
                   $medical_balance = 0;
                   $pregnancy_balance = 0;
                   $educational_balance = 0;
                   $casual_balance = 0;
                   while($row2 = mysqli_fetch_array($result2)){
                   ?>
                  <tr>
                     <td><?php echo $row2['leave_type']; ?></td>
                     <td>
                      <?php
                      if($row2['leave_type']=='Emergency'){
                       $emergency_balance = $row2['leave_balance'];
                       echo ($emergency_balance-$emergency_total)." / ".$emergency_balance;
                     }
                     if($row2['leave_type']=='Medical'){
                       $medical_balance = $row2['leave_balance'];
                       echo ($medical_balance-$medical_total)." / ".$medical_balance;
                     }

                     //********This is part depends on male and female*************
                     if($gender==3){
                       if($row2['leave_type']=='Pregnancy' && $gender == 3){
                         $pregnancy_balance = $row2['leave_balance'];
                         echo ($pregnancy_balance-$pregnancy_total)." / ".$pregnancy_balance;
                       }
                     }else{
                       if($row2['leave_type']=='Pregnancy'){
                         $pregnancy_balance = $row2['leave_balance'];
                         echo ($pregnancy_balance-$pregnancy_total)." / ".$pregnancy_balance;
                       }
                     }
                     //*********************************************************************
                     if($row2['leave_type']=='Educational'){
                       $educational_balance = $row2['leave_balance'];
                       echo ($educational_balance-$educational_total)." / ".$educational_balance;
                     }
                     if($row2['leave_type']=='Casual'){
                       $casual_balance = $row2['leave_balance'];
                       echo ($casual_balance-$casual_total)." / ".$casual_balance;
                     }

                      ?>
                    </td>
                  </tr>
                  <?php
                      }
                  //   }
                  // }
                   ?>
               </tbody>
            </table>
         </div>
      </div>
   </form>
</div>
</div>
</div>
<?php
    date_default_timezone_set('Asia/Kolkata');
    $date = date('Y-m-d');
    // if(isset($_POST['submit']))
    //   {
    //     echo $_POST['leavetype']."<br>";
    //     echo $_POST['from_date']."<br>";
    //     echo $_POST['to_date']."<br>";
    //     echo $_POST['description']."<br>";
    //     echo $date;
    //   }
 ?>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
   $(document).ready(function () {
       $('#sidebarCollapse').on('click', function () {
           $('#sidebar').toggleClass('active');
       });
   });
   //for dropdown menu
   $(document).find('textarea').each(function () {
   var offset = this.offsetHeight - this.clientHeight;

   $(this).on('keyup input focus', function () {
       $(this).css('height', 'auto').css('height', this.scrollHeight + offset);
     });
   });
</script>
<!-- data insert using ajax for apply leave -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
	$('#butsave').on('click', function() {
		$("#butsave").attr("disabled", "disabled");
		var leavetype = $('#leavetype').val();
		var from_date = $('#from_date').val();
		var to_date = $('#to_date').val();
		var description = $('#description').val();
    var date = $('#date').val();
    var status = $('#status').val();
    var emp_id = $('#emp_id').val();
		if(leavetype!="" && from_date!="" && to_date!="" && description!=""){
			$.ajax({
				url: "apply_process.php",
				type: "POST",
				data: {	leavetype: leavetype,	from_date: from_date,	to_date: to_date,	description: description, date: date, status: status, emp_id: emp_id},
				// cache: false,
				success: function(data) {

											$("#butsave").removeAttr("disabled");
                      $('#success').fadeIn().html(data);
											$('#success').html('Leave has been applied Successfully');
                  				setTimeout(function() {
                  					$('#success').fadeOut("slow");
                  				}, 2000 );
											$('#leaveform').trigger('reset');

                  }
			});
		}
		else{
			alert('Please fill all the field !');
		}
	});
});
</script>

<script src="../css/SelectBox.js"></script>
<script>
   $('select').SelectBox();
</script>
</body>
</html>
