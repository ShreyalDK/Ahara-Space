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

    <title>Menu Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?> 

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Menu Add 
                            <a href="index1.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code1.php" method="POST">

                       <div class="mb-3">
                                <label>Item Id</label>
                                <input type="text" name="id" class="form-control">
                            </div> 
                            <div class="mb-3">
                                <label>Item Name</label>
                                <input type="text" name="item_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Price</label>
                                <input type="text" name="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_item" class="btn btn-success">Save Item</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>