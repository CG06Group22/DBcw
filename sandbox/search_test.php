<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FakeBook | Search</title>

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
				<li id="login-user">
					<a href="profile.php">
						<?php
						if(isset($_SESSION['first'])){
							echo $_SESSION['first'];
							echo " ";
							echo $_SESSION['last'];
						}
						?>
					</a>
				</li>
				<li><a href="../index.php">Login</a></li> 
			</ul>
		</div>
	</nav>
	
	<section>
		<div class="container">
			<h1 class="page-header">Search</h1>
		</div>
	</section>

	<section>
		<div class="container">
			<form method="post" action="search_test.php" class="form-inline">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="Search for friends/blogs">
				</div>			
				<div class="form-group">
					<input type="radio" name="checkbox" value="friends"> Friends 
					<input type="radio" name="checkbox" value="articles"> Articles 
				</div>
				<button class="btn btn-primary" type="submit" name="submit">Search</button>
			</form>
			<hr>
		</div>
	</section>	

	<section id="searchlist">
		<div class="container">
			<?php 
			include '../db/dbh.php';
			mysql_select_db("gc06group22database", $conn);
			if(isset($_POST['submit'])){
				$target=$_POST['search']; 
					  //-query  the database table 
				$sql="SELECT * FROM users WHERE firstName OR lastName LIKE '%$target%'"; 
					  //-run  the query against the mysql query function 
				$result = mysql_query($sql, $conn) or die(mysql_error()); 
				$count = mysql_num_rows($result);
					  //-create  while loop and loop through result set 
				if(!$count>0){
					echo "no result for $target";
				}else{
					while($row=mysql_fetch_array($result)){ 
						$firstName = $row['firstName']; 
						$lastName = $row['lastName'];  
						echo $firstName;
					}
					echo $count;
				}
				
			} else {
				echo "Please provide a search text";
			}
			?> 
			<!-- <div id="friends-results">
				<h3>Friends Results</h3>
				<div class="list-group">
					<li class="list-group-item">
						<a href="#">Item 1</a> 
						<button class="btn btn-primary" type="submit">Apply</button>
					</li>
					
				</div>
			</div>
			<hr>
			<div id="articles-results">
				<h3>Articles Results</h3>
				<div class="list-group">
					<li class="list-group-item">
						<a href="#">Item 1</a> 
					</li>
				</div>
			</div> -->
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
