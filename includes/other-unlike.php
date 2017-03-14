<?php
  include '../db/dbh.php';
  session_start();

  $_SERVER['QUERY_STRING'];
  $pid = $_SERVER['QUERY_STRING'];

  $uid = $_SESSION['otheruid'];
      
      $query = "DELETE FROM photoanotations WHERE uid='$uid' AND pid='$pid'";
      if (!mysqli_query($conn, $query)) {
        die('Error: Cannot delete photoanotations' . mysqli_error($conn));
      } else {
        header('Location: ../sandbox/others-photo.php');
        exit();
      }
    
?>