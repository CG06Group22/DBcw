<?php

include '../db/dbh.php';
$gender = $_POST['classList'];
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];


if ($pwd !== $pwd2) {
    header("Location: ../index.php?error=notsame");
    exit();
}

if (empty($email)){
    header("Location: ../index.php?error=emailempty");
    exit();
}

if (empty($pwd)){
    header("Location: ../index.php?error=passwordempty");
    exit();
}

else {
    $sql1 = "SELECT uid FROM users WHERE email='$email'";
    $result1 = mysqli_query($conn, $sql1);
    $emailcheck = mysqli_num_rows($result1);

    if($emailcheck > 0) {
        header("Location: ../index.php?error=emailexist");
        exit();
    }
    else{
        $hash = base64_encode(sha1($pwd, true));
        $sql = "INSERT INTO users ( email, pwd, firstName, lastName, gender) VALUES ( '$email', '$hash','$firstname','$lastname','$gender')";

        $result = mysqli_query($conn, $sql);

        header("Location: ../index.php?success");
    }
}

?>
