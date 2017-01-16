<?php
    session_start();
?>
<html>
    <head>
        <title>Upload File</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div id="wrapper">
            <?php
                $a = $_SESSION['views'];

                if ($_SESSION["views"]){
                    if($_SESSION['admin']){
                        echo '
                            <nav id="nav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>&emsp;&emsp;
                                    <li><a href="profile.php">personal profile</a></li>&emsp;&emsp;
                                    <li><a href="changepw.php">change password</a></li>&emsp;&emsp;
                                    <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                                    <li><a href="upload.php?userID='.$a.'">upload</a></li>&emsp;&emsp;
                                    <li><a href="admin.php">Admin</a></li>
                                    <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>
                                </ul>
                            </nav>
                        ';
                    } else {
                        echo '
                            <nav id="nav">
                                <ul>
                                    <li><a href="index.php">Home</a></li>&emsp;&emsp;
                                    <li><a href="profile.php">personal profile</a></li>&emsp;&emsp;
                                    <li><a href="changepw.php">change password</a></li>&emsp;&emsp;
                                    <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
                                    <li><a href="upload.php?userID='.$a.'">upload</a></li>
                                    <li style="float:right; margin-right:2em;"><a href="logout.php">logout</a></li>
                                </ul>
                            </nav>
                        ';
                    }
                }
                else
                {
                    echo "
                        <ul>
                            <li><a href='index.php'>Home</a></li>&emsp;&emsp;
                            <li><a href='signup.php'>signup</a></li>&emsp;
                            <li><a href='login.php'>login</a></li>
                        </ul>
                    ";
                }
            ?>
            <h1 style="text-align:center; margin-top: 1em;">Upload Files</h1>
            <section id="main">
                <?php
                    $parts = parse_url($_SERVER['REQUEST_URI']);
                    parse_str($parts['query'], $query);
                    $i = 0;
                    while($query['userID'][$i]>='0' && $query['userID'][i]<='9' && i<10)
                        $i++;
                    $query['userID'] = substr($query['userID'], 0, $i);
                    if($_SESSION['views'] == $query['userID'])
                    {
                        echo '
                            <form action="" enctype="multipart/form-data" method="post" name="uploadfile">
                                Uploaded file：
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
                                        echo '
                                            <form action="requests/fileSubmit.php" method="post">
                                                <input type="hidden" name="name" value="'.$name.'" />
                                                <input type="hidden" name="userID" value="'.$_SESSION['views'].'"> 
                                                <input type="submit" value="Finish uploading" />
                                            </form>
                                        ';
                                        echo "<img src='../files/".$name."' style='width: 80%'>";
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

                    $.post("requests/getFile.php",{
                        userID: userID
                    }).done(function( response ) {
                        $("#response").html(response);
                    });    
                </script>
                <div id="response">
                </div>
                <br><br>
                <a href="index.php">back</a>
            </section>
        </div>
    </body>
</html>