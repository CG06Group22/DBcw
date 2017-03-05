<?php
session_start();
include '../db/dbh.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FakeBook | Chat</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <!-- navbar -->
  <?php
    include("../component/header.php");
  ?>

<section id="user">
    <div class="container">
      <a href="profile.php"><h1 class="page-header">
      <?php
                      if (isset($_SESSION['first'])){
                          echo $_SESSION['first'];
        echo " ";    
                          echo $_SESSION['last'];
                     };
      ?>
      </h1></a>
    </div>
</section>

<section id="group-list">
  <div class="container">
    <h2 class="text-primary">Group List</h2>
    <ul class="list-group">
      <?php
        $uid=$_SESSION['uid'];
        $sql = "SELECT gid FROM usersgroup WHERE uid = '$uid'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if(!$count>0){
          echo "You don't have any group yet.";
        }else{
          while($row=mysqli_fetch_array($result)){
            $gid = $row['gid'];
            $sql2 = "SELECT groupName FROM groups WHERE gid = '$gid'";
            $result2 = mysqli_query($conn, $sql2);
            if (!$row = mysqli_fetch_assoc($result2)){
                echo "Can't find group.";
            } else{
              $groupName = $row['groupName'];
            }
            echo "<li class='list-group-item'><a href='groupChat.php?id=$gid&name=$groupName'>";
            echo $groupName;
      ?>
            </a>
            <div id="article-editor">
              <hr>
              <button class="btn btn-primary">Detail</button>
              <button class="btn btn-danger">Leave</button>
            </div>
            </li>
      <?php
          }
        }
      ?>
    </ul>
  </div>
</section>

<footer>
  <div class="container-fluid">
    <hr>
    <p class="text-center">FakeBook, Copyright &copy; 2017
    </p>
  </div> 
</footer>


<script
src="http://code.jquery.com/jquery-3.1.1.js"
></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
