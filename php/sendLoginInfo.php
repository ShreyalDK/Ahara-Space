<?php 

session_start();

$con = mysqli_connect("localhost","root","");
if(!$con){
    print("fail".mysqli_connect_error());
}

mysqli_select_db($con,"ahara_space_db");


function validate($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$username = validate($_POST["username"]);
$password = validate($_POST["password"]);

if(empty($username)){
    header("Location: Login.php?error=Username Field Empty");
    exit();
}
else if(empty($password)){
    header("Location: Login.php?error=Password Field Empty");
    exit();
}

$sql = "select * from staff where username='$username' and password='$password'";

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result) === 1){
    $row = mysqli_fetch_assoc($result);
    if($row["username"] === $username && $row["password"]===$password){

        $role = $row["role"];
        if($role == "admin"){
            $_SESSION["usernameA"] = $row["username"];
            $_SESSION["staffIdA"] = $row["staff_id"];
            header("Location: feed.php"); 
            exit();
        }
        else if($role == "waiter"){
            $_SESSION["usernameW"] = $row["username"];
            $_SESSION["staffIdW"] = $row["staff_id"];
            header("Location: waiterPage.php");
            exit(); 
        }
        else if($role == "delivery"){
            $_SESSION["usernameD"] = $row["username"];
            $_SESSION["staffIdD"] = $row["staff_id"];
            header("Location: deliveryPage.php"); 
            exit();
        }
    }
}
else{
    header("Location: Login.php?error=Incorrect Username or Password");
    exit();
}

?>