<?php
$conn = mysql_connect("us-cdbr-azure-southcentral-f.cloudapp.net", "bd72ffa33d6f5c", "20d59076");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/style.css" rel="stylesheet" media="screen">
    <link rel="icon" type="image/png" href="img/ucl-icon.gif" />
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.fix.js"></script>



    <title>FakeBook | Login</title>
</head>

<body>
<!-- navbar -->
<?php
    include ("../header.php");
    ?>

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
        <?php
        mysql_select_db('gc06group22database', $conn);
        if(isset($_POST['submit'])){
            if(isset($_SESSION['uid'])){
            $selfid=$_SESSION['uid'];
            $target=$_POST['search'];
            $sql = "SELECT * FROM users WHERE (firstName LIKE '%$target%' OR lastName LIKE '%$target%') AND uid != '$selfid'";
            $result = mysql_query($sql);
            }
        }
        ?>
    </div>
</section>

<section id="searchlist">
    <div class="container">
        <div id="friends-results">
            <h3>Friends Results</h3>
            <div class="list-group">
                <?php
                $count = mysql_num_rows($result);
                if(!$count>0){
                    echo "no result for $target";
                }else{
                    while($row=mysql_fetch_array($result)){
                        $firstName = $row['firstName'];
                        $lastName = $row['lastName'];
                        $email = $row['email'];
                        $fullName = $firstName ." ".$lastName;
                        echo "<li class='list-group-item'><a href='others-profile.php?$email'>";
                        echo $fullName;
                        echo "<a href='../includes/apply.php?$email'>Apply</a>";
                    }
                }
                ?>

                <!-- （Modal） -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">
                                </button>
                                <?php
                                $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                                if (strpos($url,'error=apply') !==false){
                                    ?>
                                    <script>
                                        $(function () { $('#myModal').modal({
                                            keyboard: true
                                        })});
                                    </script>
                                    <h4 class="modal-title" id="myModalLabel" style="color: red">
                                        <style>
                                        </style>
                                        You have already send the application
                                    </h4>
                                    <?php ;}

                                if (strpos($url,'error=already') !==false){
                                    ?>
                                    <script>
                                        $(function () { $('#myModal').modal({
                                            keyboard: true
                                        })});
                                    </script>
                                    <h4 class="modal-title" id="myModalLabel" style="color: red">
                                        <style>
                                        </style>
                                        You are already friends with this person
                                    </h4>
                                    <?php ;}
                                if (strpos($url,'applysuc') !==false){
                                    ?>
                                    <script>
                                        $(function () { $('#myModal').modal({
                                            keyboard: true
                                        })});
                                    </script>
                                    <h4 class="modal-title" id="myModalLabel" style="color: red">
                                        <style>
                                        </style>
                                        The application has been submitted
                                    </h4>
                                    <?php ;}
                                ?>
                            </div>
                            <div class="modal-body">
                                <form action="includes/signup.php" method="POST">
                                    <div class="form-group">
                                        <button  type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal -->
                </div>
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
