<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
<script>
// $('.button').click(function() {

//  $.ajax({
//   type: "POST",
//   url: "some.php",
//   data: { name: "John" }
// }).done(function( msg ) {
//   alert( "Data Saved: " + msg );
// });    

    // });
</script>
</head>
<body>
    <div id="wrapper">
         <?php
        session_start();
        $a = $_SESSION['views'];

        if ($_SESSION["views"]){
                echo
                '<nav id="nav">
                <ul>
                 <li><a href="index.php">Home</a></li>&emsp;&emsp;
                 <li><a href="profile.php?userID='.$a.'">personal profile</a></li>&emsp;&emsp;
         <li><a href="changepw.php?userID='.$a.'">change password</a></li>&emsp;&emsp;
         <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
         <li><a href="upload.php?userID='.$a.'">upload</a></li>&emsp;&emsp;
         <li><a href="admin.php?userID='.$a.'">Admin</a></li>
        <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>
        </ul>
        </nav>';
        }
        else
        {
                echo "<ul><li><a href='signup.html'>signup</a></li>
                <li><a href='login.php'>login</a></li></ul>";
        }
        ?>

<section id="main">
<?php
 include('requests/dbConn.php');
$query="select *from user";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

?>

<!-- <tr> -->
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Username</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Password</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Color</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">IconURL</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">PageURL</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Snippet</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Snippet Permission</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">Admin Permission</font>
</td>
</tr>
<form action="admininput.php" method="post">
<?php
$i=0;
while ($i < $num) 
{

$f1=mysql_result($result,$i,"username");
$f2=mysql_result($result,$i,"password");
$f3 = mysql_result($result, $i,"color");
$f4 = mysql_result($result, $i,"iconURL");
$f5 = mysql_result($result, $i,"pageURL");
$f6 = mysql_result($result, $i,"snippet");
$f7 = mysql_result($result, $i,"cancelSnippet");
$f8 = mysql_result($result, $i,"isAdmin");
?>
<tr>

<td>
<input type="text" name='username[]'  value = <?php echo "$f1"; ?> >
</td>
<td>
<input type="text" name='password[]'  value = <?php echo "$f2"; ?> >
</td>
<td>
<input type="text" name='color[]' value = <?php echo "$f3"; ?> >
</td>
<td>
<input type="text" name='iconURL[]' value = <?php echo "$f4"; ?> >
</td>
<td>
<input type="text" name='pageURL[]' value = <?php echo "$f5"; ?> >
</td>
<td>
<input type="text" name='snippet[]' value = <?php echo "$f6"; ?> >
</td>
<td>
<input type="text" name='cancelSnippet[]' maxlength="1" value = <?php echo "$f7"; ?> >
</td>
<td>
<input type="text" name='isAdmin[]' maxlength="1" value = <?php echo "$f8"; ?> >
</td>
 </tr>
<?php 
// // $_SESSION['snippet'] = ;
// echo "   <form name='snippet' action='login.php' method='post'>
//                 <p><input type='submit' name='submit' value='login'></p>"
$i++;}
?>
<p><input type="submit" name="submit" value="save"></p>
 </form>
 </table>
 </section>
 </div>
</body>
</html>
