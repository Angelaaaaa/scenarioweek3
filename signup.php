<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['submit'])){
        exit("error");
    }//判断是否有submit操作
    $name=$_POST['name'];//post获取表单里的name
    $password=$_POST['password'];//post获取表单里的password

    include('connect.php');//链接数据库
  
    $q="insert into user(id,loginname,password,username,iconURL,pageURL,color,snippet) values (null,'$name','$password','','','','','')";//向数据库插入表单传来的值的sql
    $result=mysql_query($q,$con);//执行sql
    
    if (!$result){
        die('Error: ' . mpysql_error());//如果sql执行失败输出错误
    }else{
        // echo "registration successful";//成功输出注册成功
        header("refresh:0;url=login.html");
         echo "<script type=\"text/javascript\">".
        "alert('sign up successfully');".
        "</script>";
    }

    

    mysql_close($con);//关闭数据库

?>