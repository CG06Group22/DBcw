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


    $sqlGetId = "SELECT max(gid) FROM groups";
    $resultGetId = mysqli_query($conn, $sqlGetId);

    if ($row = mysqli_fetch_assoc($resultGetId)){
        $gid = $row['gid'];
        $sql1 = "INSERT INTO usersgroup ( uid, gid ) VALUES ('$uid', '$gid')";
        $result = mysqli_query($conn, $sql1);
    }
}

?>