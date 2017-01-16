<?php 
    header("Content-Type: text/html; charset=utf8");
    include('dbConn.php');
    if(!isset($_POST['userID']))
    {
        exit("error");
    }

    $userID=$_POST['userID'];

    $q="select * from user where id = ".$userID; //vulnerable to sql injection
    $result=mysql_query($q,$con);
    if (!$result)
    {
        die('Error: ' . mysql_error());
    }
    if(mysql_num_rows($result) == 0)
    {
        exit("This user does not exist");
    }

    $q="
        SELECT * 
        FROM snippets
        WHERE userID = ".$userID
    ;
    $result=mysql_query($q,$con);

    session_start();

    while ($row = mysql_fetch_assoc($result)) {
        echo $row['text'].'&#09;';
        if($_SESSION['views'] == $userID) {
            echo "&emsp;<button onclick='deleteSnippet(".$row['id'].")'>Delete</button>";
        }
        echo "<br>";
    }

    mysql_close($con);
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    function deleteSnippet(rowID){
        url = window.location.href;
        str = url.substring(url.indexOf("userID=")+7);
        var userID = "";

        for(i=0; i<str.length; i++)
            if(str.charAt(i)>='0' && str.charAt(i)<='9')
                userID = userID + str.charAt(i);
            else
                break;
        str = decodeURIComponent(str.replace(/\+/g, " "));
        userID = decodeURIComponent(userID.replace(/\+/g, " "));
        console.log(userID);
        $.post("requests/snippetDelete.php",{
              userID: userID,
              rowID: rowID
          }).done(function( response ) {
            $.post("requests/getSnippet.php",{
                userID: userID
            }).done(function( response ) {
                $("#response").html(response);
            }); 
        });   
    }
</script>
