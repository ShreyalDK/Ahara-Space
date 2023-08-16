<?php

session_start();

unset($_SESSION["usernameW"]);

if(!isset($_SESSION["usernameD"]) && !isset($_SESSION["usernameA"])){
    session_unset();

    session_destroy();
}


header("Location: Login.php");
?>