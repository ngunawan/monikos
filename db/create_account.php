<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//connect to database
/*$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "monikosdbun";
$pass = "monikosdbpw";
$dbname = "monikosdb";
$conn = new mysqli($host, $dbuser, $pass, $dbname);
*/
//metis db
/*$host = "metis.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "Metis";
$pass = "Metis200";
$dbname = "Metis";
$conn = new mysqli($host, $dbuser, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/
require_once 'db_creds.php';
 

$sql = "INSERT INTO Users (id, username, email, password, schoolid, schoolname)
VALUES (NULL, '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."', '".$_POST["schoolid"]."', '".$_POST["schoolname"]."')";

if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "username": "'.$_POST["username"].'",
    "email": "'.$_POST["email"].'",
    "password": "'.$_POST["password"].'"}]';
} else {
    echo '[{"response":"'.$conn->error.'"}]';
}

$conn->close();
echo($result);
?>