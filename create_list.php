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

$drugs = "";
$i = 0;
$numItems = count($_POST["drugs"]);
foreach($_POST["drugs"] as $vals){
	if(++$i === $numItems) {
    	$drugs .= $vals;
  	}else{
	  	$drugs .= $vals . ",";	
  	}
}

$sql = "INSERT INTO Lists (lid, uid, name, drugids, drugnames)
VALUES (NULL, '".$_POST["user_id"]."', '".$_POST["name"]."', '11', '".$drugs."')";

if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "name": "'.$_POST["name"].'"}]';
} else {
    echo '[{"response":"'.$conn->error.'"}]';
}

$conn->close();
echo($result);
?>