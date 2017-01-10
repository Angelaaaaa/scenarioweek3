<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"])){
        exit("error");
    }//检测是否有submit操作 

    include('connect.php');//链接数据库
    $name = $_POST['name'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值

    if ($name && $passowrd){//如果用户名和密码都不为空
             $sql = "select * from user where loginname = '$name' and password='$passowrd'";//检测数据库是否有对应的username和password的sql
             $result = mysql_query($sql);//执行sql
             $rows=mysql_num_rows($result);//返回一个数值
             if($rows){//0 false 1 true
                    session_start();
                    $fetchid = "select id from user where loginname = '$name'";
                   
                    $idresult=mysql_query($fetchid);
                    $_SESSION['views'] = mysql_fetch_array($idresult)["id"];//
    
                   header("refresh:0;url=welcome.html");//如果成功跳转至welcome.html页面
                   exit;
             }
             else
             {
                echo "wrong username or password";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
             }
             

    }else{//如果用户名或密码有空
                echo "not complete form";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.html';},1000);
                      </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;
    }

    mysql_close();//关闭数据库
?>