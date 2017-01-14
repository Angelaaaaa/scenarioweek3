<?PHP
    header("Content-Type: text/html; charset=utf8");
    echo "\ninside of loginSubmit!\n";
    if(!isset($_POST["submit"]))
    {
        exit("error");
    }
  
    include('dbConn.php');
    $name = $_POST['name'];
    $passowrd = $_POST['password'];
    echo $name;
    echo "\n";
    echo $password;
    echo  "\n";		
    if ($name && $passowrd)
    {
             $sql = "select * from user where loginname = '$name' and password='$passowrd'";
             $result = mysql_query($sql);
             $rows=mysql_num_rows($result);
             if($rows)
             {
                    session_start();
                    
                    $fetchid = "select id from user where loginname = '$name'";
                    $fetchAdmin = "select isAdmin from user where loginname = '$name'";
                    $idresult=mysql_query($fetchid);
                    $adminresult = mysql_query($fetchAdmin);
                    $_SESSION['views'] = mysql_fetch_array($idresult)["id"];//
                    $_SESSION['admin'] = mysql_fetch_array($adminresult)["isAdmin"];
                    header("refresh:0;url=../index.php");
                   exit;
             }
             else
             {
                echo "wrong username or password";
                echo "
                        <script>
                                setTimeout(function(){window.location.href='../login.php';},1000);
                        </script>";
             }
    }
    else
    {
                echo "not complete form";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='../login.php';},1000);
                      </script>";

    }

    mysql_close();
?>
