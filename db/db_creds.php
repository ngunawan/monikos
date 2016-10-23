<?php

$host = "mysql.danilachenchik.com";
$dbuser = "mnksdbun";
$pass = "mnksdbpw";
$dbname = "mnkstest";

$conn = new mysqli($host, $dbuser, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>