<?php

include '../db/dbh.php';

//$uid = $_POST['uid'];
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$pwd2 = $_POST['pwd2'];
//$admin = $_POST['admin'];

//TODO additional checks for the htpasswd file for example no ":" in username or password

//check password miss match
if ($pwd !== $pwd2) {
    header("Location: ../index.php?error=notsame");
    exit();
}
//check name
if (empty($firstname)){
    header("Location: ../index.php?error=userempty");
    exit();
}
if (empty($lastname)){
    header("Location: ../index.php?error=userempty");
    exit();
}

//check email
if (empty($email)){
    header("Location: ../index.php?error=emailempty");
    exit();
}


//check passwd
if (empty($pwd)){
    header("Location: ../index.php?error=passwordempty");
    exit();
}

else {

    $sql1 = "SELECT email FROM users WHERE email='$email'";
    $result1 = mysqli_query($conn, $sql1);
    $emailcheck = mysqli_num_rows($result1);


    //check if email is taken
    if($emailcheck > 0) {
        header("Location: ../index.php?error=emailexist");
        exit();
    }


    else{


        //insert new row in htpasswd for apache access
        $hash = base64_encode(sha1($pwd, true));


        //TODO set as the current user : this should be in the login page


        $sql = "INSERT INTO users ( firstName, lastName, email, password,) VALUES ( '$firstname','$lastname','$email', '$hash',)";

        $result = mysqli_query($conn, $sql);

        header("Location: ../index.php?success");
    }
}

?>
