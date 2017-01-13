<?php 
    header("Content-Type: text/html; charset=utf8");

    if(!isset($_POST['userId']))
    {
        exit("error");
    }

    $userId=$_POST['userId'];

    include('dbConn.php');
  
    $q="select * from snippets where userId = '$userId'";
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }



	function retRes()
	{	
	return $result;
	}


    mysql_close($con);
?>
