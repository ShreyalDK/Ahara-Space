<?php

session_start();

unset($_SESSION["usernameD"]);


if(!isset($_SESSION["usernameA"]) && !isset($_SESSION["usernameW"])){
    session_unset();

    session_destroy();
}


header("Location: Login.php");
?>