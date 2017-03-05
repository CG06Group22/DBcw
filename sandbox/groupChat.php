<?php 
include '../db/dbh.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Group Chat</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>
  <body>
    <?php
      include("../component/header.php");
    ?>
    <?php 
      $_SERVER['QUERY_STRING'];
      $groupid = $_SERVER['QUERY_STRING'];
      //$groupid = $_GET['id'];
      //$groupName = $_GET['name']
      $groupName = "TestName";
      $query = "SELECT * FROM messages WHERE gid = '$groupid' ORDER BY messageid DESC";
      $messages = mysqli_query($conn, $query);
    ?>
    <div id="container">
      <header>
        <h1><?php echo $groupName; ?></h1>
      </header>
      <a href="../sandbox/chat.php">Back</a>
      <div id="messages" class="container">
        
      </div>
      <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="includes/process.php">
          <!-- <input type="text" id="user" name="user" placeholder="Enter Your Name"/> -->
          <input type="text" id="newmessage" name="message" placeholder="Enter A Message"/>
          <input id="show-btn" type="submit" name="submit" value="Send"/>
        </form>
      </div>
    </div>
  </body>
</html>
