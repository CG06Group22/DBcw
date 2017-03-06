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
	<title>FakeBook | Profile</title>

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
				echo "<a href='others-profile.php?$otherEmail><h1 class='page-header'>"; 
               	echo $_SESSION['otherfullname'];
            	echo "</h1></a>";
            ?>
		</div>
	</section>

	<section id="profile">
		<div class="container">
			<h2 class="text-primary">Profile</h2>
			<table class="table table-condensed table-striped">
                <tbody>
                


                <tr>
                    <th>Firstname: <?php
                            echo $_SESSION['otherfirst'];
                         ?></th>

                    <td></td>
                </tr>
                <tr>
                    <th>Lastname: <?php
                            echo $_SESSION['otherlast'];
                         ?></th>

                    <td></td>
                </tr>
                <tr>
                    <th>Gender: <?php
                            echo $_SESSION['othergender'];
                         ?></th>

                    <td></td>
                </tr>
                <tr>
                    <th>Email: <?php
                            echo $_SESSION['otheremail'];
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
						<?php
						$target = $_SESSION['otheremail'];
						$friend = "friend";
						$sql2 = "SELECT * FROM relationship WHERE relationship = '$friend' AND hostUserID = '$target'";
						$result2 = mysqli_query($conn, $sql2);
						$count = mysqli_num_rows($result2);
						if(!$count>0){
							echo "Your friend list is empty";
						}else{
							while($row=mysqli_fetch_array($result2)){
								$guestUserID = $row['guestUserID'];
								$sql3 = "SELECT firstName, lastName FROM users WHERE email = '$guestUserID'";
								$result3 = mysqli_query($conn, $sql3);
								if (!$row = mysqli_fetch_assoc($result3)){
								    echo "Can't find user.";
                                    $firstName = "";
                                    $lastName = "";
								} else{
									$firstName = $row['firstName'];
									$lastName = $row['lastName'];
								}
								$fullName = $firstName ." ".$lastName;
								echo "<li class='list-group-item'><a href='others-profile.php?$guestUserID'>";
								echo $fullName;
							}
						}
						?>
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
