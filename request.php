<?PHP
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST["submit"]))
    {
        exit("error");
    }
    include('connect.php');
    $name = $_POST['name'];
    $passowrd = $_POST['password'];
   // echo "<script> console.log('php: "$_POST["submit"]"');</script>";
    
    if ($name && $passowrd)
	{
             $sql = "select * from user where loginname = '$name' and password='$passowrd'";
             $result = mysql_query($sql);
             $rows=mysql_num_rows($result);
             if($rows)
	     {
                    session_start();
                    $fetchid = "select id from user where loginname = '$name'";
                   
                    $idresult=mysql_query($fetchid);
                    $_SESSION['views'] = mysql_fetch_array($idresult)["id"];
                   header("refresh:0;url=welcome.html");
                   exit;
             }
             else
             {
                echo "wrong username or password";
                echo "
                    <script>
                            setTimeout(function(){window.location.href='login.php';},1000);
                    </script>
                ";
             }
             
    }else{
                echo "form not complete";
                echo "
                      <script>
                            setTimeout(function(){window.location.href='login.php';},1000);
                      </script>";
         
    }
    mysql_close();
?>
