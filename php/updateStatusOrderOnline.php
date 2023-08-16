<?php

session_start();
$con = mysqli_connect("localhost","root","");
if(!$con){
    print("fail".mysqli_connect_error());
}

mysqli_select_db($con,"ahara_space_db");

$orderId = $_POST["orderId"];

$status = 2;

$sqlUOrd = "UPDATE orders SET status ='$status' WHERE order_id='$orderId'";

$sqlOrdBillAmt = "select bill_amt from orders WHERE order_id='$orderId'";

$resultOrdBillAmt = mysqli_query($con,$sqlOrdBillAmt);

$rowOrdBillAmt = mysqli_fetch_array($resultOrdBillAmt);

$ordBillAmt = $rowOrdBillAmt["bill_amt"];


$sqlUFeedBillamt = "UPDATE feed SET bill_amt ='$ordBillAmt' WHERE order_id='$orderId'";


mysqli_query($con,$sqlUOrd);

mysqli_query($con,$sqlUFeedBillamt);

mysqli_close($con);

unset($_SESSION["orderIdO"]);
unset($_SESSION["typeO"]);
unset($_SESSION["cusPhoneO"]);


header("Location: waiterPageOnline.php");

exit();

?>