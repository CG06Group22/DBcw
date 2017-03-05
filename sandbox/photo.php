
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
      <a href="profile.php"><h1 class="page-header">User</h1></a>
    </div>
  </section>

  <section id="post">
    <div class="container">
      <button class="btn btn-warning btn-lg">Post</button>
      <hr>
    </div>
  </section>

  <section id="photo-list">
    <div class="container">
      <h2 class="text-primary">Photo List</h2>
      <ul class="list-group">
        <li class="list-group-item">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="https://placeholdit.imgix.net/~text?txtsize=33&txt=350%C3%97150&w=350&h=150">
            </div>
            <div class="panel-footer">
              <ul class="list-group">
                <li class="list-group-item">First Comment</li>
              </ul>
            </div>
            <div class="panel-footer">
              <input type="text" placeholder=" Leave your comment ">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
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