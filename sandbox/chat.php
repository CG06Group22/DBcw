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

<section id="newGroup">
        <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newGroup">
            Create new group
        </button>
        <!-- （Modal） -->
        <div class="modal fade" id="newGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        
                    </div>
                    <div class="modal-body">
                        
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal -->
        </div>
        <!-- （Modal-close） -->
        </div>
</section>

<section id="group-list">
  <div class="container">
    <h2 class="text-primary">Group List</h2>
    <div class="list-group">
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
            if (!$rowGroupNames = mysqli_fetch_assoc($result2)){
                echo "Can't find group.";
            } else{
              $groupName = $rowGroupNames['groupName'];
            }
      ?>
            <div class='list-group-item'>
                <div class = "panel-group" id="buttons-div">
                    <div class = "panel panel-default">
                      <?php
                      echo "<a href='groupChat.php?$gid'>";
                      echo $groupName;
                      echo "</a>";
                      ?>
<!--                       <hr> -->
                      <div class = "panel-heading">
                        <?php echo "<a class='btn btn-primary' data-toggle='collapse' href='#$gid'>Add friends
                        </a>"; ?>
                        <button class="btn btn-danger">Leave</button>
                      </div>
                    <!-- （panel-collapse） -->
                    <?php echo "<div class='panel-collapse collapse' id='$gid'>"; ?>
                      <ul class="list-group">
                      <?php
                      $target = $_SESSION['email'];
                      $friend = "friend";
                      $sqlfriends = "SELECT guestUserID FROM relationship WHERE relationship = '$friend' AND hostUserID = '$target'";
                      $resultfriends = mysqli_query($conn, $sqlfriends);
                      $countfriends = mysqli_num_rows($resultfriends);
                      if(!$countfriends>0){
                        echo "Your friend list is empty";
                      }else{
                        while($rowfriends = mysqli_fetch_array($resultfriends)){
                            $guestUserID = $rowfriends['guestUserID'];
                            $sqlGuestNames = "SELECT firstName, lastName, uid FROM users WHERE email = '$guestUserID'";
                            $resultGuestNames = mysqli_query($conn, $sqlGuestNames);
                            if (!$rowGuestNames = mysqli_fetch_assoc($resultGuestNames)){
                                echo "Can't find user.";
                            } else {
                                $firstName = $rowGuestNames['firstName'];
                                $lastName = $rowGuestNames['lastName'];
                                $fullName = $firstName ." ".$lastName;

                                echo "<li class='list-group-item'><a href='others-profile.php?$guestUserID'>";
                                echo $fullName;
                                echo "</a>";

                                // $sqlid = "SELECT uid FROM users WHERE email = $guestUserID";
                                // $uidresult = mysqli_query($conn, $sqlid);
                                // if ($uidrow = mysqli_fetch_assoc($uidresult)){
                                    // $uid = $uidrow['uid'];
                                    $guid = $rowGuestNames['uid'];
                                    $sqlIfIn = "SELECT gid FROM usersgroup WHERE gid = '$gid' AND uid = '$guid'";
                                    $resultIfIn = mysqli_query($conn, $sqlIfIn);
                                    if (!$rowadd = mysqli_fetch_assoc($resultIfIn)){
                                      echo "<a href='../includes/addToGroup.php?u=$guid&g=$gid'>Add</a>";
                                    } else {
                                      echo "This user is already in the group.";
                                    }
                                // }
                                echo "</li>";
                            }
                        }
                      }

                      ?>
                      </ul>
                    <?php echo "</div>"; ?>
                    <!-- （panel-collapse-close） -->

                      
                    </div> <!-- panel panel-default -->
                </div> <!-- panel-group -->
            </div> <!-- list group item -->
      <?php
          }
        }
      ?>
    </div> <!-- list group -->
  </div> <!-- container -->
</section>

<footer>
  <div class="container-fluid">
    <hr>
    <p class="text-center">FakeBook, Copyright &copy; 2017
    </p>
  </div> 
</footer>


<script src="http://code.jquery.com/jquery-3.1.1.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>

