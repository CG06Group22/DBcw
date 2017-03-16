<?php
session_start();
include '../db/dbh.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="../css/style.css" rel="stylesheet" media="screen">
    <link rel="icon" type="image/png" href="img/ucl-icon.gif" />
    <script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.fix.js"></script>
    <title>FakeBook | Privacy</title>
</head>

<body>
    <!-- navbar -->
    <?php
    include("../component/header.php");
    ?>

        <section>
            <div class="container">
                <h1 class="page-header">Pirvacy Setting</h1>
            </div>
        </section>

        <section>
            <div class="container">
                <h3>Your current privacy setting is:
                
                </h3>


                <form method="post" action="../includes/privacy-setting.php" class="form-inline">
                    <div class="form-group">
                        <?php
                        $uid = $_SESSION['uid'];
                        $sql = "SELECT privacy FROM users WHERE uid = '$uid'";
                        $result = mysqli_query($conn, $sql);
                        $row=mysqli_fetch_array($result);
                        $privacy = $row['privacy'];
                        if ($privacy=="public"){
                        echo "<input type='radio' name='checkbox' value='public' checked='checked'> Public";
                        echo "<input type='radio' name='checkbox' value='friends'> Friends";
                        echo "<input type='radio' name='checkbox' value='circles'> Circles";
                        echo "<input type='radio' name='checkbox' value='close'> Close";    
                        }
                        elseif($privacy=="friends"){
                        echo "<input class='form-control' type='radio' name='checkbox' value='public'> Public";
                        echo "<input class='form-control' type='radio' name='checkbox' value='friends' checked='checked'> Friends";
                        echo "<input class='form-control' type='radio' name='checkbox' value='circles'> Circles";
                        echo "<input class='form-control' type='radio' name='checkbox' value='close'> Close"; 
                        }
                        elseif($privacy=="circles"){
                        echo "<input class='form-control' type='radio' name='checkbox' value='public'> Public";
                        echo "<input class='form-control' type='radio' name='checkbox' value='friends'> Friends";
                        echo "<input class='form-control' type='radio' name='checkbox' value='circles' checked='checked'> Circles";
                        echo "<input class='form-control' type='radio' name='checkbox' value='close'> Close"; 
                        }
                        elseif($privacy=="close"){
                        echo "<input class='form-control' type='radio' name='checkbox' value='public'> Public";
                        echo "<input class='form-control' type='radio' name='checkbox' value='friends'> Friends";
                        echo "<input class='form-control' type='radio' name='checkbox' value='circles'> Circles";
                        echo "<input class='form-control' type='radio' name='checkbox' value='close' checked='checked'> Close"; 
                        }
                        ?>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </section>

        <footer>
            <div class="container-fluid">
                <hr>
                <p class="text-center">FakeBook, Copyright &copy; 2017
                </p>
            </div>
        </footer>

        <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
</body>

</html>
