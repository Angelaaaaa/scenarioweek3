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
  // Fetch one and one row
 		 while ($row=mysqli_fetch_row($result))
    	{
    echo "<tr> <th>$row[0]</th> <th>Lastname</th> <th>Age</th> </tr>";
    	}
  // Free result set
  	mysqli_free_result($result);
	}
       
   ?>
	 	</table>
    </body>
</html>