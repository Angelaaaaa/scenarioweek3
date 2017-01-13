<?php
session_start();
?>
<html>  
<head>  
<title>Upload File</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" /></head>  
<body>
<div id="wrapper">
<nav id="nav">
            <ul>
               <li><a href="profile.php">personal profile</a></li>&emsp;&emsp;
               <li><a href="changepw.php">change password</a></li>&emsp;&emsp;
               <li><a href="snippet.php">snippet</a></li>
               &emsp;&emsp;
               <li><a href="upload.php">upload</a></li>
               <li style="float:right; margin-right: 2em;"><a href="login.php">logout</a></li>
          </ul>
          </nav>
          <h1 style="text-align:center; margin-top: 1em;">Upload Files</h1>
<section id="main">
<form action="" enctype="multipart/form-data" method="post" name="uploadfile">Upload file：<input type="file" name="upfile" /><br><br> 
<input type="submit" value="Upload" /></form> 
<?php 
// $okType= false;
//print_r($_FILES["upfile"]);

//check if there is a file uploaded by user waiting to be transfered
if(is_uploaded_file($_FILES['upfile']['tmp_name'])){

$upfile=$_FILES["upfile"]; 
//save the uploaded file information
$name=$upfile["name"];//Upload file name
$type=$upfile["type"];//Upload file type 
$size=$upfile["size"];//Upload file size
$tmp_name=$upfile["tmp_name"];//Upload file temparary path
echo " $tmp_name";
$tmp_name = "/var/www/html/scenarioweek3Data";
//check if img 
switch ($type){ 
case 'image/pjpeg':$okType=true; 
break; 
case 'image/jpeg':$okType=true; 
break; 
case 'image/gif':$okType=true; 
break; 
case 'image/png':$okType=true; 
break; 
} 

if($okType === true){ 
/** 
* 0:文件Upload成功<br/> 
* 1：超过了文件大小，在php.ini文件中设置<br/> 
* 2：超过了文件的大小MAX_FILE_SIZE选项指定的值<br/> 
* 3：文件只有部分被Upload<br/> 
* 4：没有文件被Upload<br/> 
* 5：Upload file大小为0 
*/ 
$error=$upfile["error"];//return value after upload
// echo "================<br/>"; 
echo "<br>Upload file name：".$name."<br/>"; 
echo "Upload file type：".$type."<br/>"; 
echo "Upload file size：".$size."<br/>"; 
echo "Return value：".$error."<br/>"; 
echo "Upload file temparary path：".$tmp_name."<br/>"; 

//move the temparary file path to a specific path 
move_uploaded_file($tmp_name,'upload/'.$name);
$isMoved = move_uploaded_file($tmp_name,'upload/'.$name);
echo $isMoved;
// move_uploaded_file($tmp_name,'upload/'.$name); 
$destination="upload/".$name; 
// echo "================<br/>"; 
// echo "Upload Information：<br/>"; 
if($error==0){ 
echo "<br>Upload successfully！"; 
// echo "<br>Preview:<br>"; 
// echo "<img src=".$destination.">"; 
//echo " alt=\"图片预览:\r文件名:".$destination."\rUpload时间:\">"; 
}elseif ($error==1){ 
echo "Exceed file size, set in php.ini file"; 
}elseif ($error==2){ 
echo "Exceed MAX_FILE_SIZE"; 
}elseif ($error==3){ 
echo "Incomplete Upload"; 
}elseif ($error==4){ 
echo "Nothing Uploaded"; 
}else{ 
echo "Upload file size is 0"; 
} 
}else{ 
echo "Unrecognized type！"; 
} 
} 
?>  
</section>
</div>
</body>  
</html>