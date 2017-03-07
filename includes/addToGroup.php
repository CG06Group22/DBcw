<?php
include '../db/dbh.php';

if(isset($_GET['u']) && !empty($_GET['u']) AND isset($_GET['g']) && !empty($_GET['g'])){
	$uemail = $_GET['u'];
	$gid = $_GET['g'];
	$sqlid = "SELECT uid FROM users WHERE email = $uemail";
	$uidresult = mysqli_query($conn, $sqlid);
	if (!$uidrow = mysqli_fetch_assoc($uidresult)){
        $uid = $uidrow['uid'];
    }

	$sql = "INSERT INTO usersgroup ( uid, gid ) VALUES ('$uid', '$gid')";
	$result = mysqli_query($conn, $sql);
}



header("Location: ../sandbox/chat.php");

?>