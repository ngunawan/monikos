<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'db_creds.php';
 

$sql = "UPDATE Drug SET HintDisLikes = '" .$_POST['dislikes']. "'WHERE DrugId = '" .$_POST['drugid']. "'";


if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "id": "'.$_POST["drugid"].'",
    "dislikes": "'.$_POST["dislikes"].'"}]';
} else {
    echo '[{"response":"'.$conn->error.'"}]';
}

$conn->close();
echo($result);
?>