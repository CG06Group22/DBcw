<?php
// from: <a href='../includes/addToGroup.php?u=$guestUserID&g=$gid'>
include '../db/dbh.php';

if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])){
	//$query_String = $_SERVER['QUERY_STRING'];
	$uemail = $_GET['u'];
	$gid = $_GET['g'];
	$sqlid = "SELECT uid FROM users WHERE email = $uemail";
	$uidresult = mysqli_query($conn, $sqlid);
	if ($uidrow = mysqli_fetch_assoc($uidresult)){
        $uid = $uidrow['uid'];
    }

	$sql = "INSERT INTO usersgroup ( uid, gid ) VALUES ('$uid', '$gid')";
	$result = mysqli_query($conn, $sql);
}

header("Location: ../sandbox/chat.php?lalala");

?>