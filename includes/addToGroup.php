<?php
include '../db/dbh.php';
$uid = htmlspecialchars($_GET["u"]);
$gid = htmlspecialchars($_GET["g"])

$sql = "INSERT INTO usersgroup ( uid, gid ) VALUES ('$uid', '$gid')";
$result = mysqli_query($conn, $sql);

header("Location: ../sandbox/chat.php");

?>