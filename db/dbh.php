<?php

$conn = mysqli_connect("ap-cdbr-azure-east-a.cloudapp.net", "ba5dd3c4a788eb", "5028ccf3", "logintest");

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>
