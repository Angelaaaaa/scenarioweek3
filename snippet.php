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
                 <li><a href="upload.php?userID='.$a.'">upload</a></li>&emsp;&emsp;
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










          <h1 style="text-align:center; margin-top: 1em;">Your Snippets</h1>
        <div>
          <section id="main">
         

  <?php
    session_start();
    $parts = parse_url($_SERVER['REQUEST_URI']);
    parse_str($parts['query'], $query);
    if($_SESSION['views'] == $query['userID'])
          echo '<form name="login" action="requests/snippetSubmit.php" method="post">
              <p>Add a new snippet
              <div class="field">
            <textarea type="text" name="text" rows ="5" cols="40"></textarea>
              </div>
              <div class="field">
            
                 <input type="hidden" name="userID" value="'.$_SESSION['views'].'">
            
              <input type="submit" name="submit" value="Submit"></p>
              </div>
          </form>';
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
        </div>


	  </section>
        </div>

</div>
    </body>
</html>
