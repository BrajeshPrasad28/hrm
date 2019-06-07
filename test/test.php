<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View data using ajax</title>
  </head>
  <body>
    <form>
      <table style="border: 1px solid black">
        <thead>
          <tr>
            <th>Present Date:</th>
          </tr>
        </thead>
        <tbody id="data">

        </tbody>
        <tfoot id="data1">

        </tfoot>
      </table>
      <br>
      <!-- <button type="submit" name="submit" id="submit">Submit</button> -->
    </form>
  </body>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script>
    $(document).ready(function() {
      displaydata();
      function displaydata(){
        $.ajax({

          url: 'test_process.php',
          type: 'post',

          success: function(responsedata){
            $('#data').html(responsedata);
          }
        });
      }

      displaydata1();
      function displaydata1(){
        $.ajax({

          url: 'test_processTest.php',
          type: 'post',

          success: function(responsedata){
            $('#data1').html(responsedata);
          }
        });
      }
    });
 </script>
</html>
