<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>profile</title>
                <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />    </head>
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
          <h1 style="text-align:center; margin-top: 1em;">Change Your Password</h1>
    <section id="main">

        	<?PHP
                header("Content-Type: text/html; charset=utf8");
              	session_start();
            	$id =$_SESSION['views'];
                include('requests/dbConn.php');
                $sql = "select * from user where id = $id";
                $result = mysql_query($sql);
                $array = mysql_fetch_array($result);//
                $password = $array["password"];

            // $_SESSION['views'] = mysql_fetch_array($idresult)["id"];//session = 7
            
             	echo "<form action='changepw.php' method='post'>";
             	echo "<p>old password<input type='text' name='oldpassword'></p>";
             	echo "<p>new password<input type='text' name='newpassword'></p>";   
             	echo "<p><input type='submit' name='submit' value='save'></p>";

                $oldpassword=$_POST['oldpassword'];
                $newpassword=$_POST['newpassword'];

                if($oldpassword!= ""){
                if($oldpassword == $password)
                {
                    $q = "update user set password = $newpassword where id = $id;";
                    $result=mysql_query($q,$con);//execute sql 
                 
                    if (!$result)
                    {
                        // die('Error: ' . mpysql_error());//if failed
                        echo "<script type=\"text/javascript\">"."alert('wrong password');"."</script>";
                    }
                    else
                    {
                        // echo "registration successful";
                        header("refresh:0;url=welcome.html");
                         echo "<script type=\"text/javascript\">"."alert('saved');"."</script>";
                    }
                }
               }
            ?>
        <a href="index.php">back</a>
        </section>
        </div>
    </body>
</html>
