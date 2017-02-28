<?php

$conn = mysqli_connect("us-cdbr-azure-southcentral-f.cloudapp.net", "bd72ffa33d6f5c", "20d59076", "gc06group22database");

if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}

?>
