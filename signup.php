<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>sign up</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
    </head>
    <body>
        <div id="wrapper">
            <nav id="nav">
                <?PHP
                    echo "
                        <ul>
                            <li><a href='index.php'>Home</a></li>&emsp;&emsp;
                            <li><a href='signup.php'>signup</a></li>&emsp;
                            <li><a href='login.php'>login</a></li>
                        </ul>
                    ";
                ?>
            </nav>
            <h1 style="text-align:center; margin-top: 1em;">Registration</h1>
            <section id="main">
                <form action="requests/signupSubmit.php" method="post">
                    <p>login name:
                        <div class="field">
                            <input type="text" name="name">
                        </div>
                    </p>
                    <p>password:             
                        <div class="field">
                            <input type="text" name="password">
                        </div>
                    </p>
                    <p>
                        <div class="field">
                            <input type="submit" name="submit" value="registration">
                        </div>
                    </p>
                </form>
            </section>
        </div>
    </body>
</html>