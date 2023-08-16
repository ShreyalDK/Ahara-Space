<?php 

    session_start();

    $itemId = $_POST["itemId"];

    $con = mysqli_connect("localhost","root","");
    if(!$con){
        print("fail".mysqli_connect_error());
    }

    mysqli_select_db($con,"ahara_space_db");

    $sqlQItemName = "select item_name from menu where item_id='$itemId'";
    $sqlQItemPrice = "select price from menu where item_id='$itemId'";

    $resultItemName = mysqli_query($con,$sqlQItemName);
    $resultItemPrice = mysqli_query($con,$sqlQItemPrice);

    $rowItemName = mysqli_fetch_array($resultItemName);
    $rowItemPrice = mysqli_fetch_array($resultItemPrice);

    $itemName = $rowItemName["item_name"];
    $itemPrice = $rowItemPrice["price"];

    $qty = intval($_POST["qty"]);

    $itemPrice = $itemPrice * $qty;

    $orderId = $_GET["orderId"];

    $sqlUOrds = "UPDATE orders SET bill_amt= bill_amt + $itemPrice WHERE order_id='$orderId'";

    $sqlIOrdItem = "INSERT INTO order_item(order_id,item_id,quantity,price,item_name) values ('$orderId','$itemId','$qty','$itemPrice','$itemName')";

    //try{
        mysqli_query($con,$sqlIOrdItem);
        mysqli_query($con,$sqlUOrds);
    // }
    //  catch(Exception $e){
    //     header("Location: waiterPage.php?error=orderItem");
    //     exit();
    //  }

    mysqli_close($con);
    header("Location: waiterPageOnline.php");
    exit();

?>