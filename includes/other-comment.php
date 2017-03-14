<?php
  include '../db/dbh.php';
  session_start();

  if (isset($_POST['submit'])) {
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $pid = mysqli_real_escape_string($conn, $_POST['pid']);


    // date_default_timezone_set('Europe/London');
    // $time = date('h:i:s a', time());

    if (!isset($comment) || $comment == '') {
      $error = "Please fill in a comment";
      header("Location: ../sandbox/photo.php?error=" . urlencode($error));
      exit();
    }
    else {
      $uid = $_SESSION['uid'];
      $query = "INSERT INTO photocomments (uid, pid, content) 
                VALUES ('$uid', '$pid', '$comment')";
      if (!mysqli_query($conn, $query)) {
        die('Error: Cannot insert messages' . mysqli_error($conn));
      }
      else {
        header('Location: ../sandbox/others-photo.php');
        exit();
      }
    }
  }
?>