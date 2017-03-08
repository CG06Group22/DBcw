<?php
// from: <a href='../includes/addToGroup.php?u=$guestUserID&g=$gid'>
include '../db/dbh.php';

if(isset($_REQUEST['u']) && !empty($_REQUEST['u']) AND isset($_REQUEST['g']) && !empty($_REQUEST['g'])){
	$uemail = $_REQUEST['u'];
	$gid = $_REQUEST['g'];
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