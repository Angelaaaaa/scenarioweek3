<?php 
    header("Content-Type: text/html; charset=utf8");
    include('dbConn.php');
    if(!isset($_POST['userID']))
    {
        exit("error");
    }

    $userID=$_POST['userID'];
  
    $q="
        SELECT * 
        FROM files 
        WHERE userID = '$userID'
    ";

    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }

    session_start();

    while ($row = mysql_fetch_assoc($result)) {
        echo "<a href=\"/files/".$row['name'].'&#09;'."\">".$row['name']."</a>";
        if($_SESSION['views'] == $userID)
            echo "&emsp;<button  onclick='deleteSnippet(".$row['id'].")'>Delete</button>";
        echo "<br>";
    }

    mysql_close($con);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    function deleteSnippet(rowID){
        url = window.location.href;
        $.post("requests/fileDelete.php",{
              userID: url.substring(url.indexOf("userID=")+7),
              rowID: rowID
          }).done(function( response ) {
            $.post("requests/getFile.php",{
                userID: url.substring(url.indexOf("userID=")+7)
            }).done(function( response ) {
                $("#response").html(response);
            }); 
        });   
    }
</script>

