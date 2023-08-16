<?php

session_start();

unset($_SESSION["usernameA"]);


if(!isset($_SESSION["usernameD"]) && !isset($_SESSION["usernameW"])){
    session_unset();

    session_destroy();
}


header("Location: Login.php");
?>