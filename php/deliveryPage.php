<?php 
    session_start();
    $con = mysqli_connect("localhost","root","");
    if(!$con){
        print("fail".mysqli_connect_error());
    }

    mysqli_select_db($con,"ahara_space_db");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../css/deliveryPageCss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Delivery</title>
    <script>
    function showAlert()
    {
    alert('you have logged out');
    }
</script>
</head>
<body>
    <div class="container">

        <header>

            <div class="container">

                <nav>
                    <div id="logo"><a href="" title="Return Home">AS</a></div>
                    <p class="headerP">Delivery</p>
                    <?php 
                        if(isset($_SESSION["usernameD"])){
                            $username = $_SESSION["usernameD"];
                            ?>
                            <p class="username headerP"><a href='logoutDelivery.php' class="logoutA" onclick ='showAlert();'><span class="greenAcc">:</span> <?php echo"$username"; ?></a></p>
                            <?php
                        }
                        else{
                            header("Location: Login.php");
                        }
                    ?>
                </nav>

            </div>
    </header>

    <div class="row" style="margin-top: 50px;">

        <div class="col-sm-6">
            <h3>Available Orders<span class="greenAcc">:</span></h3>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                    <th scope="col">Order-id</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Staff-Incharge</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        $sqlQOrdD = "select * from orders where status=2";
                        $result = mysqli_query($con,$sqlQOrdD);
                        while($row = mysqli_fetch_array($result)){
                            $orderId = $row['order_id'];
                            $staffId = $row['staff_id'];
                            $sqlQFC = "select customer_phone from feed where order_id='$orderId'";
                            $resultQFC = mysqli_query($con,$sqlQFC);


                            $rowQFC = mysqli_fetch_array($resultQFC);
                            $cusPhone = $rowQFC["customer_phone"];

                            $sqlSCusName = "select customer_name from customer where cutomer_phone='$cusPhone'"; 

                            $sqlSCusEmail = "select email from customer where cutomer_phone='$cusPhone'"; 

                            $sqlSCusAddress = "select address from customer where cutomer_phone='$cusPhone'"; 

                            $resultCusName = mysqli_query($con,$sqlSCusName);

                            $rowCusName = mysqli_fetch_array($resultCusName);


                            $cusName = $rowCusName["customer_name"];

                            $resultCusEmail = mysqli_query($con,$sqlSCusEmail);

                            $rowCusEmail = mysqli_fetch_array($resultCusEmail);

                            $cusEmail = $rowCusEmail["email"];

                            $resultCusAddress = mysqli_query($con,$sqlSCusAddress);

                            $rowCusAddress = mysqli_fetch_array($resultCusAddress);

                            $cusAddress = $rowCusAddress["address"];

                            $_SESSION["email"] = $cusEmail;

                            $sqlQSN = "select name from staff where staff_id='$staffId'";
                            $resultStaffName = mysqli_query($con,$sqlQSN);

                            $rowStaffName = mysqli_fetch_array($resultStaffName);

                            $staffName = $rowStaffName["name"];


                            ?>
                            <tr>
                                <th scope="row"><?php echo"$orderId"; ?></th>
                                <td><?php echo"$cusName<br>$cusPhone<br>$cusEmail<br>Address<span class='greenAcc'>:</span><br>$cusAddress"; ?></td>
                                <td><?php echo"$staffId-<br>$staffName"; ?></td>
                                <td><form action='acceptDeliveryOrder.php' method="post">
                                    <button type="submit" name="orderId" value="<?=$orderId;?>" class="btn btn-success btn-sm" style="margin-left:15px;" >Accept</button>
                                </form></td>
                            </tr>
                            <?php
                        }
                ?>
                </tbody>
                </table>
        </div>
        
        <div class="col-sm-6">
                
        <h3>Your Current Orders<span class="greenAcc">:</span></h3>
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                    <th scope="col">Order-id</th>
                    <th scope="col">Customer</th>
                    <th scope="col">Staff-Incharge</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                        $sqlQOrdD = "select * from orders where status=3";
                        $result = mysqli_query($con,$sqlQOrdD);
                        while($row = mysqli_fetch_array($result)){
                            $orderId = $row['order_id'];
                            $staffId = $row['staff_id'];
                            $sqlQFC = "select customer_phone from feed where order_id='$orderId'";
                            $resultQFC = mysqli_query($con,$sqlQFC);


                            $rowQFC = mysqli_fetch_array($resultQFC);
                            $cusPhone = $rowQFC["customer_phone"];

                            $sqlSCusName = "select customer_name from customer where cutomer_phone='$cusPhone'"; 

                            $sqlSCusEmail = "select email from customer where cutomer_phone='$cusPhone'"; 

                            $sqlSCusAddress = "select address from customer where cutomer_phone='$cusPhone'"; 

                            $resultCusName = mysqli_query($con,$sqlSCusName);

                            $rowCusName = mysqli_fetch_array($resultCusName);


                            $cusName = $rowCusName["customer_name"];

                            $resultCusEmail = mysqli_query($con,$sqlSCusEmail);

                            $rowCusEmail = mysqli_fetch_array($resultCusEmail);

                            $cusEmail = $rowCusEmail["email"];

                            $resultCusAddress = mysqli_query($con,$sqlSCusAddress);

                            $rowCusAddress = mysqli_fetch_array($resultCusAddress);

                            $cusAddress = $rowCusAddress["address"];

                            $_SESSION["email"] = $cusEmail;

                            $sqlQSN = "select name from staff where staff_id='$staffId'";
                            $resultStaffName = mysqli_query($con,$sqlQSN);

                            $rowStaffName = mysqli_fetch_array($resultStaffName);

                            $staffName = $rowStaffName["name"];


                            ?>
                            <tr>
                                <th scope="row"><?php echo"$orderId"; ?></th>
                                <td><?php echo"$cusName<br>$cusPhone<br>$cusEmail<br>Address<span class='greenAcc'>:</span><br>$cusAddress"; ?></td>
                                <td><?php echo"$staffId-<br>$staffName"; ?></td>
                                <td><form action='completeDeliveryOrder.php' method="post">
                                    <button type="submit" name="orderId" value="<?=$orderId;?>" class="btn btn-success btn-sm" style="margin-left:15px;" >Complete</button>
                                </form></td>
                            </tr>
                            <?php
                        }
                ?>
                </tbody>
                </table>

        </div>
        

    </div>

    </div>
</body>
</html>