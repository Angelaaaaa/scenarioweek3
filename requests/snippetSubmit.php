<?php 
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['userID']))
    {
        exit("error");
    }
    include('dbConn.php');
    

    $q="insert into snippets (text, userID) values (\"".$_POST['text']."\",\"".$_POST['userID']."\")";
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }

    mysql_close($con);
    header("refresh:0;url=../snippet.php?userID=".$_POST['userID']);

?>
