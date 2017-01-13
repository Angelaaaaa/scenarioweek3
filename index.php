<!doctype html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
<!-- <script>
$('.button').click(function() {

 $.ajax({
  type: "POST",
  url: "some.php",
  data: { name: "John" }
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
});    

    });
</script> -->
</head>
<body>
<div id="wrapper">

	<?php 
	session_start();
	$a = $_SESSION['views'];
	echo "$a";

	if ($_SESSION["views"]){
		echo    
		'<nav id="nav">
		<ul>
		 <li><a href="index.php">Home</a></li>&emsp;&emsp;
		 <li><a href="profile.php">personal profile</a></li>&emsp;&emsp;
         <li><a href="changepw.php">change password</a></li>&emsp;&emsp;
         <li><a href="snippet.php">snippet</a></li>&emsp;&emsp;
         <li><a href="upload.php">upload</a></li>
        <li style="float:right; margin-right:2em;"><a href="login.php">logout</a></li>
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
include('connect.php');
$query="select username, date, text
from snippet where (username, date) in (
    select username, max(date) as date
    from snippet
    group by username
)";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

?>


<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Username</font>
</td>
&nbsp;
<td>
<font face="Arial, Helvetica, sans-serif">Snippet</font>
</td>
</tr>
<?php
$i=0;
while ($i < $num) 
{
$f2=mysql_result($result,$i,"text");
$f1=mysql_result($result,$i,"username");

?>
<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
</td>

 </tr>
<?php $i++;}
?>
</table>
</section>
</div>
</body>
</html>