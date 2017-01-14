<?php
    session_start();
?>
<!doctype html>
<html lang="en">
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <meta charset="UTF-8">
        <title>login success</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
        </style>
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
            <h1 style="text-align:center; margin-top: 1em;">Your Snippets</h1>
            <div>
                <section id="main">
                    <?php
                        $parts = parse_url($_SERVER['REQUEST_URI']);
                        parse_str($parts['query'], $query);
                        if($_SESSION['views'] == $query['userID'])
                            echo '
                                <form name="login" action="requests/snippetSubmit.php" method="post">
                                    <p>Add a new snippet
                                        <div class="field">
                                            <textarea type="text" name="text" rows ="5" cols="40"></textarea>
                                        </div>
                                        <div class="field">
                                            <input type="hidden" name="userID" value="'.$_SESSION['views'].'">
                                            <input type="submit" name="submit" value="Submit">
                                        </div>
                                    </p>
                                </form>
                            ';
                    ?>
                    <br><br>
                    <script>
                        url = window.location.href;
                        $.post("requests/getSnippet.php",{
                            userID: url.substring(url.indexOf("userID=")+7)
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
        </div>
    </body>
</html>