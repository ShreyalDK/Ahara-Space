<?php 
    session_start();
    $con = mysqli_connect("localhost","root","");
    if(!$con){
        print("fail".mysqli_connect_error());
    }

    mysqli_select_db($con,"ahara_space_db");

    $orderItemId = $_POST["orderItemId"];

    $status = 1;


    $sqlUOrdItem = "UPDATE order_item SET status ='$status' WHERE id='$orderItemId'";

    mysqli_query($con,$sqlUOrdItem);

    mysqli_close($con);
    header("Location: waiterPage.php");
    exit();
?>