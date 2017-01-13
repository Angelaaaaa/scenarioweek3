<!doctype html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />

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

<section id="main">
	<?php 
	session_start();
	$a = $_SESSION['views'];
	echo "$a";

	if ($_SESSION["views"]){
		echo    
		'<a href="profile.php">personal profile</a>
         <a href="changepw.php">change password</a>
         <a href="snippet.php">snippet</a>
        <a href="logout.php">logout</a>';
	}
	else
	{
		echo "<a href='signup.html'><p>signup</p></a>
		<a href='login.php'><p>login</p></a>";
	}
	?>
</section>
</div>
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
</body>
</html>