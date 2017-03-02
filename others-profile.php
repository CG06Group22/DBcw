<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FakeBook | Profile</title>

	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
</head>

<body>
	<!-- navbar -->
	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">FakeBook</a>
			</div>			
			<ul class="nav navbar-nav navbar-right">
				<li><a href="search.html">Search</a></li>
				<li><a href="chat.html">Chat</a></li>
				<li id="login-user"><a href="profile.php">User</a></li>
				<li><a href="../login.html">Login</a></li> 
			</ul>
		</div>
	</nav>
	
	<section id="user">
		<div class="container">
			<a href="others-profile.php"><h1 class="page-header">User</h1></a>
		</div>
	</section>

	<section id="profile">
		<div class="container">
			<h2 class="text-primary">Profile</h2>
			<table class="table table-condensed table-striped">
                <tbody>
                <?php
                $_SERVER['QUERY_STRING'];
                $conn = mysql_connect("us-cdbr-azure-southcentral-f.cloudapp.net", "bd72ffa33d6f5c", "20d59076");
                mysql_select_db('gc06group22database', $conn);
                $target=$_SERVER['QUERY_STRING'];
                $sql = "SELECT * FROM users WHERE email LIKE '%$target%'";
                $result = mysql_query($sql);
                $row=mysql_fetch_array($result);
                $lastName = $row['lastName'];
                $firstName = $row['firstName'];
                $gender = $row['gender'];
                $email = $row['email'];
//                if (strpos($url,'error=incorrect') !==false){
//                    echo "Your username or password is incorrect!";
//                }

                ?>


                <tr>
                    <th>Firstname: <?php

                            echo $firstName;
                         ?></th>

                    <td></td>
                </tr>
                <tr>
                    <th>Lastname: <?php

                            echo $lastName;
                         ?></th>

                    <td></td>
                </tr>
                <tr>
                    <th>Gender: <?php

                            echo $gender
                         ?></th>

                    <td></td>
                </tr>
                <tr>
                    <th>Email: <?php
                            echo $email;
                         ?></th>

                    <td></td>
                </tr>
                </tbody>
			</table>
			<hr>
		</div>
	</section>

	<section>
		<div class="container">
			<a class="btn btn-primary" href="others-blog.html">Blog</a>
			<a class="btn btn-primary" href="others-photo.html">Photo</a>
			<hr>
		</div>
	</section>

	<section id="relationship">
		<div class="container">
			<h2 class="text-primary">Relationship</h2>
			<div id="friend">
				<h3>Friends</h3>
				<div class="list-group">
					<li class="list-group-item">
						<a href="others-profile.php">Item 1</a>
					</li>
				</div>
			</div>
			
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
