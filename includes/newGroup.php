<?php
session_start();
include '../db/dbh.php';

$groupName = $_POST['groupName'];
$uid = $_SESSION['uid'];

if (empty($groupName)){
    header("Location: ../sandbox/chat.php?error=nameempty");
    exit();
} else {
    $sql = "INSERT INTO groups ( groupName ) VALUES ('$groupName')";
    $insertGroup = mysqli_query($conn, $sql);
    
    $gid = mysqli_insert_id($conn);
    
    $sql1 = "INSERT INTO usersgroup ( uid, gid ) VALUES ('$uid', '$gid')";
    $result = mysqli_query($conn, $sql1);
    header("Location: ../sandbox/chat.php");
}

?>
