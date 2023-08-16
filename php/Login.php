<?php

    session_start();
?>

<html>
<head>
<title>Login</title>
   <link rel="stylesheet" type="text/css" href="../css/style.css">
  
<body>
      <div class="loginbox">
        <img src="../photos/A_S-removebg-preview.png" class="avatar">
         <h1>Login Here</h1>
         <form action="sendLoginInfo.php" method="post">
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username">
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Passward">
            <input type="submit"  value="Login">
         </form>
         <?php if(isset($_GET["error"])) { ?>
            <p class="errorMsg" style="color: #07ff5a; font-weight: bolder;  font-size:large; margin-top: 5px;"> <?php print($_GET["error"]); ?></p> 
         <?php } ?>
      </div>
</body>
</head>
</html>