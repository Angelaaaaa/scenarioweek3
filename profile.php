<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>profile</title>
    </head>
    <body>
        <h1>profile</h1>
    	<?PHP
            header("Content-Type: text/html; charset=utf8");
          	session_start();
        	$id =$_SESSION['views'];
            include('connect.php');
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

            include('connect.php');
            $username=$_POST['username'];
            $iconURL=$_POST['iconURL'];
            $pageURL=$_POST['pageURL'];
            $snippet=$_POST['snippet'];
            $color=$_POST['color'];
            $q = "update user set username = $username, iconURL = $iconURL, pageURL = $pageURL, snippet = $snippet, color = $color WHERE id = $id;";
            $result=mysql_query($q,$con);//execute sql 
            
            if (!$result)
            {
                die('Error: ' . mpysql_error());//if failed
            }
            else
            {
                // echo "registration successful";
                header("refresh:0;url=login.html");
                 echo "<script type=\"text/javascript\">".
                "alert('sign up successfully');".
                "</script>";
            }
        ?>

     <a href="index.html">back</a>
    </body>
</html>