<?php
include '../db/dbh.php';
session_start();
$_SERVER['QUERY_STRING'];

$other=$_SERVER['QUERY_STRING'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FakeBook | Photo</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<?php include("../component/header.php"); ?>

  <section id="user">
    <div class="container">

              <?php
              echo " <a href=\"others-profile.php?$other\"><h1 class=\"page-header\">";
              $otheruid = $_SESSION['otheruid'];
              $firstName = $_SESSION['otherfirst'];
              $lastName = $_SESSION['otherlast'];
              $uidcheck = $_SESSION['otherprivacy'];
              $fullName = $firstName ." ".$lastName;
              echo $fullName;
              //for friends
              $hostUserID=$_SESSION['email'];
              $guestUserID=$_SESSION['otheremail'];
              $friend = "friend";
              $sql8 = "SELECT * FROM relationship WHERE relationship = '$friend' AND hostUserID = '$hostUserID' AND guestUserID = '$guestUserID'";
              $result8 = mysqli_query($conn, $sql8);
              $count8 = mysqli_num_rows($result8);
              if($uidcheck == "public"){
                $circle = 1;
              }else if($uidcheck == "friends" && $count8>0){
                  $circle = 1;
              }else if($uidcheck == "close"){
                  $circle = 0;
              }else{
                  $circle = 0;
              }

              //for circle
              $uid=$_SESSION['uid'];
              $sql7 = "SELECT gid FROM usersgroup WHERE uid = '$otheruid'";
              $result7 = mysqli_query($conn, $sql7);
              $count = mysqli_num_rows($result7);

              while($row=mysqli_fetch_array($result7)){
                  $gid = $row['gid'];
                      $sql6 = "SELECT * FROM usersgroup WHERE uid = '$uid' AND gid = '$gid'";
                      $result6 = mysqli_query($conn, $sql6);
                      $count2 = mysqli_num_rows($result6);
                      if(!$count2>0){
                          $circle = 0;
//                          break;
                      }else{
                          $circle = 1;
                            break;
                      }
              }
              ?>
          </h1></a>
    </div>
  </section>

  <section id="photo-list">
      <?php
      if($circle == 1){
          ?>

          <div class="container">
              <h2 class="text-primary">Photo List</h2>
              <ul class="list-group">
                  <li class="list-group-item" style="width: 80%">
                      <div class="panel panel-default">

                          <?php

                          $sql1 = "SELECT * FROM photos WHERE uid = '$otheruid'";
                          $result = mysqli_query($conn, $sql1);
                          while ($row = mysqli_fetch_array($result)){

                          echo "<div class=\"panel-body\">";
                          echo "<div id = 'img_div'>";
                          echo "<img src = '../uimage/".$row['url']."' style='width: 100%'>";
                          echo "<p>$fullName: ";
                          echo "".$row['discription']."</p>";
                          echo "</div>";
                          $pid = $row['pid'];

                          //likes (Anotations)
                          $sqlLike = "SELECT COUNT(uid) AS likes FROM photoanotations WHERE pid='$pid'";
                          $countLike = mysqli_query($conn, $sqlLike);
                          $data = mysqli_fetch_array($countLike);
                          $count = $data['likes'];

                          echo "<h4 class='text-primary'>".$count." Likes</h4>";

                          $sqlIfLiked = "SELECT COUNT(uid) AS ifliked FROM photoanotations WHERE pid='$pid' AND uid='$otheruid'";
                          $if = mysqli_query($conn, $sqlIfLiked);
                          $ifData = mysqli_fetch_array($if);
                          $ifliked = $ifData['ifliked'];
                          if ($ifliked <= 0){
                              echo "<a class='btn btn-primary' href='../includes/other-like.php?".$pid."''>Like</a>";
                          } else {
                              echo "<a class='btn btn-info' href='../includes/other-unlike.php?".$pid."''>Unlike</a>";
                          }


                          ?>


                          <!--comment-->
                      </div>
                      <div class="panel-footer">
                          <ul class="list-group">
                              <?php
                              $queryComments = "SELECT * FROM photocomments WHERE pid = '$pid' ORDER BY commentid ASC";
                              $comments = mysqli_query($conn, $queryComments);
                              while ($rowComments = mysqli_fetch_array($comments)){
                                  ?>
                                  <li class="list-group-item">
                      <span><?php
                          echo $rowComments['postTime'];
                          $content = $rowComments['content'];
                          $senderID = $rowComments['uid'];
                          ?> - </span>
                                      <strong>
                                          <?php
                                          $que = "SELECT firstName,lastName FROM users WHERE uid = '$senderID'";
                                          $name = mysqli_query($conn, $que);
                                          if($namerow = mysqli_fetch_assoc($name)){
                                              $fullName2 = $namerow['firstName'] ." ". $namerow['lastName'];
                                              echo $fullName2;
                                          }
                                          ?>
                                      </strong>
                                      : <?php echo $content; ?>
                                  </li>

                                  <?php
                              }
                              ?>
                          </ul>

                          <div id="input" class="panel-footer">
                              <?php if (isset($_GET['error'])) : ?>
                                  <div class="error"><?php echo $_GET['error']; ?></div>
                              <?php endif; ?>

                              <form method="post" action="../includes/other-comment.php">
                                  <?php
                                  echo "<input type='hidden' name='pid' value='$pid' />";
                                  ?>
                                  <input type="text" id="newcomment" name="comment" placeholder="Enter A Comment"/>
                                  <input id="show-btn" type="submit" name="submit" value="Send"/>
                              </form>
                          </div>
                      </div>
                      <?php
                      }
                      ?>
          </div>



          <?php

      }
      else{
          ?>
      <div class="container">
          <h2 class="text-primary">Photo List</h2>
          <ul class="list-group">
              <li class="list-group-item" style="width: 80%">
                  <div class="panel panel-default">

                  </div>
                  Sorry, the user has set the privacy privilege and you do not have permission to view the Photo List
              </li>
          </ul>
      </div>
                  <?php
      }
      ?>
          </div>
        </li>
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
