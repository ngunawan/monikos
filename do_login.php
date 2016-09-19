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

$sql = "SELECT * FROM Users WHERE username LIKE '".$_POST["username"]."' AND password LIKE '".$_POST["password"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$rs = $result->fetch_array(MYSQLI_ASSOC);

	$cookie_name = "user";
	$cookie_value = "John Doe";
	//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    setcookie("cookietest");
    // output data of each row
    echo '[{
	"response": 200,
    "login-status": "logged-in",
    "username": "'.$POST_["username"].'",
    "uid": "'.$rs["id"].'",
    "password": "'.$_POST["password"].'"}]';
} else {
    echo '[{"response": 400}]';
}

$conn->close();
?>