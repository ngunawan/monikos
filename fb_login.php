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
/*echo '[{
    "response": 200,
    "username": "'.$_POST["un"].'",
    "fbid": "'.$_POST["id"].'"}]';
*/
$sql = "SELECT * FROM Users WHERE fbid LIKE '".$profile["id"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
//if ($conn->query($sql) === TRUE) {
	echo '[{
	"response": 200,
	"username": "'.$_POST["un"].'",
	"test": "user already exists",
	"id": "'.$_POST["id"].'"}]';
} else {
	$createSql = "INSERT INTO Users (id, fbid, username, email, password)
	VALUES (NULL, ".$_POST["id"].", '".$_POST["un"]."', 'NULL', 'NULL')";
		if ($conn->query($createSql) === TRUE) {
		    echo '[{
		    "response": 200,
		    "username": "'.$_POST["un"].'",
		    "test": "whaa",
		    "id": "'.$_POST["id"].'"}]';
		} else {
		    //echo '[{"response":"'.$conn->error.'"}]';
		    echo '[{
			"response": 400,
			"why": "'.$conn->error.'"}]';
		}
}
/*$sql = "INSERT INTO Users (id, username, email, password)
VALUES (NULL, '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "username": "'.$_POST["username"].'",
    "email": "'.$_POST["email"].'",
    "password": "'.$_POST["password"].'"}]';
} else {
    echo '[{"response":"'.$conn->error.'"}]';
}*/

//$conn->close();
//echo($result);
?>