<!doctype html>
<html lang="en">
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	 <meta charset="UTF-8">
         <title>login success</title>
    </head>
    <body>
        <div>
        <a href="profile.php">personal profile</a>
         <a href="changepw.php">change password</a>
         <a href="snippet.php">snippet</a>
        <a href="login.html">logout</a>
        </div>

        <div>
            <script>

            $.post("requests/getSnippet.php",
	    {
		userId: "1"
	    }).done(function( response ) 
	    {
              console.log(response.response);
            });    
 		
            </script>
	<?php
	echo "inside php function\n";

    $server="127.0.0.1:3306";
    $db_username="root";
    $db_password="Qwe123";

    $con = mysql_connect($server,$db_username,$db_password);
    mysql_select_db('userdb',$con);

	    $q="select * from snippets where userId = '1'";
    	    $result=mysql_query($q,$con);
	    echo $result;

	while ($row = mysql_fetch_assoc($result)) {
	echo $row['id'].'&#09;';
	echo $row['userId'].'&#09;';
	echo $row['text'].'&#09;';
	}
	?>

        </div>


    </body>
</html>
