<?php

include '../db/dbh.php';
session_start ();
$check = $_POST['checkbox'];
$uid = $_SESSION['uid'];
$sql = "UPDATE users SET privacy='{$check}' WHERE  (uid='{$uid}')";
$result = mysqli_query($conn, $sql);
header("Location: ../sandbox/profile-privacy.php?applysuc");

?>