<?php
/*
 *---------------------------------------------------------------
 * LANDING PAGE
 *---------------------------------------------------------------
 * @HZ @WE @ELM
 */

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
    <div class="row-fluid">
        <div class="col-xs-6 span9">
            <div class="carousel slide" id="carousel-685276">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#carousel-685276">
                    </li>
                    <li data-slide-to="1" data-target="#carousel-685276">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-685276" class="active">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img alt="here is picture 1" src="img/loginucl1.png" width="1356" height="850" />
                        <div class="carousel-caption">
                            <p>
                                Fakebook: Chat easier.
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="here is picture 2" src="img/loginucl2.png" width="1356" height="850" />
                        <div class="carousel-caption">
                            <p>
                                Fakebook
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img alt="here is picture 3" src="img/loginucl3.png" width="1356" height="850" />
                        <div class="carousel-caption">
                            <p>
                                Fakebook
                            </p>
                        </div>
                    </div>
                </div> <a data-slide="prev" href="#carousel-685276" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-685276" class="right carousel-control">›</a>
            </div>
        </div>
        <div class="col-xs-6 span3">
            <section>
                <div class="hex" style="width: 18vw; height: 18vw;font-size:19px;background-color: #5763ff; color: white;  line-height: 15vw;  text-align: center;"><img src="img/logobig.png" width="387" height="160"></div>

            </section>
            <script src="js/anime.js"></script>
            <script>
                var hex = anime({
                    targets: '.hex',
                    backgroundColor: '#319BFF',
                    duration: 3000,5
                    loop: true,
                    direction: 'alternate',
                    easing: 'easeOutQuad'
                });
            </script>


            <br>



            <input type="image" src="img/login.png" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal3" width="350" height="205"/>
<!--            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal3">-->
<!--                Login-->
<!--            </button>-->
            <!-- （Modal） -->
            <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">
                            </button>



                            <?php
                            $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                            if (strpos($url,'error=incorrect') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal3').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel" style="color: red">
                                    <style>
                                    </style>
                                    Your username or password is incorrect!
                                </h4>
                                <?php ;}


                            if (strpos($url,'error=changesuc') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal3').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel"  style="color: red">
                                    <style>
                                    </style>
                                    Password change successful, please login again
                                </h4>
                                <?php ;}

                            if (strpos($url,'error=resetpass') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal3').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel" style="color: red">
                                    <style>
                                    </style>
                                    Your temporary password is: 66666666, please login and change your password as soon as possible!
                                </h4>
                                <?php ;}

                            if (strpos($url,'error=success') !==false){
                                ?>
                                <script>
                                    $(function () { $('#myModal3').modal({
                                        keyboard: true
                                    })});
                                </script>
                                <h4 class="modal-title" id="myModalLabel" style="color: red">
                                    <style>
                                    </style>
                                    Sign up success, please login
                                </h4>
                                <?php ;}

                            ?>
                        </div>
                        <div class="modal-body">
                            <form action="includes/loginverify.php" method="post">
                                <input id="username" type="text" name="uid" placeholder="Username"/><br>
                                <input id="inputPassword" type="password" name="pwd" placeholder="Password"/><br>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                <button type="submit" class="btn btn-primary">Login</button>

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
                                                Please enter your email address
                                                <input type="text" name="email" placeholder="Email"><br>
                                                <br>
                                                <button type="submit" class="btn btn-primary" name="forgotPass" value="Request Password">Send message</button> &#160&#160&#160&#160
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Back</button>
                                            </form>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal -->
                            </div>


                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal -->
            </div>

            <br>
            <br>

            <input type="image" src="img/signup.png" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" width="320" height="191"/>
<!--            <p>Not registered yet? Sign up now!</p>-->
<!--            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">-->
<!--                Sign up-->
<!--            </button>-->
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
                                <input type="text" name="email" placeholder="Email"><br>
                                <select>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <br>
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

</html>
