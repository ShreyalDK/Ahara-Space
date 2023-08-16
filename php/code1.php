<?php
require 'connection.php';

if(isset($_POST['delete_item']))
{
    $items_id = mysqli_real_escape_string($conn, $_POST['delete_item']);

    $query = "DELETE FROM menu WHERE item_id='$items_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Item Deleted Successfully";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Item Not Deleted";
        header("Location: index1.php");
        exit(0);
    }
}

if(isset($_POST['update_item']))
{
    $items_id = mysqli_real_escape_string($conn, $_POST['update_item']);

    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $query = "UPDATE menu SET  item_name='$item_name', price='$price'  WHERE item_id='$items_id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Item Updated Successfully";
        header("Location: index1.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Staff Not Updated";
        header("Location: index1.php");
        exit(0);
    }

}


if(isset($_POST['save_item']))
{
    $items_id = mysqli_real_escape_string($conn, $_POST['id']);
    $item_name = mysqli_real_escape_string($conn, $_POST['item_name']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    $query = "INSERT INTO menu (item_id,item_name,price) VALUES ($items_id,'$item_name','$price')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Item Created Successfully";
        header("Location: create-menu.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Item Not Created";
        header("Location: create-menu.php");
        exit(0);
    }
}

?>