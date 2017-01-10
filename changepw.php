<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>profile</title>
    </head>
    <body>
        <h1>profile</h1>

    	<?PHP
        header("Content-Type: text/html; charset=utf8");
      	session_start();
    	$id =$_SESSION['views'];
        include('connect.php');//connect database
        $sql = "select * from user where id = $id";
        $result = mysql_query($sql);
        $array = mysql_fetch_array($result);//
        $password = $array["password"];


  


    // $_SESSION['views'] = mysql_fetch_array($idresult)["id"];//session = 7
    
 	echo "<form action='changepw.php' method='post'>";
 	echo "<p>old password<input type='text' name='oldpassword'></p>";
 	echo "<p>new password<input type='text' name='newpassword'></p>";   
 	echo "<p><input type='submit' name='submit' value='save'></p>";


      
        $oldpassword=$_POST['oldpassword'];
        $newpassword=$_POST['newpassword'];

        if($oldpassword == $password)
        {
            $q = "update user set password = $newpassword where id = $id;";
             $result=mysql_query($q,$con);//execute sql 
         if (!$result){
        // die('Error: ' . mpysql_error());//if failed
        echo "<script type=\"text/javascript\">".
        "alert('wrong password');".
        "</script>";
    }else{
        // echo "registration successful";
        header("refresh:0;url=welcome.html");
         echo "<script type=\"text/javascript\">".
        "alert('saved');".
        "</script>";
    }
       }
       
?>

    <a href="welcome.html">back</a>
    </body>
</html>