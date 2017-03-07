<?php

include '../db/dbh.php';
session_start();
$aid = $_SERVER['QUERY_STRING'];


$sql = "DELETE FROM articles  WHERE (aid='{$aid}')";
$result = mysqli_query($conn, $sql);

header("Location: ../sandbox/blog.php?delete-a");


?>