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
 

//$sql = "UPDATE Drug SET HintLikes = " . $_POST["likes"] . ", HintDislikes = " . $_POST["dislikes"] " WHERE DrugId = 1";

//$sql = "UPDATE Drug SET HintLikes = '" .$_POST['likes']. "', HintDislikes = '" .$_POST['dislikes'].  "' WHERE DrugId = '" .$_POST['drugid'] "'";

//$sql = "UPDATE Drug SET HintLikes = '" .$_POST['likes']. "', HintDislikes = 33 WHERE DrugId = 1";

$sql = "UPDATE Drug SET HintLikes = '" .$_POST['likes']. "', HintDislikes = '" .$_POST['dislikes']. "' WHERE DrugId = '" .$_POST['drugid']. "'";

//$sql = $conn->prepare("UPDATE Drug SET 'HintLikes' = 3 WHERE 'DrugId' = 1");
//$sql = "UPDATE Drug SET HintLikes = 3 WHERE DrugId = 1";
//echo $_POST["likes"];
//
//$sql = "INSERT INTO Users (id, username, email, password)
//VALUES (NULL, '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "likes": "'.$_POST["likes"].'",
    "id": "'.$_POST["drugid"].'",
    "dislikes": "'.$_POST["dislikes"].'"}]';
} else {
    echo '[{"response":"'.$conn->error.'"}]';
}

$conn->close();
echo($result);
?>