<?php


session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <link href="css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
    <link rel="icon" type="image/png" href="img/ucl-icon.gif" />
    <script type="text/javascript" src="js/bootstrap.fix.js"></script>

    <title>Login</title>
</head>

<body>
<div class="container-fluid">
    <div class="col-xs-6 span12">


            <form action="includes/loginverify.php" method="post">
                <div class="control-group">
                    <label class="control-label" for="username">Username</label>
                    <div class="controls">
                        <input id="username" type="text" name="uid" placeholder="Username"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPassword">Password</label>
                    <div class="controls">
                        <input id="inputPassword" type="password" name="pwd" placeholder="Password"/><br>
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
                </div>
                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox"><button class="btn" type="submit">Login</button>
                    </div>
                </div>

            </form>


<!--                 <a data-toggle="modal" data-target="#myModal2">-->
<!--            Forgot password?-->
<!--        </a>-->
<!--        <!-- （Modal） -->-->
<!--        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<!--            <div class="modal-dialog">-->
<!--                <div class="modal-content">-->
<!--                    <div class="modal-header">-->
<!--                        <button type="button" class="close" data-dismiss="modal"-->
<!--                                aria-hidden="true">-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <div class="modal-body">-->
<!--                        --><?php
//                        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//                        if (strpos($url,'error=messagesent') !==false){
//                            ?>
<!--                            <script>-->
<!--                                $(function () { $('#myModal2').modal({-->
<!--                                    keyboard: true-->
<!--                                })});-->
<!--                            </script>-->
<!--                            <h4 class="modal-title" id="myModalLabel">-->
<!--                                <style>-->
<!--                                </style>-->
<!--                                Success, please check your email inbox.-->
<!--                            </h4>-->
<!--                            --><?php //;}
//                        if (strpos($url,'error=checkemail') !==false){
//                            ?>
<!--                            <script>-->
<!--                                $(function () { $('#myModal2').modal({-->
<!--                                    keyboard: true-->
<!--                                })});-->
<!--                            </script>-->
<!--                            <h4 class="modal-title" id="myModalLabel">-->
<!--                                <style>-->
<!--                                </style>-->
<!--                                Sorry, we couldn't verify your account, please try again-->
<!--                            </h4>-->
<!--                            --><?php //;}
//
//
//                        ?>
<!--                        <form action="includes/sendemail.php" method="post">-->
<!--                            Please enter your email address-->
<!--                            <input type="text" name="email" placeholder="Email"><br>-->
<!--                            <br>-->
<!--                            <button type="submit" class="btn btn-primary" name="forgotPass" value="Request Password">Send message</button> &#160&#160&#160&#160-->
<!--                            <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div><!-- /.modal-content -->-->
<!--            </div><!-- /.modal -->-->
<!--        </div>-->




            <br><br>
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
                                <input type="text" name="uid" placeholder="Username"><br>
                                <input type="text" name="firstName" placeholder="First Name"><br>
                                <input type="text" name="lastName" placeholder="Last Name"><br>
                                <input type="text" name="gender" placeholder="Gender"><br>
                                <input type="text" name="email" placeholder="Email"><br>
                                <input type="password" name="pwd" placeholder="Password"><br>
                                <input type="password" name="pwd2" placeholder="Confirm Password"><br>

                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-primary">Sign up</button>

                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>


            <br>
            <br>

<!--            <a data-toggle="modal" data-target="#myModal3">-->
<!--                Request Administrator Access-->
<!--            </a>-->
<!--            <!-- （Modal） -->-->
<!--            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">-->
<!--                <div class="modal-dialog">-->
<!--                    <div class="modal-content">-->
<!--                        <div class="modal-header">-->
<!--                            <button type="button" class="close" data-dismiss="modal"-->
<!--                                    aria-hidden="true">-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="modal-body">-->
<!--                            --><?php
//                            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//                            if (strpos($url,'adminsent') !==false){
//                                ?>
<!--                                <script>-->
<!--                                    $(function () { $('#myModal3').modal({-->
<!--                                        keyboard: true-->
<!--                                    })});-->
<!--                                </script>-->
<!--                                <h4 class="modal-title" id="myModalLabel">-->
<!--                                    <style>-->
<!--                                    </style>-->
<!--                                    Success, please wait for administrator accept.-->
<!--                                </h4>-->
<!--                                --><?php //;}
//                            if (strpos($url,'error=checa') !==false){
//                                ?>
<!--                                <script>-->
<!--                                    $(function () { $('#myModal3').modal({-->
<!--                                        keyboard: true-->
<!--                                    })});-->
<!--                                </script>-->
<!--                                <h4 class="modal-title" id="myModalLabel">-->
<!--                                    <style>-->
<!--                                    </style>-->
<!--                                    Sorry, we couldn't verify your account, please try again-->
<!--                                </h4>-->
<!--                                --><?php //;}
//
//
//                            ?>
<!--                            <form action="includes/adminrequest.php" method="post">-->
<!--                                Please enter your email address-->
<!--                                <input type="text" name="email" placeholder="Email"><br>-->
<!--                                <br>-->
<!--                                <button type="submit" class="btn btn-primary" name="forgotPass" value="Request Password">Send message</button> &#160&#160&#160&#160-->
<!--                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div><!-- /.modal-content -->-->
<!--                </div><!-- /.modal -->-->
<!--            </div>-->





        </div>
    </div>
</div>

<?php
//$url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
//if (strpos($url,'error=empty') !==false){
//}
//else if (strpos($url,'error=username') !==false){
//   echo "Username already exists!";
//}
//else if (strpos($url,'error=notsame') !==false){
//   echo "You have entered different password !";
//}


?>

</body>

>>>>>>> 11cca851c551928922564b31cc9643f81af46b41
</html>
