<?php 
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['userID']))
    {
        exit("error");
    }
    include('dbConn.php');
    
	$q = "update user set username = $username, iconURL = $iconURL, pageURL = $pageURL, snippet = $snippet, color = $color WHERE id = $id;"
    $q="insert into user (username,password,iconURL, pageURL,color, userID) values (\"".$_POST['username']."\",\"".$_POST['password']."\",\"".$_POST['iconURL']."\",\"".$_POST['pageURL']."\",\"".$_POST['color']."\",\"".$_POST['snippet']."\",\"".$_POST['userID']."\")";
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }

    mysql_close($con);
    header("refresh:0;url=../profile.php?userID=".$_POST['userID']);

?>
