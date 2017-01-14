<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />    
</head>
    <body>

    <div id="wrapper">
          <?php
        session_start();
        $a = $_SESSION['views'];

        if ($_SESSION["views"]){
            if($_SESSION['admin']){
                echo    
                '<nav id="nav">
                        <ul>
                         <li><a href="index.php">Home</a></li>&emsp;&emsp;
                         <li><a href="profile.php?userID='.$a.'">personal profile</a></li>&emsp;&emsp;
                 <li><a href="changepw.php?userID='.$a.'">change password</a></li>&emsp;&emsp;
                 <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                 <li><a href="upload.php?userID='.$a.'">upload</a></li>&emsp;&emsp;
                 <li><a href="admin.php?userID='.$a.'">Admin</a></li>
                <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>

                </ul>
                </nav>';
            } else {
                echo
                '<nav id="nav">
                <ul>
                 <li><a href="index.php">Home</a></li>&emsp;&emsp;
                 <li><a href="profile.php?userID='.$a.'">personal profile</a></li>&emsp;&emsp;
                 <li><a href="changepw.php?userID='.$a.'">change password</a></li>&emsp;&emsp;
                 <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                 <li><a href="upload.php?userID='.$a.'">upload</a></li>
                <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>

                </ul>
                </nav>';
                
                }
            }
        else
        {
                echo "<ul><li><a href='signup.html'>signup</a></li>
                <li><a href='login.php'>login</a></li></ul>";
        }
        ?>
        <h1 style="text-align:center; margin-top: 1em;">profile</h1>
      <section id="main">
    	<?PHP
    
        header("Content-Type: text/html; charset=utf8");
      	session_start();
    	$id =$_SESSION['views'];
        include('requests/dbConn.php');
        $sql = "select * from user where id = $id";
        $result = mysql_query($sql);//执行sql
        $array = mysql_fetch_array($result);//
        $username = $array["username"];
        $iconURL = $array["iconURL"];
        $color = $array["color"];
        $pageURL = $array["pageURL"];
        $snippet = $array["snippet"];

  


    // $_SESSION['views'] = mysql_fetch_array($idresult)["id"];//session = 7
    
 	echo "<form action='profile.php' method='post'>";
 	echo "<p>username:<input type='text' name='username' value = '$username'></p>";
 	echo "<p>iconURL <input type='text' name='iconURL' value = '$iconURL'></p>";   
 	echo "<p>color <input type='text' name='color' value = '$color'></p>";
 	echo "<p>pageURL:<input type='text' name='pageURL' value = '$pageURL'></p>";
 	echo "<p>snippet:<input type='text' name='snippet' value = '$snippet'></p>";
 	echo "<p><input type='submit' name='submit' value='save'></p>";
    echo "<a href='welcome.html'>back</a>";

        include('requests/dbConn.php');
        $username=$_POST['username'];
        $iconURL=$_POST['iconURL'];
        $pageURL=$_POST['pageURL'];
        $snippet=$_POST['snippet'];
        $color=$_POST['color'];
        $q = "update user set username = '$username', iconURL = '$iconURL', pageURL = '$pageURL', snippet = '$snippet', color = '$color' WHERE id = $id;";
        $result=mysql_query($q,$con);//execute sql 
         if (!$result){
        die('Error: ' . mpysql_error());//if failed
    }else{
        // echo "registration successful";
        header("refresh:0;url=login.html");
         echo "<script type=\"text/javascript\">".
        "alert('successful');".
        "</script>";
    }
?>

     <a href="index.php">back</a>
    </body>
</html>
