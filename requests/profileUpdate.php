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
    
    $q = '
        SELECT *
        FROM user
        WHERE loginname = "'.$_POST['username'].'" 
        AND id <> "'.$_SESSION['views'].'"
    ';
    $result=mysql_query($q,$con);
    if(mysql_num_rows($result)>0)
    {
        exit("Username ".$username." already exists");
    }

    $q = 'UPDATE user SET loginname = "'. $_POST['username'] .'", iconURL = "'.$_POST['iconURL'].'", pageURL = "'.$_POST['pageURL'].'", snippet = "'.$_POST['snippet'].'", color = "'.$_POST['color'].'" WHERE id = "'.$_SESSION['views'].'"';
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }

    mysql_close($con);
    header("refresh:0;url=../profile.php");

?>
