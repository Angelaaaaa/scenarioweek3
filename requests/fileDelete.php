
<?php
    header("Content-Type: text/html; charset=utf8");
    include('dbConn.php');

    if(!isset($_POST['userID'])||!isset($_POST['rowID']))
    {
        exit("error");
    }


    $q="select name from files where id=\"".$_POST['rowID']."\"";
    $result=mysql_fetch_assoc(mysql_query($q,$con));

//    echo filesize("\"../../files/".$result['name']."\"");
//    echo "\"/data_scenarioweek/unsafe_data/".$result['name']."\"";
//    echo filesize("\"/data_scenarioweek/unsafe_data/".$result['name']."\"");

  //  if( unlink("'/data_scenarioweek/unsafe_data/".$result['name']."'") == true)
  //  {
	$q="delete from files where id=\"".$_POST['rowID']."\"";
	$result=mysql_query($q,$con);
	if (!$result)
	{
            die('Error: ' . mysql_error());
        }
   // }


    mysql_close($con);
?>

