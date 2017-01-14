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
        if($_SESSION['views'] == $query['userID'])
            
            ?>
           <form action="profile.php" method="post">';
           <p>username:<input type="text" name="username" value =<?php echo "$username"; ?> ></p>
           <p>iconURL <input type="text" name="iconURL" value = <?php echo "$iconURL"; ?> ></p>
           <p>color <input type="text" name="color" value =<?php echo "$color"; ?> ></p>
           <p>pageURL:<input type="text" name="pageURL" value = <?php echo "$pageURL"; ?> ></p>
           <p>snippet:<input type="text" name="snippet" value = <?php echo "$snippet"; ?> ></p>
           
            <input type="hidden" name="userID" value="'.$_SESSION['views'].'">
            
              <input type="submit" name="submit" value="Submit"></p>
          <?php
            echo "<a href='index.html'>back</a>
            </form>";


             include('requests/dbConn.php');
            $username=$_POST['username'];
            $iconURL=$_POST['iconURL'];
            $pageURL=$_POST['pageURL'];
            $snippet=$_POST['snippet'];
            $color=$_POST['color'];
            $q = "update user set username = '$username', iconURL = '$iconURL', pageURL = '$pageURL', snippet = '$snippet', color = '$color' WHERE id = $id;";
            $result=mysql_query($q,$con);//execute sql 
            
            if (!$result)
            {
                die('Error: ' . mpysql_error());//if failed
            }
            else
            {
                // echo "registration successful";
                header("refresh:0;url=index.php");
                 echo "<script type=\"text/javascript\">".
                "alert('sign up successfully');".
                "</script>";
            }
        ?>

     <a href="index.php">back</a>
     </section>
     </div>
    </body>
</html>
