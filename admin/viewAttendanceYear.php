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
     <div id="showYearWise">

     </div>
     <script src="js/jquery.min.js"></script>
     <script>
         $(document).ready(function() {
             $("#submit").click(function() {

                var id = '<?php echo $emp_id;?>';
                var year = $('#year').val();
                if(year!='')
                {
                  $.ajax({
                      type: 'post',
                      url: 'viewYearSuccess.php',

                      data: {
                          id:id,
                          year: year
                      },

                      success: function(data) {

                           $('#showYearWise').html(data);

                      }

                  });
                }
                else {
                  alert("Year Field cannont be empty");
                }
                 return false;
             });
         });
     </script>

   </body>
 </html>
