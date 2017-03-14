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
  <title>FakeBook | Photo</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<?php include("../component/header.php"); ?>

  <section id="user">
    <div class="container">
      <a href="profile.php"><h1 class="page-header">
        <?php
          $uid = $_SESSION['uid'];
          $firstName = $_SESSION['first'];
          $lastName = $_SESSION['last'];
          $fullName = $firstName ." ".$lastName;
          echo $fullName;
        ?>
       </h1></a>
    </div>
  </section>

<?php
$msg = "";
if(isset($_POST['upload'])){
    //the path to store the uploaded image
    $target = "../uimage/".basename($_FILES['image']['name']);


    //get all the submitted data from the form
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];
    $uid = $_SESSION['uid'];

    $sql = "INSERT INTO photos (uid, url, discription) VALUES ('$uid', '$image', '$text')";

    $result = mysqli_query($conn, $sql);
    //store the submitted data in to the database table

    //move
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image uploaded successfully";
    }else{
        $msg = "There was a problem uploading image";
    }
}

?>


  <section id="post">
    <div class="container">
        <form method = "post" action = "photo.php" enctype="multipart/form-data">
            <input type="hidden" name="size" value="1000000">
            <div>
                <input type="file" name="image" style="margin-bottom:5px">
            </div>
            <div>
                <textarea name="text" cols="40" rows="4" placeholder="Say something about this image....."></textarea>
            </div>
            <div>
                <input class="btn btn-warning btn-lg" type="submit" name="upload" value="Upload">
            </div>
        </form>
      <hr>
    </div>
  </section>

  <section id="photo-list">
    <div class="container">
      <h2 class="text-primary">Photo List</h2>
      <ul class="list-group">
        <li class="list-group-item" style="width: 80%">
          <div class="panel panel-default">

              <?php
              $uid = $_SESSION['uid'];
              $firstName = $_SESSION['first'];
              $lastName = $_SESSION['last'];
              $fullName = $firstName ." ".$lastName;
              $sql1 = "SELECT * FROM photos WHERE uid = '$uid'";
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

                  $sqlIfLiked = "SELECT COUNT(uid) AS ifliked FROM photoanotations WHERE pid='$pid' AND uid='$uid'";
                  $if = mysqli_query($conn, $sqlIfLiked);
                  $ifData = mysqli_fetch_array($if);
                  $ifliked = $ifData['ifliked'];
                  if ($ifliked <= 0){
                    echo "<a class='btn btn-primary' href='../includes/like.php?".$pid."''>Like</a>";
                  } else {
                    echo "<a class='btn btn-info' href='../includes/unlike.php?".$pid."''>Unlike</a>";
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
                  
                  <form method="post" action="../includes/comment.php">
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
