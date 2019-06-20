<?php
   include 'DBconnection.php';
   include 'sidebar_and_header.php';
   $emp_id=$_SESSION['User'];
   date_default_timezone_set('Asia/Kolkata');
   $date = date('Y-m-d');

   ?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.css">
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
                  //*********************************************
                  // this part is calculation of leave balance of employee
                  $sql3 = "SELECT * FROM emp_leave where emp_id='$emp_id' and status='1'";
                  $result3 = mysqli_query($con,$sql3);
                  $from_date_emergency = array(); $to_date_emergency = array(); $emergency_total = 0;
                  $from_date_medical = array(); $to_date_medical = array(); $medical_total = 0;
                  $from_date_Maternity = array(); $to_date_Maternity = array(); $Maternity_total = 0;
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
                      $from_date_Maternity[] = $row3['from_date'];
                      $to_date_Maternity[] = $row3['to_date'];
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
                   $bday1 = array();
                   $today1 = array();
                   for($i=0;$i<count($from_date_emergency);$i++){
                     $bday1[$i] = new DateTime($from_date_emergency[$i]);
                     $today1[$i] = new Datetime(date($to_date_emergency[$i]));
                     $diff1 = $bday1[$i]->diff($today1[$i]);
                     $emergency_total = $diff1->d;
                   }
                   // this part is for medical leave granted calculation
                   $bday2 = array();
                   $today2 = array();
                   for($i=0;$i<count($from_date_medical);$i++){
                     $bday2[$i] = new DateTime($from_date_medical[$i]);
                     $today2[$i] = new Datetime(date($to_date_medical[$i]));
                     $diff2 = $bday2[$i]->diff($today2[$i]);
                     $medical_total = $diff2->d;
                   }
                   // this part is for Maternity leave
                   $bday3 = array();
                   $today3 = array();
                   for($i=0;$i<count($from_date_Maternity);$i++){
                     $bday3[$i] = new DateTime($from_date_Maternity[$i]);
                     $today3[$i] = new Datetime(date($to_date_Maternity[$i]));
                     $diff3 = $bday3[$i]->diff($today3[$i]);
                     $Maternity_total = $diff3->d;
                   }
                   //this part is for edcucational leave
                   $bday4 = array();
                   $today4 = array();
                   for($i=0;$i<count($from_date_educational);$i++){
                     $bday4[$i] = new DateTime($from_date_educational[$i]);
                     $today4[$i] = new Datetime(date($to_date_educational[$i]));
                     $diff4 = $bday4[$i]->diff($today4[$i]);
                     $educational_total = $diff4->d;
                     // $educational_total = $educational_total+(strtotime($to_date_educational[$i])-strtotime($from_date_educational[$i]))/(24*60*60);

                   }
                   //this part is for casual leave
                   $bday5 = array();
                   $today5 = array();
                   for($i=0;$i<count($from_date_casual);$i++){
                     $bday5[$i] = new DateTime($from_date_pregnancy[$i]);
                     $today5[$i] = new Datetime(date($to_date_pregnancy[$i]));
                     $diff5 = $bday5[$i]->diff($today5[$i]);
                     $casual_total = $diff5->d;
                     // $casual_total = $casual_total+(strtotime($to_date_casual[$i])-strtotime($from_date_casual[$i]))/(24*60*60);

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
                  $emergency_balance = 0; $emergency_available = 0;
                  $medical_balance = 0; $medical_available = 0;
                  $Maternity_balance = 0; $Maternity_available = 0;
                  $educational_balance = 0; $educational_available = 0;
                  $casual_balance = 0; $casual_available = 0;
                  $leavetype = array();
                  while($row2 = mysqli_fetch_array($result2)){

                    $leavetype[] = $row2['leave_type'];

                    if($row2['leave_type']=='Emergency'){
                     $emergency_balance = $row2['leave_balance'];
                     $emergency_available = ($emergency_balance-$emergency_total);
                   }
                   if($row2['leave_type']=='Medical'){
                     $medical_balance = $row2['leave_balance'];
                     $medical_available = ($medical_balance-$medical_total);
                   }

                   //********Start1 This is part depends on male and female*************
                   if($gender=='Female'){
                   if($row2['leave_type']=='Maternity' /*&& $gender == 'Female'*/){
                       $Maternity_balance = $row2['leave_balance'];
                       $Maternity_available = ($Maternity_balance-$Maternity_total);
                     }
                   }
                   //*******************End1****************************************
                   if($row2['leave_type']=='Educational'){
                     $educational_balance = $row2['leave_balance'];
                     $educational_available = ($educational_balance-$educational_total);
                   }
                   if($row2['leave_type']=='Casual'){
                     $casual_balance = $row2['leave_balance'];
                     $casual_available = ($casual_balance-$casual_total);
                     }
                 }
                  //*********************************************
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
                  <select name="leavetype" id="leavetype" class='leave_Type' style="background-color: white;border-top: none;border-left: none; border-right: none;">
                     <option value="" selected disabled hidden>Select Leave Type</option>
                     <?php
                        while($row1 = mysqli_fetch_array($result1)){
                          if($row1['leave_id']==1){
                            $emergency = $row1['leave_type'];
                          }
                          elseif($row1['leave_id']==2){
                            $medical = $row1['leave_type'];
                          }
                          elseif($row1['leave_id']==3){
                            $maternity = $row1['leave_type'];
                          }
                          elseif($row1['leave_id']==4){
                            $educational = $row1['leave_type'];
                          }
                          elseif($row1['leave_id']==5){
                            $casual = $row1['leave_type'];
                          }
                        }
                        ?>
                     <option data-id='<?php echo $emergency_available; ?>' value="1"><?php echo $emergency; ?></option>
                     <option data-id='<?php echo $medical_available; ?>' value="2"><?php echo $medical; ?></option>
                     <?php if($gender=='Female'){ ?>
                     <option data-id='<?php echo $Maternity_available; ?>' value="3"><?php echo $maternity?></option>
                     <?php } ?>
                     <option data-id='<?php echo $educational_available; ?>' value="4"><?php echo $educational; ?></option>
                     <option data-id='<?php echo $casual_available?>' value="5"><?php echo $casual; ?></option>
                  </select>
               </div>
            </div>
            <div class="row ml-3 mt-3">
               <div>
                  <label for="fdate">From Date</label>
               </div>
               <form action="javascript: void(0);"><!--This form is only for date range picker -->
               <div class="ml-5">
                  <input type="text" name="value_from_start_date" id='value_from_start_date' data-datepicker="separateRange" placeholder="yyy-mm-dd" style="width: auto; border-radius: 0; border: 1px solid #ccc; float: left; margin: 0; padding: 0; border-top: 0px;border-left: 0px; border-right: 0px;">
               </div>
               <div class="ml-5">
                  <label for="todate">To Date</label>
               </div>
               <div class="ml-5">
                  <input input type="text" name="value_from_end_date" id='value_from_end_date' data-datepicker="separateRange" placeholder="yyyy-mm-dd" style="width: auto; border-radius: 0; border: 1px solid #ccc;  float: left; margin: 0; padding: 0; border-top: 0px;border-left: 0px; border-right: 0px;">
               </div>
             </form>
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
         <div class="mt-3 mb-4" id='2'>
            <h3>Leave Balance</h3>
            <table class="table table-bordered">
               <thead>
                  <th>Leave Name</th>
                  <th>Balance</th>
               </thead>
               <tbody>
                 <?php
                 if($gender=='Female'){
                   $leavetype1 = array_values($leavetype);
                 }else{
                   $leavetype1 = array_values($leavetype);
                 }
                  for($i=0;$i<count($leavetype1);$i++)
                  {
                   ?>
                  <tr>
                     <td><?php echo $leavetype1[$i]; ?> </td>
                     <td>
                      <?php
                      if($gender=='Male'){
                        if($i==0){
                          echo $emergency_available." / ".$emergency_balance;
                        }elseif($i==1){
                          echo $medical_available." / ".$medical_balance;
                        }elseif($i==2){
                          echo $educational_available." / ".$educational_balance;
                        }elseif($i==3){
                          echo $casual_available." / ".$casual_balance;
                        }
                      }else {
                        if($i==0){
                          echo $emergency_available." / ".$emergency_balance;
                        }elseif($i==1){
                          echo $medical_available." / ".$medical_balance;
                        }elseif($i==2){
                          echo $Maternity_available." / ".$Maternity_balance;
                        }elseif($i==3){
                          echo $educational_available." / ".$educational_balance;
                        }elseif($i==4){
                          echo $casual_available." / ".$casual_balance;
                        }
                      }

                      ?>
                    </td>
                  </tr>
                <?php }
                  mysqli_close($con);
                 ?>
               </tbody>
            </table>
         </div>
      </div>
   </form>
</div>
</div>
</div>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
 // for sidebar
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
		var value_from_start_date = $('#value_from_start_date').val();
		var value_from_end_date = $('#value_from_end_date').val();
		var description = $('#description').val();
    var date = $('#date').val();
    var status = $('#status').val();
    var emp_id = $('#emp_id').val();
		if(leavetype!="" && value_from_start_date!="" && value_from_end_date!="" && description!=""){
			$.ajax({
				url: "processTest.php",
				type: "POST",
				data: {	leavetype: leavetype,	value_from_start_date: value_from_start_date,	value_from_end_date: value_from_end_date,	description: description, date: date, status: status, emp_id: emp_id},
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
<!-- Testing area 51 -->
<!-- Script for select box starts here  -->
<script src="../css/SelectBox.js"></script>
<script>
   $('select').SelectBox();
</script>
<!-- Script for select box ends here -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-daterangepicker/2.1.24/daterangepicker.min.js"></script>
<!-- Script for Date range picker -->
<script>
  $("select.leave_Type").change(function(){
    var leave = $(this).children("option:selected").data('id');
    //var leave = $(this).children("option:selected").val();
    alert("You have selected the leve id - " + leave);

    var separator = ' - ', dateFormat = 'YYYY-MM-DD';
    var options = {
        autoUpdateInput: false,
        autoApply: true,
         dateLimit: {
            days: leave
        },
        locale: {
            format: dateFormat,
            separator: separator
            //applyLabel: '確認',
            //cancelLabel: '取消'
        },
        minDate: moment().add(1, 'days'),
        maxDate: moment().add(359, 'days'),
        opens: "right"
    };


        $('[data-datepicker=separateRange]')
            .daterangepicker(options)
            .on('apply.daterangepicker' ,function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;

                var mainName = this.name.replace('value_from_start_', '');
                if(boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                    $(this).closest('form').find('[name=value_from_end_'+ mainName +']').blur();
                }

                $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val(picker.startDate.format(dateFormat));
                $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val(picker.endDate.format(dateFormat));

                $(this).trigger('change').trigger('keyup');
            })
            .on('show.daterangepicker', function(ev, picker) {
                var boolStart = this.name.match(/value_from_start_/g) == null ? false : true;
                var boolEnd = this.name.match(/value_from_end_/g) == null ? false : true;
                var mainName = this.name.replace('value_from_start_', '');
                if(boolEnd) {
                    mainName = this.name.replace('value_from_end_', '');
                }

                var startDate = $(this).closest('form').find('[name=value_from_start_'+ mainName +']').val();
                var endDate = $(this).closest('form').find('[name=value_from_end_'+ mainName +']').val();

                $('[name=daterangepicker_start]').val(startDate).trigger('change').trigger('keyup');
                $('[name=daterangepicker_end]').val(endDate).trigger('change').trigger('keyup');

                if(boolEnd) {
                    $('[name=daterangepicker_end]').focus();
                }
            });
    });
</script>
</body>
</html>
