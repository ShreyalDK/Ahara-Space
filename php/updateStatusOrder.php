<?php

session_start();
$con = mysqli_connect("localhost","root","");
if(!$con){
    print("fail".mysqli_connect_error());
}

mysqli_select_db($con,"ahara_space_db");

$orderId = $_POST["orderId"];

$status = 1;


$sqlUOrd = "UPDATE orders SET status ='$status' WHERE order_id='$orderId'";

$sqlOrdBillAmt = "select bill_amt from orders WHERE order_id='$orderId'";
$resultOrdBillAmt = mysqli_query($con,$sqlOrdBillAmt);

$rowOrdBillAmt = mysqli_fetch_array($resultOrdBillAmt);

$ordBillAmt = $rowOrdBillAmt["bill_amt"];


$sqlUOrds = "UPDATE orders SET bill_amt= bill_amt + $itemPrice WHERE order_id='$orderId'";

$sqlUFeedBillamt = "UPDATE feed SET bill_amt ='$ordBillAmt' WHERE order_id='$orderId'";

$sqlUFeedStatus = "UPDATE feed SET status ='$status' WHERE order_id='$orderId'";

mysqli_query($con,$sqlUOrd);

mysqli_query($con,$sqlUFeedBillamt);

mysqli_query($con,$sqlUFeedStatus);

$cusPhone = $_SESSION["cusPhoneI"];

$sqlSCusName = "select customer_name from customer where cutomer_phone='$cusPhone'"; 

$sqlSCusEmail = "select email from customer where cutomer_phone='$cusPhone'"; 

$resultCusName = mysqli_query($con,$sqlSCusName);

$rowCusName = mysqli_fetch_array($resultCusName);

$cusName = $rowCusName["customer_name"];

$resultCusEmail = mysqli_query($con,$sqlSCusEmail);

$rowCusEmail = mysqli_fetch_array($resultCusEmail);

$cusEmail = $rowCusEmail["email"];


mysqli_close($con);

unset($_SESSION["orderIdI"]);
unset($_SESSION["typeI"]);
unset($_SESSION["cusPhoneI"]);


$to = "$cusEmail";
$subject = "Ahara Space-Order";

$message = "
<html>
<head>
<title>Ahara Space-Order</title>
</head>
<body>
<p>Hi,$cusName</p>
<p>Thank you for ordering from us-Ahara Space</p>
<p>Bill Amount: $ordBillAmt</p>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <shreyaldkumar84347@gmail.com>' . "\r\n";

mail($to,$subject,$message,$headers);



header("Location: waiterPage.php");

exit();

?>