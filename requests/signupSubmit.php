<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit']))
    {
        exit("error");
    }

    $name=$_POST['name'];
    $password=$_POST['password'];

    include('dbConn.php');
  
    $q="insert into user(id,loginname,password,username,iconURL,pageURL,color,snippet) values (null,'$name','$password','','','','','')";
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mpysql_error());
    }
    else
    {
        
        header("refresh:0;url=login.html");
         echo "<script type=\"text/javascript\">".
        "alert('sign up successfully');".
        "</script>";
    }

    mysql_close($con);
?>