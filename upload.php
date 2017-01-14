<?php
session_start();
?>
<html>  
<head>  
<title>Upload File</title>  
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" /></head>  
<body>
<div id="wrapper">

       <?php
        session_start();
        $a = $_SESSION['views'];


        if ($_SESSION["views"]){
            if($_SESSION['admin']){
                echo    
                '<nav id="nav">
                        <ul>
                         <li><a href="index.php">Home</a></li>&emsp;&emsp;
                         <li><a href="profile.php?userID='.$a.'">personal profile</a></li>&emsp;&emsp;
                 <li><a href="changepw.php?userID='.$a.'">change password</a></li>&emsp;&emsp;
                 <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                 <li><a href="upload.php?userID='.$a.'">upload</a></li>
                 <li><a href="admin.php?userID='.$a.'">Admin</a></li>
                <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>

                </ul>
                </nav>';
            } else {
                echo
                '<nav id="nav">
                <ul>
                 <li><a href="index.php">Home</a></li>&emsp;&emsp;
                 <li><a href="profile.php?userID='.$a.'">personal profile</a></li>&emsp;&emsp;
                 <li><a href="changepw.php?userID='.$a.'">change password</a></li>&emsp;&emsp;
                 <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                 <li><a href="upload.php?userID='.$a.'">upload</a></li>
                <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>

                </ul>
                </nav>';
                
                }
            }
        else
        {
                echo "<ul><li><a href='signup.html'>signup</a></li>
                <li><a href='login.php'>login</a></li></ul>";
        }
        ?>

          <h1 style="text-align:center; margin-top: 1em;">Upload Files</h1>
<section id="main">



<?php
                        $parts = parse_url($_SERVER['REQUEST_URI']);
                    parse_str($parts['query'], $query);
                    if($_SESSION['views'] == $query['userID'])
                        {
                                echo '
                                        <form action="" enctype="multipart/form-data" method="post" name="uploadfile">
                                                Upload file：
                                                <input type="file" name="upfile" />
                                                        <br> 
                                                <input type="submit" value="Upload" />
                                        </form>
                                ';

                                //check if there is a file uploaded by user waiting to be transfered
                                if(is_uploaded_file($_FILES['upfile']['tmp_name'])){

                                        //save the uploaded file information
                                        $name=$_FILES["upfile"]["name"];//Upload file name
                                        $type=$_FILES["upfile"]["type"];//Upload file type 
                                        $size=$_FILES["upfile"]["size"];//Upload file size
                                        $tmp_name=$_FILES["upfile"]["tmp_name"];//Upload file temparary path

                                        //check if img 
                                        switch ($type){
                                                case 'image/pjpeg':
                                                        $okType=true;
                                                        break;
                                                case 'image/jpeg':
                                                        $okType=true;
                                                        break;
                                                case 'image/gif':
                                                        $okType=true;
                                                        break;
                                                case 'image/png':
                                                        $okType=true;
                                                        break;
                                        }

                                        if($okType === true){

                                                $error=$_FILES["upfile"]["error"];//return value after upload
                                                echo "<br>Upload file name：".$name."<br/>";
                                                echo "Upload file type：".$type."<br/>";
                                                echo "Upload file size：".$size."<br/>";
                                                echo "Return value：".$error."<br/>";
                                                echo "Upload file temparary path：".$tmp_name."<br/>";

                                                //move the temparary file path to a specific path
                                                $destination="/data_scenarioweek/unsafe_data/".$name;
                                                move_uploaded_file($tmp_name,$destination);
                                                $isMoved = move_uploaded_file($tmp_name,$destination);
                                                echo $isMoved;

                                                switch ($error) {
                                                        case 0:
                                                                echo "<br>Upload successfully！";
                                                                echo "<br>Preview:<br>";
                                                                echo "<img src='../files/".$name."'>";

                                                                
                echo '
                                        <form action="requests/fileSubmit.php" method="post">
                                                <input type="hidden" name="name" value="'.$name.'" />
                                                <input type="hidden" name="userID" value="'.$_SESSION['views'].'"> 
                                                <input type="submit" value="Finish uploading" />
                                        </form>
                                ';


								break;
                                                        case 1:
                                                                echo "Exceed file size, set in php.ini file";
                                                                break;
                                                        case 2:
                                                                echo "Exceed MAX_FILE_SIZE";
                                                                break;
                                                        case 3:
                                                                 echo "Incomplete Upload";
                                                                break;
                                                        case 4:
                                                                echo "Nothing Uploaded";
                                                                break;
                                                        default:
                                                                echo "Upload file size is 0";
                                                                break;
                                                }

                                        }else{
                                                echo "Unrecognized type！";
                                        }
                                }

                        }                
                ?>
                <br><br>

                <script>
                    url = window.location.href;
                $.post("requests/getFile.php",{
                          userID: url.substring(url.indexOf("userID=")+7)
                  }).done(function( response ) {
                            $("#response").html(response);
                });    
            </script>
            <div id="response">
            </div>



</section>
</div>
</body>  
</html>
