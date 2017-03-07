<?php
session_start();
include '../db/dbh.php';
$title = $_POST['title'];
$uid =$_SESSION['uid'];
$content= htmlspecialchars($_POST['contents']);


if (empty($content)){
    header("Location: ../sandbox/blog/write.php?error=contentempty");
    exit();
}

if (empty($title)){
    header("Location: ../sandbox/blog/write.php?error=titleempty");
    exit();
}
else {

        $sql = "INSERT INTO articles ( uid, title, content) VALUES ( '$uid', '$title','$content')";

        $result = mysqli_query($conn, $sql);

        header("Location: ../sandbox/blog.php?success");

}

?>
