<?php 
    session_start();
    $con = mysqli_connect("localhost","root","");
    if(!$con){
        print("fail".mysqli_connect_error());
    }

    mysqli_select_db($con,"ahara_space_db");

    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $cusPhone = validate($_POST["cusPhone"]);
    $cusName = validate($_POST["cusName"]);
    $cusEmail = validate($_POST["cusEmail"]);
    $type = validate($_SESSION["typeI"]);
    $staffId = validate($_SESSION["staffIdW"]);
    $flag = 0;

    if(!preg_match('/^(\+91[\-\s]?)?[0]?(91)?[789]\d{9}$/',$cusPhone)){
        header("Location: waiterPage.php?error=Phone Number not valid");
        exit();
    }

    $sqlQCus = "select * from customer";
    $resultQCus = mysqli_query($con,$sqlQCus);

    while(($row = mysqli_fetch_array($resultQCus))){
        if($row["cutomer_phone"]== $cusPhone){
            $flag = 1;
        }
    }

    if($flag == 0){
        $sqlICus = "INSERT INTO customer(cutomer_phone,customer_name,email) values ('$cusPhone', '$cusName','$cusEmail')"; 
        try{
            mysqli_query($con,$sqlICus);
        }
        catch(Exception $e){
            header("Location: waiterPage.php?error=customer");
            exit();
        }
    
    }

    $orderId = uniqid('ord');

    $sqlIOrd = "INSERT INTO  orders(order_id,staff_id,type) values ('$orderId','$staffId','$type')";

     try{
        mysqli_query($con,$sqlIOrd);
     }
     catch(Exception $e){
        header("Location: waiterPage.php?error=order");
         exit();
     }

    $_SESSION["orderIdI"] = $orderId;
    $_SESSION["cusPhoneI"] = $cusPhone;

    date_default_timezone_set('Asia/Kolkata');
    $time = date("Y-m-d h:i:sa");

    $sqlIFeed = "INSERT INTO feed(order_id,customer_phone,customer_name,staff_id,time) values ('$orderId','$cusPhone','$cusName','$staffId','$time')";

    mysqli_query($con,$sqlIFeed);
    

    mysqli_close($con);
    header("Location: waiterPage.php");
    exit();
?>