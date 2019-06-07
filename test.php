<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
      <div class="container-fluid" style="border: 1px Solid black;">
        <form method="post">
          <div class="row ml-3">
            <label for="Password">Password:</label>
            <input type="text" name="pass">
          </div>
          <div class="row ml-3">
            <label for="Password">Mac Address:</label>
            <input type="text" name="mac">
          </div>
          <div class="row ml-3">
            <button type="submit" name="submit">Submit</button>
          </div>
        </form>
      </div>
</div>

</body>
</html>

<?php
   // Turn on output buffering
    ob_start();
    //Get the ipconfig details using system commond
    system('ipconfig /all');

    // Capture the output into a variable
    $mycom=ob_get_contents();
    // Clean (erase) the output buffer
    ob_clean();

    $findme = "Physical";
    //Search the "Physical" | Find the position of Physical text
    $pmac = strpos($mycom, $findme);

    // Get Physical Address
    $mac=substr($mycom,($pmac+36),17);
    //Display Mac Address
    echo $mac;


// PHP code to illustrate the working
// of md5(), sha1() and hash()

  $str = 'Password';
  $salt = 'Username20Jun96';
  echo sprintf("<br>The md5 hashed password of %s is: %s\n",
  								$str, md5($str.$salt));
  echo sprintf("<br>The sha1 hashed password of %s is: %s\n",
  								$str, sha1($str.$salt));
  echo sprintf("<br>The gost hashed password of %s is: %s\n",
  						$str, hash('gost', $str));
  // if((hash('gost', $str))==(hash('gost', $myPass))){
  //   echo "<br><br>Equal";
  // }
  // else{
  //   echo "Not Equal";
  // }
  if(isset($_POST['submit'])){
    $myPass = $_POST['pass'];
    $myMac = $_POST['mac'];
    if((hash('gost', $str))==(hash('gost', $myPass))){
      echo "<br><br>Equal";
    }
    else{
      echo "<br><br>Not Equal";
    }
    if($mac==$myMac){
      echo "<br><br>Equal";
    }
    else{
      echo "<br><br>Not Equal";
    }
  }
     ?>
