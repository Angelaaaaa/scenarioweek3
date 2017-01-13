<!doctype html>
<html lang="en">
    <head>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	 <meta charset="UTF-8">
         <title>login success</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" /><style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    position:relative;
    top:0;
    width: 100%;
}
li {
    display: inline;
}
</style>
    </head>
    <body>
        <div id="wrapper">
          <nav id="nav">
            <ul>
               <li><a href="profile.php">personal profile</a></li>
               <li><a href="changepw.php">change password</a></li>
               <li><a href="snippet.php">snippet</a></li>
               <li><a href="login.html">logout</a></li>
          </ul>
          </nav>
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
</section>
        </div>

</div>
    </body>
</html>
