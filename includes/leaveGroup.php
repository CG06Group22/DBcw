<?php
// from: <a href='../includes/leaveGroup.php?g=$gid'>
include '../db/dbh.php';
session_start();
$uid = $_SESSION['uid'];

if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])){
    $gid = $_GET['g'];

    $sql = "DELETE FROM usersgroup WHERE uid = '$uid' AND gid = '$gid'";
    $result = mysqli_query($conn, $sql);
}

header("Location: ../sandbox/chat.php");

?>