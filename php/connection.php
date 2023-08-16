<?php 
    session_start();
    $conn = mysqli_connect("localhost","root","");
    if(!$conn){
        print("fail".mysqli_connect_error());
    }

    mysqli_select_db($conn,"ahara_space_db");
 ?>