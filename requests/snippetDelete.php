<?php 
    header("Content-Type: text/html; charset=utf8"); 
    include('dbConn.php');
  	
    if(!isset($_POST['userID'])||!isset($_POST['rowID']))
    {
        exit("error");
    }

    $q="delete from snippets where id=\"".$_POST['rowID']."\"";
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }


    mysql_close($con);
?>

