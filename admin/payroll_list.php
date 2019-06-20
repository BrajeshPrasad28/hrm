<?php
   require_once('dbconnection.php');
   require("admin_detail.php");
   function fetch_data()
  {
    if(isset($_POST["create_pdf"])){
    $month=$_POST['month'];
    $year=$_POST['year'];
    include('dbconnection.php');
    $emp_id=$_POST['emp_id'];
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
              <th width="12%"><b>Total</b></th>
         </tr>
    ';
    $content .= fetch_data();
    $content .= '</table>';
    $obj_pdf->writeHTML($content);
    $obj_pdf->Output('salarylist.pdf', 'I');
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
      <title>Pay-roll</title>
      <!-- Bootstrap CSS CDN -->
      <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous"> -->
      <!-- Custom CSS -->
      <link rel="stylesheet" href="css/adminstyle.css">
      <!--Style for noticeboard-->
      <link rel="stylesheet" href="css/adminstyle2.css">
      <!-- Css for Tables -->
      <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
      <!-- Font Awesome JS -->
      <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- Table Heeader Style-->
      <style media="screen">
         /* tr:hover{
         background-color: #1C2833;
         } */
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
         /* Automatic Serial Number Row */
         .css-serial {
         counter-reset: serial-number; /* Set the serial number counter to 0 */
         }
         .css-serial td:first-child:before {
         counter-increment: serial-number; /* Increment the serial number counter */
         content: counter(serial-number); /* Display the counter */
         }
      </style>
   </head>
   <body>
      <!-- div of this include page are closed down below which shows extra two div -->
      <?php include 'sidebar_navbar1.php'; ?>
      <!-- BreadCrumbs starts here -->
      <div class="cssmenu">
           <ul>
             <li class="active"> <a href="#"><i class="fa fa-inr"></i>&nbsp; Pay-Roll</a></li>
             <li> <a href="adminpanel.php"><i class="fa fa-home"></i>&nbsp; Home</a></li>
           </ul>
        </div>
      <!-- BreadCrumbs ends here -->
      <!-- update page content starts here -->
      <div id="noticeboard_wrapper" style="border:2px solid aliceblue; box-shadow:4px 1px 20px cadetblue;">
         <header>
            <h2 style="color: teal; text-align: center;">Salary Paid List</h2>
         </header>
         <div class="content-inner">
           <button class="btn btn-info btn-sm mb-2" style="width: 10%;"><a href="payroll.php">Pay</a></button>
           <button class="btn btn-info btn-sm mb-2" style="width: 10%;"><a href="payroll_list.php">Paid List</a></button>
            <table id="salarylist" class="table table-stripped css-serial table-bordered">
               <thead style="background-color: #660066; color: white;">
                  <!-- <th>Id</th> -->
                  <th>#</th>
                  <th>Employee ID</th>
                  <th>Photo</th>
                  <th>Name</th>
                  <th>Month & Year</th>
                  <th>Status</th>
                  <th>Download</th>
               </thead>
               <tbody>
                  <?php
                  $query = mysqli_query($con, "SELECT employees.emp_id,employees.salary_status,employees.photo,employees.first_name,employees.last_name,employees.job_type,emp_salary.month,emp_salary.year,emp_salary.basic,emp_salary.hra,emp_salary.da,emp_salary.deduction,emp_salary.deduction_reason,emp_salary.bonus,emp_salary.bonus_reason,emp_salary.total,designation.d_name FROM (employees INNER JOIN emp_salary on employees.emp_id=emp_salary.emp_id) INNER JOIN designation ON employees.d_name=designation.d_id WHERE employees.salary_status = 'Paid' ORDER BY month");
                  while ($a = mysqli_fetch_array($query)) {
                       ?>
                  <tr>
                     <td></td>
                     <td><?php echo $a['emp_id']; ?></td>
                     <td><img id='pht' src="<?php echo $a['photo'];?>"  style="width: 30px; height: 30px;"></td>
                     <td><?php echo $a['first_name']." ".$a['last_name']; ?></td>
                     <td><?php echo $a['month']."-".$a['year']; ?></td>
                     <td style="color: green;"><?php echo $a['salary_status']; ?></td>
                     <td style="text-align: center; width: 10%">
                       <form method="post">
                         <input type="hidden" name="emp_id" value="<?php echo $a['emp_id']; ?>">
                         <input type="hidden" name="month" value="<?php echo $a['month']; ?>">
                         <input type="hidden" name="year" value="<?php echo $a['year']; ?>">
                         <input type="hidden" name="name" value="<?php echo $a['first_name']." ".$a['last_name']; ?>">
                         <input type="hidden" name="job_type" value="<?php echo $a['job_type']; ?>">
                         <input type="hidden" name="designation" value="<?php echo $a['d_name']; ?>">
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
      <!-- The Modal for approve -->
      <div class="modal fade" id="edit_modal">
         <div class="modal-dialog  modal-md"> <!-- modal-dialog-centered -->
            <div class="modal-content">
               <!-- Modal Header -->
               <div class="modal-header">
                  <h4 class="modal-title" style="color: teal;">Update Salary</h4>
                  <button type="button" class="close" data-dismiss="modal" onClick="window.location.reload();">&times;</button>
               </div>
               <!-- Modal body -->
               <div class="modal-body" id='show'>
               </div>
               <!-- Modal footer -->
               <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload();">Close</button>
               </div>
            </div>
         </div>
      </div>
      <!-- Modal Part Ends Here -->
      <!-- this two divs are belongs to include sidebar_navbar page -->
      </div>
      </div>
      <!-- Jquery For table -->
      <script src="../js/jquery-3.3.1.min.js"></script>
      <script src="../js/jquery.dataTables.min.js"></script>
      <!-- script for table -->
      <script type="text/javascript">
         $(document).ready(function() {
           $('#salarylist').DataTable({
             "scrollY":        "350px",
             "scrollCollapse": true,
           });
         } );
      </script>
   </body>
</html>
