<?php
    session_start();
?>
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
            <?PHP      
                $a = $_SESSION['views'];

                if ($_SESSION["views"]){
                    if($_SESSION['admin']){
                        echo '
                            <nav id="nav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>&emsp;&emsp;
                                    <li><a href="profile.php">personal profile</a></li>&emsp;&emsp;
                                    <li><a href="changepw.php">change password</a></li>&emsp;&emsp;
                                    <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                                    <li><a href="upload.php?userID='.$a.'">upload</a></li>&emsp;&emsp;
                                    <li><a href="admin.php">Admin</a></li>
                                    <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>
                                </ul>
                            </nav>
                        ';
                    } else {
                        echo '
                            <nav id="nav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>&emsp;&emsp;
                                    <li><a href="profile.php">personal profile</a></li>&emsp;&emsp;
                                    <li><a href="changepw.php">change password</a></li>&emsp;&emsp;
                                    <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                                    <li><a href="upload.php?userID='.$a.'">upload</a></li>
                                    <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>
                                </ul>
                            </nav>
                        ';  
                    }
                }
                else
                {
                    header("refresh:0;url=login.php");
                    exit();
                }
            ?>
            <h1 style="text-align:center; margin-top: 1em;">profile</h1>
            <section id="main">
            	<?PHP
                    header("Content-Type: text/html; charset=utf8");
                    
                    include('requests/dbConn.php');            
                    $sql = "SELECT * FROM user WHERE id =" . $_SESSION['views'];
                    $result = mysql_query($sql);//执行sql

                    if($result){
                        $array = mysql_fetch_array($result);
                        $username = $array["loginname"];
                        $iconURL = $array["iconURL"];
                        $color = $array["color"];
                        $pageURL = $array["pageURL"];
                        $snippet = $array["snippet"];
                       	echo '<form action="requests/profileUpdate.php" method="post">';
                       	echo '<p>username:<input type="text" name="username" value = '.$username.'></p>';
                       	echo '<p>iconURL <input type="text" name="iconURL" value = '.$iconURL.'></p>';   
                       	echo '<p>color <input type="text" name="color" value = '.$color.'></p>';
                       	echo '<p>pageURL:<input type="text" name="pageURL" value = '.$pageURL.'></p>';
                       	echo '<p>snippet:<input type="text" name="snippet" value = '.$snippet.'></p>';
                       	echo '
                            <input type="hidden" name="userID" value="'.$_SESSION['views'].'">
                            <input type="submit" name="submit" value="Save"></p>
                        ';
                        echo "
                            </form>
                        ";
                    }
                ?>
                <a href="index.php">back</a>
            </section>
        </div>
    </body>
</html>
