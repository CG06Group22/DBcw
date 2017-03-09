<?php
// from: <a href='../includes/addToGroup.php?u=$guestUserID&g=$gid'>
include '../db/dbh.php';

if(isset($_SERVER['QUERY_STRING']) && !empty($_SERVER['QUERY_STRING'])){
	$uid = $_GET['u'];
	$gid = $_GET['g'];

	$sql = "INSERT INTO usersgroup ( uid, gid ) VALUES ('$uid', '$gid')";
	$result = mysqli_query($conn, $sql);
}

header("Location: ../sandbox/chat.php");

?>