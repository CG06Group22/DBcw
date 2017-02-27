<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/style.css" rel="stylesheet" media="screen">
    <link rel="icon" type="image/png" href="img/ucl-icon.gif" />
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.fix.js"></script>

    <title>Fakebook login</title>
</head>
<body>


<!-- Navbar -->
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">FakeBook</a>
        </div>
    </div>
</nav>
<!-- Jumbotron -->
<section id="welcome">
    <div class="jumbotron text-center">
        <div class="container">
            <h1>Welocom to FakeBook</h1>
            <p class="text-info"><em>Say Hell to World!</em></p>




            <form action="includes/loginverify.php" method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input class="form-control" id="email" type="text" name="email" placeholder="Email"/>
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                        <input class="form-control" id="inputPassword" type="password" name="pwd" placeholder="Password"/><br>
                        <?php
                        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                        if (strpos($url,'error=incorrect') !==false){
                            echo "Your username or password is incorrect!";
                        }
                        if (strpos($url,'error=resetpass') !==false){
                            echo "Your temporary password is: 66666666, please login and change your password as soon as possible!";
                        }
                        if (strpos($url,'success') !==false){
                            echo "Sign up success, please login";}
                        if (strpos($url,'changesuc') !==false){
                            echo "Password change successful, please login again";}
                        ?>
                </div>

                        <button class="btn btn-default" type="submit">Login</button>
                </div>

            </form>


            <a data-toggle="modal" data-target="#myModal2">
                Forgot password?
            </a>
            <!-- （Modal） -->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php
                            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                            if (strpos($url,'error=messagesent') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal2').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel">
                                    <style>
                                    </style>
                                    Success, please check your email inbox.
                                </h4>
                                <?php ;}
                            if (strpos($url,'error=checkemail') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal2').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel">
                                    <style>
                                    </style>
                                    Sorry, we couldn't verify your account, please try again
                                </h4>
                                <?php ;}
                            ?>
                            <form action="includes/sendemail.php" method="post">

                                <div class="form-group">
                                    <label> Please enter your email address</label>
                                <input class="form-control" type="text" name="email" placeholder="Email"><br>
                                </div>

                                <button type="submit" class="btn btn-primary" name="forgotPass" value="Request Password">Send message</button> &#160&#160&#160&#160
                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>

                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>







            <br>
            <br>

            <!--            <input type="image" src="img/signup.png" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" width="320" height="191"/>-->
            <p>Not registered yet? Sign up now!</p>
            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Sign up
            </button>
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
                            if (strpos($url,'error=emailempty') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel" style="color: red">
                                    <style>
                                    </style>
                                    Fill out all fields.
                                </h4>
                                <?php ;}

                            if (strpos($url,'error=notsame') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel" style="color: red">
                                    <style>
                                    </style>
                                    The passwords you entered didn't match.
                                </h4>
                                <?php ;}
                            if (strpos($url,'error=userempty') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel" style="color: red">
                                    <style>
                                    </style>
                                    Fill out all fields.
                                </h4>
                                <?php ;}
                            if (strpos($url,'error=emailexist') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel"  style="color: red">
                                    <style>
                                    </style>
                                    Email already exist!
                                </h4>
                                <?php ;}

                            if (strpos($url,'error=username') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel" style="color: red">
                                    <style>
                                    </style>
                                    Username already exists.
                                </h4>
                                <?php ;}
                            ?>
                        </div>
                        <div class="modal-body">
                            <form action="includes/signup.php" method="POST">
                                <!--                                <input type="text" name="uid" placeholder="Username"><br>-->
                                <div class="form-group">
                                <input  class="form-control" type="text" name="email" placeholder="Email"><br>
                                <input class="form-control" type="text" name="firstName" placeholder="Firstname"><br>
                                <input class="form-control" type="text" name="lastName" placeholder="Lastname"><br>
                                <select class="form-control" id="classList" name="classList">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <br>
                                <input class="form-control" type="password" name="pwd" placeholder="Password"><br>
                                <input  class="form-control" type="password" name="pwd2" placeholder="Confirm Password"><br>
                                <button  type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                <button  type="submit" class="btn btn-primary">Sign up</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>



        </div>
    </div>

    <div class="container">
</section>
<!-- Footer -->
<footer>
    <div class="container-fluid">
        <hr>
        <p class="text-center">FakeBook, Copyright &copy; 2017
        </p>
    </div>
</footer>


</body>

</html>
