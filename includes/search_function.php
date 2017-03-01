<?php
include '../db/dbh.php';

//搜索框输入的文字
$searchs = $_POST['search'];
//勾选的 checkbox
$checkbox_select = $_POST['checkbox'];

if ($checkbox_select == "friends"){
//当 checkbox 勾选的是 friends 时
	$sql="SELECT * FROM blog
	WHERE title like ‘%$search%’";
	$result = mysqli_query($conn, $sql);
} else ($checkbox_select =="articles"){
//当 checkbox 勾选的是  articles 时
	$sql="SELECT * FROM users WHERE firstName OR lastName LIKE '%$search%'";
	$result = mysqli_query($conn, $sql);
}
?>