<?php 
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['userID']))
    {
        exit("error");
    }
    include('dbConn.php');

    $t = $_POST['text'];
    $t = mysql_real_escape_string($t);
    $t = htmlspecialchars($t);
    $q = "insert into snippets (text, userID) values ('".$t."','".$_POST['userID']."')";

    $result=mysql_query($q,$con);
    if (!$result)
    {
        echo $q;
        echo "<br><br>";
        die('Error: ' . mysql_error());
    }

    mysql_close($con);
    header("refresh:0;url=../snippet.php?userID=".$_POST['userID']);

?>
