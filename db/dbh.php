<?php

$conn = mysqli_connect("ap-cdbr-azure-east-a.cloudapp.net", "ba5dd3c4a788eb", "5028ccf3", "acsm_9d973147c13749b");

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>
