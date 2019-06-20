<?php
   include('dbconnection.php');
   session_start();
   if(!isset($_SESSION['User'])){
     header('location: index.php');
   }
   $emp_id=$_SESSION['User'];
   function fetch_data()
  {
    if(isset($_POST["create_pdf"])){
    $month=$_POST['month'];
    $year=$_POST['year'];
    include('dbconnection.php');
    $emp_id=$_SESSION['User'];
    $output = '';
    $sql = "SELECT employees.emp_id,employees.first_name,employees.last_name,employees.job_type,emp_salary.month,emp_salary.year,emp_salary.basic,emp_salary.hra,emp_salary.da,emp_salary.deduction,emp_salary.deduction_reason,emp_salary.bonus,emp_salary.bonus_reason,emp_salary.total,designation.d_name FROM (employees INNER JOIN emp_salary on employees.emp_id=emp_salary.emp_id) INNER JOIN designation ON employees.d_name=designation.d_id WHERE employees.emp_id = '$emp_id' AND emp_salary.month='$month' AND emp_salary.year='$year'";
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)){
      $output .='
        <tr>
          <td>'.$row['basic'].'</td>
          <td>'.$row['hra'].'</td>
          <td>'.$row['da'].'</td>
          <td>'.$row['deduction'].'</td>
          <td>'.$row['deduction_reason'].'</td>
          <td>'.$row['bonus'].'</td>
          <td>'.$row['bonus_reason'].'</td>
          <td>'.$row['total'].'</td>
        </tr>
      ';
      }
    }
    return $output;
  }
  if(isset($_POST["create_pdf"]))
  {
    $months = array("01"=>"January", "02"=>"February","03"=>"March", "04"=>"April","05"=>"May","06"=>"June",
                  "07"=>"July","08"=>"August","09"=>"September","10"=>"Ocatober","11"=>"Nomber","12"=>"December");

    $month1 = $months[$_POST['month']];
    $year=$_POST['year'];
    $name = $_POST['name'];
    $jobtype = $_POST['job_type'];
    $designation = $_POST['designation'];
    $infos = "Name: ".$name.", Job Type: ".$jobtype.", Designation: ".$designation;
    require_once('../tcpdf/tcpdf.php');
    $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    $obj_pdf->SetCreator(PDF_CREATOR);
    $obj_pdf->SetTitle('Payslip: '.$month1.' - '.$year.'-'.$infos);
    $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
    $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
    $obj_pdf->SetDefaultMonospacedFont('helvetica');
    $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);//PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT
    $obj_pdf->setPrintHeader(false);
    $obj_pdf->setPrintFooter(false);
    $obj_pdf->SetAutoPageBreak(TRUE, 10);
    $obj_pdf->SetFont('helvetica', '', 11);
    $obj_pdf->AddPage();
    $content = '';
    $content .= '
    <h2 align="center">Directorate Of Accounts And Treasuries</h2>
    <h2 align="center">Payslip:'.$month1." - ".$year.'</h2>
    <h4 align="center">'.$infos.'</h4>
    <br /><br />
    <table border="1" cellspacing="0" cellpadding="3">
         <tr>
              <th width="9%"><b>Basic</b></th>
              <th width="9%"><b>Hra</b></th>
              <th width="9%"><b>Da</b></th>
              <th width="11%"><b>Deduction</b></th>
              <th width="20%"><b>Deduct.Reason</b></th>
              <th width="9%"><b>Bonus</b></th>
              <th width="20%"><b>Bonus Reason</b></th>
              <th width="11%"><b>Total</b></th>
         </tr>
    ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('salarylist.pdf', 'I');
  }
