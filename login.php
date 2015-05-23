<!--
  Created by Ivan on 5/03/15.
  Student #  - c00185055
  Course: Software Development

    Purpose: to provide user option to enter his username and password
 -->
<?php
?>
<html>
<head>
    <meta charset="UTF-8">
    <link href="css/reset.css" rel="stylesheet" type="text/css">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <title>Holiday Accommodation System</title>
</head>
<body>
<div id="wrapper">
    <div id="user_form">
        <form action="loginCheck.php" method="post">
            <div id="form">
                <div id="inputs">
                 <label>User Name:</label>
                <input type="text" name="username" id="name" placeholder="Username">
                <br><br><br>
                <br>
                <label>Password</label>
                <input type="password" name="password" id="pass" placeholder="Password"><br>
                </div>
            </div>
            <div class="check">
                <button type="submit" class="submit" >Login</button>
            </div>
        </form>
    </div>
</div>
<script>
    // Google Analytics Script
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-59764083-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>