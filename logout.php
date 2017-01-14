<!doctype html>
<html lang="en">
    <head>
        <script type="text/javascript">        
        sessionStorage.setItem("username", 0);
        sessionStorage.setItem("userID", 0);
        </script>
        <meta charset="UTF-8">
        <title>logout successful</title>
    </head>
    <body>
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
        echo "<a href=' '>back to homepage</a >";
        ?>
    </body>
</html>