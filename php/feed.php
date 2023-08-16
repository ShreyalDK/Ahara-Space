<?php
    require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>


header {
    display: flex;
    background: white;
    width: 100%;
    z-index: 9999;
    /* margin-top:10px ; */
}

header ,header nav {
    padding: 0;
}

header {
    text-align: center;
}

#logo {
    margin: 0;
    padding: 0;
}

#logo a{
    width: 50px;
    height: 50px;
    background: url("../photos/A_S-Logo.png") center center no-repeat;
    display: inline-block;
    text-indent: -9999px ;
}

.headerP {
    display: inline;
    font-size: larger;
    color: black;
    font-size: 20px;
    /* text-shadow: 2px 2px 5px #C6DCE4; */
    font-weight: bolder;
}

.greenAcc {
    color: #07ff5a;
    font-weight: bolder;
}

.logoutA {
    text-decoration: none;
    color: black;
}

.logoutA:hover {
    color: #07ff5a;
}
  </style>

<script>
    function showAlert()
    {
    alert('you have logged out');
    }
</script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

            <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <title>feed|details</title>

  <style>
 ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #000;
}
li {
  float: left;
}
li a {
  display: block;
  color: #6dce46;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li a:hover {
  background-color: #111;
}

  </style>

</head>
<body>
  
<header>

<div class="container">

    <nav>
        <div id="logo"><a href="" title="Return Home">AS</a></div>
        <p class="headerP">Admin</p>
        <?php 
            if(isset($_SESSION["usernameA"])){
                $username = $_SESSION["usernameA"];
                ?>
                <p class="username headerP"><a href='logoutAdmin.php' class="logoutA" onclick ='showAlert();'><span class="greenAcc">:</span> <?php echo"$username"; ?></a></p>
                <?php
            }
            else{
                header("Location: Login.php");
            }
        ?>
        <br>
    </nav>

</div>
</header>

            <div class="container" style="margin-bottom:30px;">


                     <div style="margin-top:20px; ">  
                         <ul>
                            <li><a href="index.php">Staff</a></li>
                            <li><a href="index1.php">Menu</a></li>
                            <li><a href="feed.php">Feed</a></li>
                            </ul>
                    </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Feed Details
                    <!--    <a href="index1.php" class="btn btn-primary float-end">Add Menu</a>
                            <a href="create staff.php" class="btn btn-primary float-end">Add Staff</a>   -->
                        </h4>
                    </div>
                    <div class="card-body bg-success">

                        <table class="table bg-success text-white">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Customer Phone</th>
                                    <th>Customer Name</th>
                                    <th>Bill Amount</th>
                                    <th>Type</th>
                                    <th>Staffs Incahrge</th>
                                    <th>Timestamp</th>
                                    <th>Status</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM feed order by time desc";
                                    $query_run = mysqli_query($conn, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $fee)
                                        {
                                            $status = $fee['status'];
                                            if($status == 1){
                                                $statusR = "Completed";
                                            }
                                            else{
                                                $statusR = "Pending";
                                            }
                                            $staffId = $fee['staff_id'];
                                            $staffDId = $fee['staff_delivery_id'];

                                            $sqlQSN = "select name from staff where staff_id='$staffId'";
                                            $resultStaffName = mysqli_query($conn,$sqlQSN);
                
                                            $rowStaffName = mysqli_fetch_array($resultStaffName);
                
                                            $staffName = $rowStaffName["name"];

                                            $sqlQSND = "select name from staff where staff_id='$staffDId'";
                                            $resultStaffNameD = mysqli_query($conn,$sqlQSND);
                
                                            $rowStaffNameD = mysqli_fetch_array($resultStaffNameD);

                                            if(isset($rowStaffNameD["name"])){
                                                $staffNameD = $rowStaffNameD["name"]; 
                                            }
                                            else{
                                                $staffNameD = "";
                                            }

                                            $orderId = $fee['order_id'];
                                            $sqlQOType = "select type from orders where order_id='$orderId'";
                                            $resultOrdType = mysqli_query($conn,$sqlQOType);
                
                                            $rowOrderType = mysqli_fetch_array($resultOrdType);
                
                                            $ordType = $rowOrderType["type"];

                                        
                                            ?>
                                            <tr>
                                             <td><?= $fee['order_id']; ?></td>
                                                <td><?= $fee['customer_phone']; ?></td>
                                                <td><?= $fee['customer_name']; ?></td>
                                                <td><?= $fee['bill_amt']; ?></td>
                                                <td><?= $ordType; ?></td>
                                                <td><?= $fee['staff_id']; ?>-
                                                    <?= $staffName ?><br>
                                                    <?=  $staffDId?>-
                                                    <?= $staffNameD ?>   
                                                </td>
                                                <td><?= $fee['time']; ?></td>
                                                <td><?= $statusR ?></td> 
                                                
                                               
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    

</body>
</html>