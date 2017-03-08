<?php
session_start();
include '../db/dbh.php';
$target=$_SESSION['email'];
$firstName= $_SESSION['first'];
$lastName= $_SESSION['last'];
$uid= $_SESSION['uid'];
$fullName = $firstName ." ".$lastName;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FakeBook | Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
<?php
include("../component/header.php");
?>

<section id="user">
    <div class="container">
      <?php
	      echo "<a href='others-profile.php?$target'><h1 class='page-header'>";
        echo $fullName;
        echo "</h1></a>";
      ?>
    </div>
  </section>

<section id="wirte">
  <div class="container">
    <a class="btn btn-warning btn-lg" href='blog/write.php'>Write</a>
    <hr>
  </div>
</section>

<section id="article-list">
  <div class="container">
    <h2 class="text-primary">Aritcle List</h2>
    <ul class="list-group">
        <?php

        $sql = "SELECT aid, postTime, title FROM articles WHERE uid = '$uid'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if(!$count>0){
            echo "Your articles list is empty";
        }else{
            while($row=mysqli_fetch_array($result)){
                $title=$row['title'];
                $time = $row['postTime'];
                $aid = $row['aid'];
                $fullName = $firstName ." ".$lastName;
                echo "<li class='list-group-item'><a href='blog/article.php?$aid'>";
                echo $title;
                echo "</a>";
                ?>

                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                echo $time;
?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                echo "<a class='btn btn-danger' href='../includes/delete-arti.php?$aid'>Delete</a>";
                echo "</li>";
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
