<?php
    $db_server="127.0.0.1:3306";
    $db_username="root";
    $db_password="Qwe123";

    $con = mysql_connect($db_server,$db_username,$db_password);
    if(!$con)
    {
        die("can't connect".mysql_error());
    }
    mysql_select_db('userdb',$con);
?>
