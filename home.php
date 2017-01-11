<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>login success</title>
    </head>
    
    <body>
    	
      <table style="width:100%">
    	
      <?php
        header("Content-Type: text/html; charset=utf8");
        include('connect.php');
        $sql = "select * from user";

        if ($result=mysqli_query($con,$sql))
 	      {
       		   while ($row=mysqli_fetch_row($result))    // Fetch one and one row
          	{
             echo "<tr> <th>$row[0]</th> <th>Lastname</th> <th>Age</th> </tr>";
          	}
            
        mysqli_free_result($result);     // Free result set
	     }
      ?>
	 	</table>
    
    </body>
</html>