<?php include '../db/dbh.php'; ?>
<?php 
  session_start();
  $groupid = $_GET['id'];
  $groupName = $_GET['name']
  $query = "SELECT * FROM messages WHERE gid = '$groupid' ORDER BY messageid DESC";
  $messages = mysqli_query($connection, $query);
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
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
    <div id="container">
      <header>
        <a href='../sandbox/chat.php'>
        Back
        </a>
        <h1><?php echo $groupName ?></h1>
      </header>
      <div id="messages" class="container">
        <ul>
          <?php while($row = mysqli_fetch_assoc($messages)) : ?>
            <li class="message">
              <span><?php echo $row['sendTime'] ?> - </span><strong>
              <?php
                $que = "SELECT firstName, lastName FROM users WHERE uid = '$row['uid']'";
                $name = mysqli_query($connection, $que);
                $nameRow = mysqli_fetch_assoc($name)
                $fullName = $nameRow['firstName'] ." ".$nameRow['lastName'];

                echo $fullName;
              ?></strong>
              : <?php echo $row['content'] ?>
            </li>     
          <?php endwhile; ?>
        </ul>
      </div>
      <div id="input">
        <?php if (isset($_GET['error'])) : ?>
          <div class="error"><?php echo $_GET['error']; ?></div>
        <?php endif; ?>
        <form method="post" action="../includes/process.php">
          <!-- <input type="text" id="user" name="user" placeholder="Enter Your Name"/> -->
          <input type="text" id="newmessage" name="message" placeholder="Enter A Message"/>
          <input id="show-btn" type="submit" name="submit" value="Send"/>
        </form>
      </div>
    </div>
  </body>
</html>
