<?php 
    session_start();

    session_unset();

    session_destroy();

    echo '<script type ="text/JavaScript">';  
    echo 'alert("Yoy have been logged out")';  
    echo '</script>';  

    header("Location: Login.php");

?>