<!doctype html>
<html>
<head>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css?<?php echo time(); ?>" />
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
         <li><a href="snippet.php?userID='.$a.'">snippet</a></li>&emsp;&emsp;
         <li><a href="upload.php?userID='.$a.'">upload</a></li>
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

        <?php
            include('requests/dbConn.php');
            $query="
                SELECT u.loginname, s.userID, s.time, s.text 
                FROM snippets s, user u 
                WHERE s.userID = u.id
                AND (userID, time) IN ( 
                    SELECT userID, MAX(time) AS time
                    FROM snippets 
                    GROUP BY userID 
                )
            ";
            $result=mysql_query($query, $con);
            if (!$result)
            {
                die('Error: ' . mysql_error());
            }

            $num=mysql_numrows($result);
            mysql_close();

        ?>


		<section id="main">

            <table border="0" cellspacing="2" cellpadding="2">
		        <tr>
		            <td>
		                <font face="Arial, Helvetica, sans-serif">Username&emsp;&emsp;</font>
		            </td>
		            <td>
		                <font face="Arial, Helvetica, sans-serif">Last snippet&emsp;&emsp;</font>
		            </td>
		            <td>
		                <font face="Arial, Helvetica, sans-serif">Link to snippets&emsp;&emsp;</font>
		            </td>
		            <td>
		                <font face="Arial, Helvetica, sans-serif">Link to files</font>
		            </td>
		        </tr>
		        <?php
		            $i=0;
		            while ($i < $num)
		            {
				$f4="\"http://178.62.6.69/unsafe/upload.php?userID=".mysql_result($result,$i,"userID")."\"";
		                $f3="\"http://178.62.6.69/unsafe/snippet.php?userID=".mysql_result($result,$i,"userID")."\"";
		                $f2=mysql_result($result,$i,"text");
		                $f1=mysql_result($result,$i,"loginname");
		        ?>
		        <tr>
		            <td>
		                <?php echo $f1; ?>
		            </td>
		            <td>
		                <?php echo $f2; ?>
		            </td>
		            <td>
		                <a href=<?php echo $f3; ?>>link</a>
		            </td>
		            <td>
		                <a href=<?php echo $f4; ?>>link</a>
		            </td>
		        </tr>
		        <?php
		                        $i++;
		                }
		        ?>
       		 </table>
        </section>
    </body>
</html>
