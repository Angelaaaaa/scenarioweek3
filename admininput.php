
<?php
    header("Content-Type: text/html; charset=utf8");
//using array






    include('requests/dbConn.php');
    $query="select *from user";
    $result=mysql_query($query);
    $num=mysql_numrows($result);

    if(!isset($_POST['submit'])){
        exit("error");
    }//判断是否有submit操作
    $i =0;

    while($i<$num)
    {
        

        $id =  mysql_result($result,$i,"id");
        $username=$_POST['username'][$i];
        $password=$_POST['password'][$i];
        $color=$_POST['color'][$i];
        $iconURL=$_POST['iconURL'][$i];
        $pageURL=$_POST['pageURL'][$i];
        $snippet=$_POST['snippet'][$i];
        $cancelSnippet=$_POST['cancelSnippet'][$i];
        $isAdmin = $_POST['isAdmin'][$i];
  

        
    $q="update user set password = '$password', username = '$username', iconURL = '$iconURL', pageURL = '$pageURL', snippet = '$snippet', color = '$color', cancelSnippet = '$cancelSnippet', isAdmin = $isAdmin WHERE id = $id;";//向数据库插入表单传来的值的sql
    $dbresult=mysql_query($q,$con);;//执行sql
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
