<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Staff Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?> 

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Staff Add 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                           <div class="mb-3">
                                <label>Staff Id</label>
                                <input type="text" name="id" class="form-control">
                            </div> 

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Role</label>
                                <input type="text" name="role" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Age</label>
                                <input type="text" name="age" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="user_name" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_staff" class="btn btn-success">Save Staff</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                    <img src="..\photos\whatsappR.jpeg" alt="add to whatsapp group">
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>