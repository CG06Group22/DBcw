<?php
session_start ();
include '../db/dbh.php';
header("Location: ../index.php?error=notsame");

