<?php/*
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//connect to database
$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "monikosdbun";
$pass = "monikosdbpw";
$dbname = "monikosdb";
$conn = new mysqli($host, $dbuser, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM 'Users' WHERE (
'username'=  '".$_POST["username"]."' AND 'password'= '".$_POST["password"]."')";

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
//echo($result);
*/
?>
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//connect to database
$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "monikosdbun";
$pass = "monikosdbpw";
$dbname = "monikosdb";
$conn = new mysqli($host, $dbuser, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//$sql = "INSERT INTO Users (id, username, email, password)
//VALUES (NULL, '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."')";

$sql = "SELECT * FROM Users WHERE (
'username'='".$_POST["username"]."' AND 'password'='".$_POST["password"]."')";

echo $sql;

if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "login-status": "logged-in",
    "username": "'.$_POST["username"].'",
    "password": "'.$_POST["password"].'"}]';
} else {
    echo '[{"response":"'.$conn->error.'"}]';
}

$conn->close();
echo($result);
?>