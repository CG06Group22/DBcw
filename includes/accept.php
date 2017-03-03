<?php

include '../db/dbh.php';
session_start();
$guest = $_SERVER['QUERY_STRING'];
$host = $_SESSION['email'];
$friend = "friend";

$sql = "UPDATE relationship SET relationship='{$friend}' WHERE  (hostUserID='{$host}' AND guestUserID='{$guest}')";
$result = mysqli_query($conn, $sql);

$sql1 = "UPDATE relationship SET relationship='{$friend}' WHERE  (hostUserID='{$guest}' AND guestUserID='{$host}')";
$result1 = mysqli_query($conn, $sql1);
header("Location: ../sandbox/profile.php?accept");


?>