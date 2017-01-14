<?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['userID']))
    {
        exit("error");
    }
    include('dbConn.php');


    $q="insert into files (name, userID) values (\"".$_POST['name']."\",\"".$_POST['userID']."\")";
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }

    mysql_close($con);
    header("refresh:0;url=../upload.php?userID=".$_POST['userID']);

?>

