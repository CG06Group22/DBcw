<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign up | Fuckbook 2017</title>
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css"> -->
</head>

<body>
<main class="container">

    <p>Fuckbook!</p>
    <hr>
    <!-- <? if (!empty($error_msg)) { ?>
        <div class="alert alert-danger alert-dismissible fade in">
            <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span></button>
            <strong>Warning!</strong> <?= $error_msg; ?>
        </div>
    <? } ?> -->
    <form class="signup-form" method="/" action="/">
        <div class="input-group">
            <input type="text" name="email" id="input-email" placeholder="email"
                   required autofocus>
            <p> <br /> </p>
            <input type="text" name="nickName" id="input-nickName" placeholder="nickName"
                   required autofocus>
            <p> <br /> </p>
            <input type="password" name="password" id="input-password" placeholder="password"
                   required autofocus>
            <p> <br /> </p>
        </div>

        <!-- <div class="checkbox">
            <label>
                <input type="checkbox" name="tos-comfirm" required>I have read and
                accepted the
                <a href="https://vote.unncer.com/regulations-for-the-2016-su-president-election-constitution/#voters" target="_blank">SU President Election: Regulations for Voters</a>.
            </label>
        </div> -->
        <button type="submit" value="submit" class="btn btn-primary btn-lg btn-block" disabled>
            Sign up
        </button>
    </form>
</main>
<!-- <script src="js/jquery.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<?php include_once("../scripts.php") ?> -->
</body>
</html>
