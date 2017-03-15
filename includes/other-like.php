<?php
  include '../db/dbh.php';
  session_start();

  $_SERVER['QUERY_STRING'];
  $pid = $_SERVER['QUERY_STRING'];

  $uid = $_SESSION['uid'];
      
      $query = "INSERT INTO photoanotations (uid, pid) 
                VALUES ('$uid', '$pid')";
      if (!mysqli_query($conn, $query)) {
        die('Error: Cannot insert photoanotations' . mysqli_error($conn));
      }
      else {
        header('Location: ../sandbox/others-photo.php');
        exit();
      }
    
?>