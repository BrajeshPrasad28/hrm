<?php
 require_once('dbconnection.php');
 $emp_id = $_POST['id'];
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>MonthWise</title>
   </head>
   <body>
     <form method="post">
       <select class="btn" name="month" id='month' style="border: 1px solid black; border-radius: 0.25rem 0.25rem 0.25rem 0.25rem;" required>
           <option value="" hidden>Select Month</option>
           <?php
              $months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
              $transposed = array_slice($months, date('n'), 12, true) + array_slice($months, 0, date('n'), true);
              $last8 = array_reverse(array_slice($transposed, -8, 12, true), true);
              foreach ($months as $num => $name) {
              printf('<option value="%u">%s</option>', $num, $name);
              }
              ?>
        </select>
        <select class="btn" name="year" id='year' style="border: 1px solid black; border-radius: 0.25rem 0.25rem 0.25rem 0.25rem; position: absolute; z-index: 100;" onmousedown="if(this.options.length>5){this.size=5;}"  onchange='this.size=0;' onblur="this.size=0;" required>
           <option value=""hidden>Year</option>
           <?php
              for($i=2018; $i<=3001; $i++){
              $selected = ($i==$year)?'selected':'';
              echo "<option value='".$i."' ".$selected.">".$i."</option>";
              }
              ?>
        </select>
        <button type="submit" class="btn btn-primary" name="submit" id='submit' style="margin-left: 91px;">Search <i class="fa fa-search" aria-hidden="true"></i></button>
     </form>
     <div id="Show">

     </div>
     <script src="js/jquery.min.js"></script>
     <script>
         $(document).ready(function() {
             $("#submit").click(function() {

                var id = '<?php echo $emp_id;?>';
                var month = $('#month').val();
                var year = $('#year').val();
                if(month!='' && year!='')
                {
                  $.ajax({
                      type: 'post',
                      url: 'viewMonthSuccess.php',

                      data: {
                          id:id,
                          month: month,
                          year: year
                      },

                      success: function(data) {

                           $('#Show').html(data);

                      }

                  });
                }
                else {
                  alert("Month and Year Field cannont be empty");
                }
                 return false;
             });
         });
     </script>

   </body>
 </html>
