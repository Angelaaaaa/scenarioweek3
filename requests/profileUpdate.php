<?php 
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['username']))
    {
        exit("error");
    }
    if(!$_POST['username'])
    {
        exit("Please enter a username");
    }

    include('dbConn.php');

    session_start();

    $username = htmlspecialchars(mysql_real_escape_string($_POST['username']));
    $color=htmlspecialchars(mysql_real_escape_string($_POST['color']));
    $iconURL=htmlspecialchars(mysql_real_escape_string($_POST['iconURL']));
    $pageURL=htmlspecialchars(mysql_real_escape_string($_POST['pageURL']));
    $snippet=htmlspecialchars(mysql_real_escape_string($_POST['snippet']));
    
    $q = '
        SELECT *
        FROM user
        WHERE loginname = "'.$username.'" 
        AND id <> "'.$_SESSION['views'].'"
    ';

    $result=mysql_query($q,$con);
    if(mysql_num_rows($result)>0)
    {
        exit("Username ".$username." already exists");
    }

    $q = 'UPDATE user SET loginname = "'. $username .'", iconURL = "'.$iconURL.'", pageURL = "'.$pageURL.'", snippet = "'.$snippet.'", color = "'.$color.'" WHERE id = "'.$_SESSION['views'].'"';
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }

    mysql_close($con);
    header("refresh:0;url=../profile.php");

?>
