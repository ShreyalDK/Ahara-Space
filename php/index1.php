<?php
    require 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Item|details</title>

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

      <!-- JavaScript Bundle with Popper -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> 
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
  
    <div class="container mt-4" style="margin-bottom:30px;">

        <?php include('message.php'); ?>

        <div class="container">
        <div class" navbar">  
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
                        <h4>Item Details
                            <a href="create-menu.php" class="btn btn-success float-end">Add Item</a>
                        </h4>
                    </div>
                    <div class="card-body bg-success">

                        <table class="table  text-white">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th>Order Frequency</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM menu ";            
                                    $query_run = mysqli_query($conn, $query);   

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $item)
                                        {
                                            $item_id = $item['item_id'];
                                            $sqlQItemFq = "select sum(quantity) from order_item where item_id='$item_id'";
                                            $resultItemFq = mysqli_query($conn,$sqlQItemFq);
                
                                            $rowItemFq = mysqli_fetch_array($resultItemFq);
                
                                            $ItemFq = $rowItemFq["sum(quantity)"];

                                            ?>
                                            <tr>
                                             <td><?= $item['item_id']; ?></td>
                                                <td><?= $item['item_name']; ?></td>
                                                <td><?=$item['price']; ?></td>
                                                <td><?=$ItemFq; ?></td>
                                                <td>
                                                    <a href="edit-menu.php?id=<?= $item['item_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="code1.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_item" value="<?=$item['item_id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
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