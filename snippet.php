<!doctype html>
<html lang="en">
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	 <meta charset="UTF-8">
         <title>login success</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
</style>
    </head>
    <body>
        <div id="wrapper">
          <nav id="nav">
            <ul>
               <li><a href="index.php">Home</a></li>&emsp;&emsp;
               <li><a href="profile.php">personal profile</a></li>&emsp;&emsp;
               <li><a href="changepw.php">change password</a></li>&emsp;&emsp;
               <li><a href="snippet.php">snippet</a></li>
               &emsp;&emsp;
               <li><a href="upload.php">upload</a></li>
               <li style="float:right; margin-right: 2em;"><a href="login.php">logout</a></li>
          </ul>
          </nav>
          <h1 style="text-align:center; margin-top: 1em;">Your Snippets</h1>
        <div>
          <section id="main">
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
	// echo "inside php function\n";

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
</section>
        </div>

</div>
    </body>
</html>
