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

    <title>Menu Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Item Edit 
                            <a href="index1.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $items_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM menu WHERE item_id='$items_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $item = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code1.php" method="POST">
                             
                                    <div class="mb-3">
                                        <label>Item Name</label>
                                        <input type="text" name="item_name" value="<?=$item['item_name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>price</label>
                                        <input type="text" name="price" value="<?=$item['price'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_item" value="<?=$items_id;?>" class="btn btn-success">
                                            Update Item
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                              echo "<h4>No Such Id Found</h4>";
                           }
                      }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>