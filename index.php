<!doctype html>
<html>
<head>
<script>
$('.button').click(function() {

 $.ajax({
  type: "POST",
  url: "some.php",
  data: { name: "John" }
}).done(function( msg ) {
  alert( "Data Saved: " + msg );
});    

    });
</script>
</head>
<body>
<?php
include('connect.php');
$query="SELECT * FROM user";
$result=mysql_query($query);
$num=mysql_numrows($result);
mysql_close();

?>
<a href="signup.html"><p>signup</p></a>
<a href="login.html"><p>login</p></a>
<tr>
<table border="0" cellspacing="2" cellpadding="2">
<tr>
<td>
<font face="Arial, Helvetica, sans-serif">Username</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">iconURL</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">snippet</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">color</font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif">pageURL</font>
</td>
</tr>
<?php
$i=0;
while ($i < $num) 
{
$f2=mysql_result($result,$i,"iconURL");
$f1=mysql_result($result,$i,"username");
$f3=mysql_result($result,$i,"snippet");
$f4=mysql_result($result,$i,"color");
$f5=mysql_result($result,$i,"pageURL");
?>
<tr>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
</td>
<td>
<font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
</td>
 </tr>
<?php $i++;}
?>

</body>
</html>