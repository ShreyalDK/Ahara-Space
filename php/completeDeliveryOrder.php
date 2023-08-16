<?php

session_start();
$con = mysqli_connect("localhost","root","");
if(!$con){
    print("fail".mysqli_connect_error());
}

mysqli_select_db($con,"ahara_space_db");

$orderId = $_POST["orderId"];

$status= 1;

$sqlUOrdS = "UPDATE orders SET status ='$status' WHERE order_id='$orderId'";

$sqlUFS = "UPDATE feed SET status ='$status' WHERE order_id='$orderId'";

$sqlUOrdDS = "UPDATE orders SET delivery_status ='$status' WHERE order_id='$orderId'";

mysqli_query($con,$sqlUOrdS);
mysqli_query($con,$sqlUOrdDS);
mysqli_query($con,$sqlUFS);

$sqlOrdBillAmt = "select bill_amt from orders WHERE order_id='$orderId'";
$resultOrdBillAmt = mysqli_query($con,$sqlOrdBillAmt);

$rowOrdBillAmt = mysqli_fetch_array($resultOrdBillAmt);

$ordBillAmt = $rowOrdBillAmt["bill_amt"];

$sqlQFC = "select customer_phone from feed where order_id='$orderId'";
$resultQFC = mysqli_query($con,$sqlQFC);


$rowQFC = mysqli_fetch_array($resultQFC);
$cusPhone = $rowQFC["customer_phone"];

$sqlSCusName = "select customer_name from customer where cutomer_phone='$cusPhone'"; 

$sqlSCusEmail = "select email from customer where cutomer_phone='$cusPhone'"; 

$resultCusName = mysqli_query($con,$sqlSCusName);

$rowCusName = mysqli_fetch_array($resultCusName);

$cusName = $rowCusName["customer_name"];

$resultCusEmail = mysqli_query($con,$sqlSCusEmail);

$rowCusEmail = mysqli_fetch_array($resultCusEmail);

$cusEmail = $rowCusEmail["email"];

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

mysqli_close($con);

header("Location: deliveryPage.php");

exit();


?>