
<?php
    header("Content-Type: text/html; charset=utf8");
//using array






    include('requests/dbConn.php');
    $query="select * from user";
    $result=mysql_query($query);
    $num=mysql_numrows($result);

    if(!isset($_POST['submit'])){
        exit("error");
    }//判断是否有submit操作
    $i =0;

    while($i<$num && $i<4)
    {
        

        $id =  mysql_result($result,$i,"id");
        $username = htmlspecialchars(mysql_real_escape_string($_POST['username'][$i]));
        $password=htmlspecialchars(mysql_real_escape_string($_POST['password'][$i]));
        $color=htmlspecialchars(mysql_real_escape_string($_POST['color'][$i]));
        $iconURL=htmlspecialchars(mysql_real_escape_string($_POST['iconURL'][$i]));
        $pageURL=htmlspecialchars(mysql_real_escape_string($_POST['pageURL'][$i]));
        $snippet=htmlspecialchars(mysql_real_escape_string($_POST['snippet'][$i]));
        $cancelSnippet=htmlspecialchars(mysql_real_escape_string($_POST['cancelSnippet'][$i]));
        $isAdmin = htmlspecialchars(mysql_real_escape_string($_POST['isAdmin'][$i]));
  

        
    $q="update user set password = '$password', username = '$username', iconURL = '$iconURL', pageURL = '$pageURL', snippet = '$snippet', color = '$color', cancelSnippet = '$cancelSnippet', isAdmin = $isAdmin WHERE id = $id;";//向数据库插入表单传来的值的sql
    $dbresult=mysql_query($q,$con);//执行sql
    // echo "$result";

    if (!$dbresult){
        die('Error: ' . mpysql_error());//如果sql执行失败输出错误
    }
    // else
    // {
    //     // echo "registration successful";//成功输出注册成功
    //     header("refresh:0;url=admin.php");

        //  echo "<script type=\"text/javascript\">".
        // "alert('sign up successfully');".
        // "</script>";
    // }

    $i++;
    }
     
// function checknull($check)
// {
//     if ($check == "")
//         return "";
//     else
//         return $check;
// }
    
    
        // echo "registration successful";//成功输出注册成功
    mysql_close($con);//关闭数据库
    
       header("refresh:0;url=admin.php");

       //   echo "<script type=\"text/javascript\">".
       //  "alert('sign up successfully');".
       //  "</script>";


?>
