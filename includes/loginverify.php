<?php
session_start();
include '../db/dbh.php';


$uid = $_POST['email'];
$pwd = $_POST['pwd'];
$hash = base64_encode(sha1($pwd, true));

$sql = "SELECT * FROM users WHERE email = '$uid' AND pwd = '$hash'";
$result = mysqli_query($conn, $sql);

if (!$row = mysqli_fetch_assoc($result)){
    echo "Your email or password is incorrect!";
    header("Location: ../index.php?error=incorrect");
} else{

    $_SESSION['first'] = $row['firstName'];
    $_SESSION['last'] = $row['lastName'];
    $_SESSION['gender'] = $row['gender'];
    $_SESSION['email'] = $row['email'];

    $result = mysqli_query("SELECT * FROM users");




    header("Location: ../sandbox/profile.php");
}

?>
