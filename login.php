<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>log in</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />    </head>
    <body>
 	<?php session_write_close(); ?>             
        <div id="wrapper">
        <nav id="nav">
            <ul>
            <li><a href='signup.html'>signup</a></li>
            <li><a href='login.php'>login</a></li>
            </ul>
            </nav>
              <h1 style="text-align:center; margin-top: 1em;">Log in</h1>
        <section id="main">

        <form name="login" action="requests/loginSubmit.php" method="post">
            <p>Login Name
            <div class="field">
            <input type=text name="name"></p>
            </div>
            <p>Password
            <div class="field">
            <input type=password name="password"></p>
            </div>
            <p>
            <div class="field">
            <input type="submit" name="submit" value="login"></p>
            </div>
        </form>

        </section>
        </div>
    </body>
</html>
