<?php
session_start();
include '../../db/dbh.php';
$aid=$_SERVER['QUERY_STRING'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FakeBook | Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet">
</head>

<body>

<?php
include("../../component/blogheader/header2.php");
?>

  <section id="user">
    <div class="container">
    <?php
                echo "<a href='others-profile.php?$aid'><h1 class='page-header'>";
                $sql = "SELECT * FROM articles WHERE aid = '$aid'";
                $result = mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                $uid = $row['uid'];
                $sql2 = "SELECT * FROM users WHERE uid = '$uid'";
                $result2 = mysqli_query($conn,$sql2);
                $row=mysqli_fetch_array($result2);
                $firstname = $row['firstName'];
                $lastname = $row['lastName'];
                $fullname = $firstname ." ".$lastname;
                echo $fullname;
                echo "</h1></a>";
                ?>
            </h1></a>
    </div>
  </section>

  <section id="backblog">
    <div class="container">
      <a href="../others-blog.php" class="btn btn-warning btn-lg">Back to Blog</a>
      <hr>
    </div>
  </section>

  <article id="article">
    <div class="container">
      <h2 class="page-header">
        <?php
          $aid=$_SERVER['QUERY_STRING'];
          $sql = "SELECT * FROM articles WHERE aid = '$aid'";
          $result = mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($result);
          $title = $row['title'];
          echo $title;
          ?>
           <small>
             <?php
              echo $fullname;
              ?>
            </small>
      </h2>
      <p>
        <?php
          $aid=$_SERVER['QUERY_STRING'];
          $sql = "SELECT * FROM articles WHERE aid = '$aid'";
          $result = mysqli_query($conn,$sql);
          $row=mysqli_fetch_array($result);
          $content = $row['content'];
          echo $content;
          ?>
      </p>
    </div>
  </article>

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
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/main.js"></script>
</body>
</html>
