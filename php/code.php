<?php
require 'connection.php';

if(isset($_POST['delete_staff']))
{
    $staffs_id = mysqli_real_escape_string($conn, $_POST['delete_staff']);

    $query = "DELETE FROM staff WHERE staff_id='$staffs_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Staff Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Staff Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_staff']))
{
    $staffs_id = mysqli_real_escape_string($conn, $_POST['staff_id']);

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);

    $query = "UPDATE staff SET  name='$name', role='$role', age='$age', username='$user_name',password='$password'  WHERE staff_id='$staffs_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Staff Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Staff Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_staff']))
{
    $staff_id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $age= mysqli_real_escape_string($conn, $_POST['age']);
    $user_name= mysqli_real_escape_string($conn, $_POST['user_name']);
    $password= mysqli_real_escape_string($conn, $_POST['password']);

    $query = "INSERT INTO staff (staff_id,name,role,age,username,password) VALUES ('$staff_id','$name','$role','$age','$user_name','$password')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Staff Created Successfully";
        header("Location: create staff.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "staff Not Created";
        header("Location: create staff.php");
        exit(0);
    }
}

?>