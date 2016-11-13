<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'db_creds.php'; 

$sql = "INSERT INTO Challenge (challengeid, user1, user2, challengegame, bet)
VALUES (NULL, '".$_POST["user1"]."', '".$_POST["user2"]."', '" . $_POST["game"]. "', '". $_POST["bet"]."')";

if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "user1": "'.$_POST["user1"].'",
    "user2": "'.$_POST["user2"].'",
    "game": "'.$_POST["game"].'",
    "bet": "'.$_POST["bet"].'"}]';
} else {
    echo '[{"response":"'.$conn->error.'"}]';
}

$conn->close();
echo($result);
?>