<?php
session_start();
include '../db/dbh.php';
$_SERVER['QUERY_STRING'];
$other=$_SERVER['QUERY_STRING'];
$sql = "SELECT * FROM users WHERE email = '$other'";
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
$_SESSION['otherlast'] = $row['lastName'];
$_SESSION['otherfirst'] = $row['firstName'];
$_SESSION['othergender'] = $row['gender'];
$_SESSION['otheremail'] = $row['email'];
$_SESSION['otheruid'] = $row['uid'];
$_SESSION['otherfullname'] = $_SESSION['otherfirst'] ." ".$_SESSION['otherlast'];
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
  <!-- navbar -->
<?php
include("../component/header.php");
?>

<section id="user">
    <div class="container">
      <?php
				$otherEmail = $_SESSION['otheremail'];
				echo "<a href='others-profile.php?$otherEmail'><h1 class='page-header'>";
        echo $_SESSION['otherfullname'];
        echo "</h1></a>";
      ?>
  </section>

<section id="article-list">
  <div class="container">
    <h2 class="text-primary">Aritcle List</h2>
    <ul class="list-group">
        <?php
        $target=$_SESSION['otheremail'];
        $firstName= $_SESSION['otherfirst'];
        $lastName= $_SESSION['otherlast'];
        $uid= $_SESSION['otheruid'];
        $fullName = $firstName ." ".$lastName;
        $sql1 = "SELECT aid, postTime, title FROM articles WHERE uid = '$uid'";
        $result1 = mysqli_query($conn, $sql1);
        $count = mysqli_num_rows($result1);
        if(!$count>0){
            echo "Your articles list is empty";
        }else{
            while($row=mysqli_fetch_array($result1)){
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
