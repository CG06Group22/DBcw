<?php

include '../db/dbh.php';
session_start();
$guest = $_SERVER['QUERY_STRING'];
$host = $_SESSION['email'];

$sql = "DELETE FROM relationship  WHERE (hostUserID='{$host}' AND guestUserID='{$guest}')";
$result = mysqli_query($conn, $sql);

$sql1 = "DELETE FROM relationship  WHERE  (hostUserID='{$guest}' AND guestUserID='{$host}')";
$result1 = mysqli_query($conn, $sql1);

header("Location: ../sandbox/profile.php?deleteF");


?>