?>
   <!DOCTYPE html>
   <html>
   <head>
       <title>Payroll and Attendance Maintenance System</title>
       <?php include 'header1.php';?>
   </head>
   <body>
   <?php include 'sidebar.php';?>
           <div class="cssmenu">
               <ul>
                   <li class="active"><a href="#"><i class="fa fa-inr"></i> Pay-roll</a></li>
                   <li><a href="userpanel.php"><i class="fa fa-home"></i> Home</a></li>
               </ul>
           </div>
           <div class="card" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
               <div class="card-content">
                 <header>
                   <h2 class="page_title">Pay-Roll</h2>
                 </header><hr>
                 <!--  <div id="search">
                       <input id="myInput" type="text" placeholder="Search...." style="width: 18%;float: right; margin-top: -2%;">
                   </div>-->
                   <div class="content-inner">
                     <table id="payslist" class="table table-stripped table-bordered order-column" name="leavehistory">
                        <thead style="background-color: #660066; color: white;">
                            <tr>
                                <th>Employee Name</th>
                                <th>Month</th>
                                <th>Year</th>
                                <th>Basic</th>
                                <th>HRA</th>
                                <th>DA</th>
                                <th>Deduction</th>
                                <th>Deduction Reason</th>
                                <th>Bonus</th>
                                <th>Bonus Reason</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                         $sql = "SELECT employees.emp_id,employees.first_name,employees.last_name,employees.job_type,emp_salary.month,emp_salary.year,emp_salary.basic,emp_salary.hra,emp_salary.da,emp_salary.deduction,emp_salary.deduction_reason,emp_salary.bonus,emp_salary.bonus_reason,emp_salary.total,designation.d_name FROM (employees INNER JOIN emp_salary on employees.emp_id=emp_salary.emp_id) INNER JOIN designation ON employees.d_name=designation.d_id WHERE employees.emp_id = '$emp_id' ORDER by month";
                         $result = mysqli_query($con,$sql);
                         ?>
                        <tbody>
                          <?php
                          $months = array("01"=>"January", "02"=>"February","03"=>"March", "04"=>"April","05"=>"May","06"=>"June",
                                        "07"=>"July","08"=>"August","09"=>"September","10"=>"Ocatober","11"=>"Nomber","12"=>"December");
                            while($row = mysqli_fetch_array($result))
                            {
                           ?>
                          <tr>
                            <td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
                            <td><?php echo $months[$row['month']]; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><?php echo $row['basic']."/-"; ?></td>
                            <td><?php echo $row['hra']."/-"; ?></td>
                            <td><?php echo $row['da']."/-"; ?></td>
                            <td><?php echo $row['deduction']."/-"; ?></td>
                            <td><?php echo $row['deduction_reason']; ?></td>
                            <td><?php echo $row['bonus']."/-"; ?></td>
                            <td><?php echo $row['bonus_reason']; ?></td>
                            <td><?php echo $row['total']."/-"; ?></td>
                            <td style="text-align: center;">
                              <form method="post">
                                <input type="hidden" name="month" value="<?php echo $row['month']; ?>">
                                <input type="hidden" name="year" value="<?php echo $row['year']; ?>">
                                <input type="hidden" name="name" value="<?php echo $row['first_name']." ".$row['last_name']; ?>">
                                <input type="hidden" name="job_type" value="<?php echo $row['job_type']; ?>">
                                <input type="hidden" name="designation" value="<?php echo $row['d_name']; ?>">
                                <button type="submit" name="create_pdf" class="btn btn-sm btn-secondary"><i class="fa fa-download"></i></button>
                                <!-- <input type="submit" name="create_pdf" class="btn btn-sm btn-secondary" value="PDF"> -->
                              </form>
                            </td>
                          </tr>
                          <?php
                             }
                           ?>
                        </tbody>
                      </table>
                   </div>

             </div>
         </div>
       </div>
   </div>

   <!-- jQuery CDN - Slim version (=without AJAX) -->
   <!-- <script src="../js/jquery-3.3.1.slim.min.js"></script> -->
       <script src="../js/jquery-3.3.1.min.js"></script>
   <!-- Popper.JS -->
   <script src="../js/popper.min.js"></script>
   <!-- Bootstrap JS -->
   <script src="../js/bootstrap.min.js"></script>

   <script type="text/javascript">
       $(document).ready(function () {
           $('#sidebarCollapse').on('click', function () {
               $('#sidebar').toggleClass('active');
           });
       });
   </script>
   <!-- Jquery For table -->
   <script src="../js/jquery.dataTables.min.js"></script>
   <!-- JavaScript for table-->
   <script type="text/javascript">
     $('#payslist').DataTable( {
         "scrollY":        "250px",
         "scrollCollapse": true,
         "orderClasses": true
     } );
   </script>
</body>
</html>
