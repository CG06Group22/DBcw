<?php
include '../db/dbh.php';
session_start();
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
      $_SESSION['gid'] = $groupid;
      $querynames = "SELECT groupName FROM groups WHERE gid = '$groupid'";
      $names = mysqli_query($conn, $querynames);
      $namerow = mysqli_fetch_assoc($names);
      $groupName = $namerow['groupName'];
      $query = "SELECT * FROM messages WHERE gid = '$groupid' ORDER BY messageid ASC";
      $messages = mysqli_query($conn, $query);
    ?>

      <header>
        <div class="container">
                <h1><?php echo $groupName; ?></h1>
        </div>
      </header>

      <section>
        <div class="container">
          <a href="../sandbox/chat.php">Back</a>
        </div>
      </section>

      <section>
        <div id="messages" class="container">
          <ul>
            <?php while($row = mysqli_fetch_assoc($messages)){ ?>
              <li class="message">
                <span><?php
                  echo $row['sendTime'];
                  $content = $row['content'];
                  $uid = $row['uid'];
                ?> - </span>
                <strong>
                <?php
                  $que = "SELECT firstName,lastName FROM users WHERE uid = '$uid'";
                  $name = mysqli_query($conn, $que);
                  if($namerow = mysqli_fetch_assoc($name)){
                    $fullName2 = $namerow['firstName'] ." ". $namerow['lastName'];
                    echo $fullName2;
                  }
                ?>
                </strong>
                : <?php echo $content; ?>
              </li>
            <?php } ?>
          </ul>
        </div>
      </section>

  <section>
      <div id="input" class="container">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="../includes/process.php">
          <!-- <input type="text" id="user" name="user" placeholder="Enter Your Name"/> -->
          <input type="text" id="newmessage" name="message" placeholder="Enter A Message"/>
          <input id="show-btn" type="submit" name="submit" value="Send"/>
        </form>
      </div>
    </section>



  </body>
</html>
