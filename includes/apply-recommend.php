<?php

include '../db/dbh.php';
session_start();
$guest = $_SERVER['QUERY_STRING'];
$host = $_SESSION['email'];
$apply = "apply";
$request = "request";
$friend = "friend";


//already friend
$sql0 = "SELECT hostUserID, relationship, guestUserID FROM relationship WHERE relationship = '$friend' AND hostUserID = '$host' AND  guestUserID ='$guest' ";
$result0 = mysqli_query($conn, $sql0);
$resultnum = mysqli_num_rows($result0);
echo $resultnum;
if($resultnum > 0) {
    header("Location: ../sandbox/search_test.php?error=already");
    exit();
}else{
    // already apply
    $sql9 = "SELECT hostUserID, relationship, guestUserID FROM relationship WHERE relationship = '$apply' AND hostUserID = '$host' AND  guestUserID ='$guest' ";
    $result9 = mysqli_query($conn, $sql9);
    $resultnum9 = mysqli_num_rows($result9);
    if($resultnum9 > 0) {
        header("Location: ../sandbox/profile.php?error=apply");
        exit();
    }
    $sql = "INSERT INTO relationship ( hostUserID, relationship, guestUserID) VALUES ( '$host', '$apply','$guest')";
    $result = mysqli_query($conn, $sql);
    $sql1 = "INSERT INTO relationship ( hostUserID, relationship, guestUserID) VALUES ( '$guest', '$request','$host')";
    $result = mysqli_query($conn, $sql1);
    header("Location: ../sandbox/profile.php?applysuc");
}





?>
