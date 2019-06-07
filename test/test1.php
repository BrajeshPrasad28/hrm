<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View data using ajax</title>
  </head>
  <body>
    <table>
      <tr>
        <td>Present Date: </td>
      </tr>
      <tbody id='data'>

      </tbody>
    </table>
  </body>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript">
    //call ajax
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "test1_process.php"
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    ajax.send();
    ajax.onreadystatechange = function()
    {
      if(this.readyState == 4 && this.status == 200)
      {
        //converting JASON back to array_slice
        var data = JSON.parse(this.responseText);
        //console.log(data);//for debugging

        //html value for <tbody>
        var html = "";
        // looping through the data
        for(var a = 0; a < data.length; a++)
        {
          var date = data[a].date;

          //appending at html

          html +="<tr>";
            html +="<td>"+date+"</td>";
          html +="</tr>";
        }
        // Replacing the <tbody> of <table>
       document.getElementById("data").innerHTML = html;
      }

    }
  </script>
</html>
