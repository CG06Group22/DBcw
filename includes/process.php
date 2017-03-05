<?php
  include '../db/dbh.php';
  session_start();

  if (isset($_POST['submit'])) {
    $user = $_SESSION['first'];
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // date_default_timezone_set('Europe/London');
    // $time = date('h:i:s a', time());

    if (!isset($user) || $user == '' || !isset($message) || $message == '') {
      $error = "Please fill in your name and a message";
      header("Location: groupChat.php?error=" . urlencode($error));
      exit();
    }
    else {
      $uid = $_SESSION['uid'];
      $gid = $_SESSION['gid'];
      $query = "INSERT INTO messages (uid, gid, content) 
                VALUES ('$uid', '$gid', '$message')";
      if (!mysqli_query($conn, $query)) {
        die('Error: Cannot insert messages' . mysqli_error($conn));
      }
      else {
        header('Location: ../sandbox/groupChat.php?'$gid'');
        exit();
      }
    }
  }
?>
