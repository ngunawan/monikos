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

$sql = "SELECT * FROM Lists WHERE uid LIKE '".$_POST["user_id"]."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $rs = $result->fetch_array(MYSQLI_ASSOC);
  //setcookie("cookietest");
    // output data of each row
    echo '[{
  "response": 200,
    "user_id": "'.$rs["uid"].'",
    "list_id": "'.$rs["lid"].'",
    "drugnames": "'.$rs["drugnames"].'"}]';
} else {
    echo '[{"response": 400}]';
}

$conn->close();
echo($result);
?>