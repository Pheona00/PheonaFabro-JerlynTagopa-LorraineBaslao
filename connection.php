<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_login_signup";

 if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
 {


  die("failed to connect!");

 }