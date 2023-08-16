<?php 
    session_start();
    $con = mysqli_connect("localhost","root","");
    if(!$con){
        print("fail".mysqli_connect_error());
    }

    mysqli_select_db($con,"ahara_space_db");
    // use get method for order id
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waiter</title>
    <link rel="stylesheet" type="text/css" href="../css/waiterPageOnlineCss.css">
    <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
                    <p class="headerP">Waiter</p>
                    <?php 
                        if(isset($_SESSION["usernameW"])){
                            $username = $_SESSION["usernameW"];
                            ?>
                            <p class="username headerP"><a href='logoutWaiter.php' class="logoutA" onclick ='showAlert();'><span class="greenAcc">:</span> <?php echo"$username"; ?></a></p>
                            <?php
                        }
                        else{
                            header("Location: Login.php");
                        }
                    ?>
                    <br>
                    <a href="waiterPage.php" class="navAI">In-house Order</a>
                    <a href="" class="navAO">Online Order</a>
                </nav>

            </div>
    </header>
        <div class="row">
                    <form action="createOrderOnline.php" method="post" style="text-align:center; margin-top:20px;">
                        </select>
                        <label style="margin-left:20px;">Customer Phone<span class="greenAcc" >:</span> </label>
                        <input type="text" name="cusPhone" style="margin-right:20px;">

                        <label style="margin-left:20px;">Customer Name<span class="greenAcc">:</span> </label>
                        <input type="text" name="cusName" style="margin-right:20px;">

                        <br>

                        <label style="margin-left:145px; margin-top: 20px;">Customer Address<span class="greenAcc">:</span> </label>
                        <input type="text" name="cusAddress" style="margin-right:20px;">

                        <label style="margin-left:20px; margin-top: 20px;">Customer Email<span class="greenAcc">:</span> </label>
                        <input type="text" name="cusEmail" style="margin-right:20px;">
                        
                        <?php $_SESSION["typeO"] = "online"; ?>
                    
                        <input type="submit" value="Make Order" style="margin-left:20px; border: none; padding: 4px; margin-top: 20px;" class="bg-success rounded text-white">

                    </form>
        </div>

        <?php if(isset($_GET["error"])) { ?>
                                <p class="errorMsg"> <?php print($_GET["error"]); ?> </p> 
                            <?php } 
        ?>

        <?php
            
            if(isset($_SESSION["orderIdO"]))
            {
                $orderId = $_SESSION["orderIdO"];
        ?>
                    <h5 class="orderIdDisp" style="margin-top:20px;">Order Id<span class="greenAcc"> : <?php echo "$orderId"; ?></span></h5>
                    <div class="row">
                        <div class="col-sm-6">
                        <h3>Menu<span class="greenAcc">:</span></h3>
                        <table class="table table-success table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">Item id</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                        $query = "select * from menu";
                                        $result = mysqli_query($con,$query);
                                        while($row = mysqli_fetch_array($result)){
                                            $itemId = $row['item_id'];
                                            $itemName = $row['item_name'];
                                            $itemPrice = $row['price'];
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo"$itemId"; ?></th>
                                                <td><?php echo"$itemName"; ?></td>
                                                <td><?php echo"$itemPrice"; ?></td>
                                                <td><form action='addItemOnline.php?orderId=<?php echo "$orderId"; ?>' method="post">
                                                    Quntity:<input type="text" name="qty" style="width:40px; background: transparent; border: none; border-bottom:1px solid;">
                                                    <button type="submit" name="itemId" value="<?=$itemId;?>" class="btn btn-success btn-sm" style="margin-left:15px;" >Add</button>
                                                </form></td>
                                            </tr>
                                            <?php
                                        }
                                ?>
                                </tbody>
                                </table>
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <h3>Pending Orders<span class="greenAcc">:</span></h3>
                                <table class="table table-success table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            $query = "select * from order_item where status=0 and order_id='$orderId'";
                                            $result = mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($result)){
                                                $orderItemId = $row['id'];
                                                $orderItemName = $row['item_name'];
                                                $orderItemQty = $row['quantity'];
                                                $orderItemPrice = $row['price'];
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo"$orderItemName"; ?></th>
                                                    <td><?php echo"$orderItemQty"; ?></td>
                                                    <td><?php echo"$orderItemPrice"; ?></td>
                                                    <td><form action='updateStatusItemOnline.php' method="post">
                                                        <button type="submit" name="orderItemId" value="<?=$orderItemId;?>" class="btn btn-success btn-sm font-weight-bold">Delivered</button>
                                                    </form></td>
                                                </tr>
                                                <?php
                                            }
                                    ?>
                                    </tbody>
                                    </table>
                            </div>

                            <div class="row">
                                <h3>Completed Orders<span class="greenAcc">:</span></h3>
                            <table class="table table-success table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                            $query = "select * from order_item where status=1 and order_id='$orderId'";
                                            $result = mysqli_query($con,$query);
                                            while($row = mysqli_fetch_array($result)){
                                                $orderItemId = $row['id'];
                                                $orderItemName = $row['item_name'];
                                                $orderItemQty = $row['quantity'];
                                                $orderItemPrice = $row['price'];
                                                ?>
                                                <tr>
                                                    <th scope="row"><?php echo"$orderItemName"; ?></th>
                                                    <td><?php echo"$orderItemQty"; ?></td>
                                                    <td><?php echo"$orderItemPrice"; ?></td>
                                                </tr>
                                                <?php
                                            }
                                    ?>
                                    </tbody>
                                    </table>
                            </div>

                            <div class="row" style="margin-top:15px; text-align: center;">

                               <?php
                                $sqlQOrdBillAmt = "select bill_amt from orders where order_id='$orderId'";

                                $resultOrdBillAmt = mysqli_query($con,$sqlQOrdBillAmt);

                                $rowOrdBillAmt = mysqli_fetch_array($resultOrdBillAmt);

                                $OrdBillAmt = $rowOrdBillAmt["bill_amt"];
                                ?>
                                <h5 style="display: inline;">Total Amount<span class="greenAcc">: </span><?php echo "$OrdBillAmt"; ?></h5>

                                
                                <form action='updateStatusOrderOnline.php' method="post">
                                    <button type="submit" name="orderId" value="<?=$orderId;?>" class="btn btn-success btn-sm" style="width:60%; margin: auto; " >Complete Order</button>
                                </form>
                        
                            </div>
                        </div>
                    </div>

        <?php  
             }
             else{
        ?>
            <p class="noOrderId">Please Enter Above Details to start Order</p>
        <?php
             }
        ?>
    </div>
</body>
</html>