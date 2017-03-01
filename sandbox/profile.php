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
				
				
				
				<li><a href="profile.php">
               Welcome, <?php
                    	if (isset($_SESSION['first'])){
                        	echo $_SESSION['first'];
				echo " ";    
                        	echo $_SESSION['last'];
                   	 };
			?>! </a></li>
           
            <li><a href="../includes/logout.php">Logout</a></li>
			</ul>
		</div>
	</nav>
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
	<section id="profile">
		<div class="container">
			<h2 class="text-primary">Profile</h2>
			<table class="table table-condensed table-striped">
				<tbody>
					<tr>
						<th>Firstname: <?php
                            if (isset($_SESSION['first'])){
                                echo $_SESSION['first'];
                            } ?></th>

						<td></td>
					</tr>
					<tr>
						<th>Lastname: <?php
                            if (isset($_SESSION['first'])){
                                echo $_SESSION['last'];
                            } ?></th>

						<td></td>
					</tr>
					<tr>
						<th>Gender: <?php
                            if (isset($_SESSION['first'])){
                                echo $_SESSION['gender'];
                            } ?></th>

						<td></td>
					</tr>
					<tr>
						<th>Email: <?php
                            if (isset($_SESSION['first'])){
                                echo $_SESSION['email'];
                            } ?></th>

						<td></td>
					</tr>
				</tbody>
			</table>
			<hr>
		</div>
	</section>

	<section>
		<div class="container">
			<a class="btn btn-primary" href="blog.html">Blog</a>
			<a class="btn btn-primary" href="photo.html">Photo</a>
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
						<a href="others-profile.html">Item 1</a> 
						<button class="btn btn-danger">Delete</button>
					</li>
				</div>
			</div>
			<div id="applying">
				<h3>Applying</h3>
				<div class="list-group">
					<li class="list-group-item">
						<a href="#">Item 1</a>
					</li>
				</div>
			</div>
			<div id="requested">
				<h3>Requested</h3>
				<div class="list-group">
					<li class="list-group-item">
						<a href="#">Item 1</a> 
						<button class="btn btn-primary">Accept</button>
						<button class="btn btn-danger">Refuse</button>
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
