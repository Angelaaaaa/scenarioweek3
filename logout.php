<!doctype html>
<html lang="en">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
        <script type="text/javascript">        
        sessionStorage.setItem("username", 0);
        sessionStorage.setItem("userID", 0);
        </script>
        <meta charset="UTF-8">
        <title>logout successful</title>
    </head>
    <body>
    <div id="wrapper">
        <?php

        // unset($_SESSION['views']); 
        // session_unset(); // clear the $_SESSION variable

        // if(isset($_COOKIE[session_name()])) {
        // setcookie(session_name(),'',time()-3600); # Unset the session id
        // }

        // session_destroy();
session_start();
  
//2、Delete session
$_SESSION = array();
  
//3、remove sessionid
if(isset($_COOKIE[session_name()]))
{
  setCookie(session_name(),'',time()-3600,'/');
}
//4、destroy session
session_destroy();
        echo "<li><a href='index.php'>back to homepage</a ></li>";
        ?>
        </div>
    </body>
</html>