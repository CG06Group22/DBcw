<?php
session_start();
include '../../db/dbh.php';
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

  <article id="article">
    <div class="container">
        <form action="../../includes/submit-article.php" method="post">
        <div class="form-group">
          <label><h3>Title</h3></label>
          <input type="text" class="form-control" name="title" id="blogtitle" placeholder="Title">
        </div>

        <div class="form-group">
          <label><h3>Content</h3></label>
          <textarea class="form-control" name="contents" id="blogcontent" placeholder="Content" style="height: 200px;"></textarea>
        </div>
            <button class="btn btn-primary" type="submit">Submit</button>
        <a href="../blog.php" class="btn btn-default">Back to Blog</a>
      </form>






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
