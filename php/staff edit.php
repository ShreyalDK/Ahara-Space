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

    <title>Staff Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Staff Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $staffs_id = mysqli_real_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM staff WHERE staff_id='$staffs_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $staff = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="staff_id" value="<?= $staff['staff_id']; ?>">

                               <!--     <div class="mb-3">
                                        <label>Staff_ID</label>
                                        <input type="text" name="id" value="<?=$staff['staff_id'];?>" class="form-control">
                                    </div> -->

                                    <div class="mb-3">
                                        <label>Name</label>
                                        <input type="text" name="name" value="<?=$staff['name'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Role</label>
                                        <input type="text" name="role" value="<?=$staff['role'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Age</label>
                                        <input type="text" name="age" value="<?=$staff['age'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Username</label>
                                        <input type="text" name="user_name" value="<?=$staff['username'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Password</label>
                                        <input type="text" name="password" value="<?=$staff['password'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_staff"  class="btn btn-success">
                                            Update Staff
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