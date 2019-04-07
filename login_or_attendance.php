<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="2"> -->
    <title>Home</title>
    <link rel="shortcut icon" type="images/png" href="images/Emblem_of_India.svg">
    <meta name="viewport" content="width-device-width initial-scale=1">
    <!-- <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="moment/moment.js"></script>
    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  </head>
  <body>
  <div class="header" style="border: 1px solid black; background-color: white;">
    <img src="images\test.svg.png" alt="header_picture" style="height: 119px; width: 81px; margin-top: 10px; margin-bottom: 9px; margin-left: 26px; margin-right: 100px;">
    <b style="font-size:28px; margin-left: 230px;">HUMAN RESOURCE MANAGEMENT</b>
  </div>

  <div class="container">
<div class="row">
  <h3 style="font-size: 30px; font-weight: bold; text-align: center;">Login Or Give Attendence</h3>

<div class="vl">
  <span class="vl-innertext">or</span>
</div>

  	<div class="login-logo" style="margin-left:83%; font-size:19px; font-weight:bold; margin-top:-165px;">
  		<p id="date"></p>
      <p id="time" class="bold"></p>
  	</div>

<div class="col">
  <div class="login">
<form action="userpanel.php" method="post">
<h4 style="text-align: center; border: 1px solid darkslategrey; border-radius: 5px; font-size: 30px; margin-top: -39px; opacity: 1; background-color: darkslategrey; color: white; height: 40px; width: 296px; margin-left: -31px;">Login</h4>
    <input type="text" name="Username" value="" placeholder="Username" required>
    <input type="password" name="Password" value="" placeholder="Password" required>
    <input type="submit" name="submit" value="Login">
</form>
</div>
</div>
<!-- col starts here -->
<div class="col">
  <div class="login">
<form action="index.php" method="post">
<h4 style="text-align: center;border: 1px solid darkslategrey; border-radius: 5px; font-size: 30px; margin-top: -39px; opacity: 1; background-color: darkslategrey; color: white; height: 40px; width: 296px; margin-left: -31px;">Attendence</h4>
    <select class="attendence" name="option">
      <option value="In">Time In</option>
      <option value="Out">Time Out</option>
    </select>
    <input type="password" name="Employ ID" value="" placeholder="Enter Employ Id" required>
    <input type="submit" name="submit" value="Submit">
</form>
</div>
</div>
</div>
 </div>
  </div>


<!--footer starts here--->
<footer>
  <div class="footer">
    <br>
    <p style="font-weight:bolder; background-color: black; color:white; margin-top: -15px;">DEVELOP AND DESIGN BY PRANJAL BASUMATARY</p>
      <p style="font-weight: bolder; margin-top: -10px;">&copy2018 all right reserved</p>
      </footer>
  <!--footer ENDS here--->



<!-- script for time and date -->
<script type="text/javascript">
$(function() {
  var interval = setInterval(function() {
    var momentNow = moment();
    $('#date').html(momentNow.format('dddd').substring(0,3).toUpperCase() + ' - ' + momentNow.format('MMMM DD, YYYY'));
    $('#time').html(momentNow.format('hh:mm:ss A'));
  }, 100);
});
</script>
<!-- script ends here -->



</body>
</html>
