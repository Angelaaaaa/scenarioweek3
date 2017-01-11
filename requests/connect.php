<?php


    $server="localhost:8889";
    $db_username="root";
    $db_password="root";

    $con = mysql_connect($server,$db_username,$db_password);//connect to DB
    if(!$con){

        die("can't connect".mysql_error());//if fail to connect
    }
    mysql_select_db('security',$con);//Select DB, 'security' is the name of ours
