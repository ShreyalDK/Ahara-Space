<?php

session_start();
$con = mysqli_connect("localhost","root","");
if(!$con){
    print("fail".mysqli_connect_error());
}

mysqli_select_db($con,"ahara_space_db");

$orderId = $_POST["orderId"];

$staffId = $_SESSION["staffIdD"];

$status= 3;

$statusDS= 0;

$sqlUOrdS = "UPDATE orders SET status ='$status' WHERE order_id='$orderId'";

$sqlUOrdDid = "UPDATE orders SET staff_delivery_id  ='$staffId' WHERE order_id='$orderId'";

$sqlUOrdDS = "UPDATE orders SET delivery_status ='$statusDS' WHERE order_id='$orderId'";

$sqlUFDid = "UPDATE feed SET staff_delivery_id ='$staffId' WHERE order_id='$orderId'";

mysqli_query($con,$sqlUOrdS);
mysqli_query($con,$sqlUOrdDid);
mysqli_query($con,$sqlUOrdDS);
mysqli_query($con,$sqlUFDid);

mysqli_close($con);


header("Location: deliveryPage.php");

exit();

?>