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
*/
require_once 'db_creds.php';

/*$conn = new mysqli($host, $dbuser, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} */

$sql = "SELECT * FROM Lists WHERE lid LIKE '".$_POST["lid"]."'";
$result = $conn->query($sql);

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    /*$rs["Generic"] = clean($rs["Generic"]);
    $rs["Brand"] = clean($rs["Brand"]);
    $rs["Class"] = clean($rs["Class"]);
    $rs["Indication"] = clean($rs["Indication"]);
    */
    $outp .= '{"list_id":"'  . $rs["lid"] . '",';
    $outp .= '"list_name":"'   . $rs["name"]        . '",';
    //$outp .= '"drugnames":"'   . $rs["drugnames"]        . '",';
    //$outp .= '"Indication":"'   . $rs["Indication"]        . '",';
    //$outp .= '"HintLikes":"'   . $rs["HintLikes"]        . '",';
    //$outp .= '"Indication":"'. $rs["Indication"]     . '"}';
    $outp .= '"drugnames":"'. $rs["drugnames"]     . '"}';
     //$outp .= '{"username":"'. $rs["username"] . '",';
     //$outp .= '"email":"'. $rs["email"]     . '"}';
}
//$outp ='{"records":['.$outp.']}';
echo($outp);
/*
if (!$result->num_rows > 0) {
  //$rs = $result->fetch_array(MYSQLI_ASSOC);
  //setcookie("cookietest");
    // output data of each row
    echo '[{
  "response": 200,
    "user_id": "'.$rs["uid"].'",
    "list_id": "'.$rs["lid"].'",
    "drugnames": "'.$rs["drugnames"].'"}]';
    echo '[{"response": 400}]';
}else{
  echo($outp);
}*/



$conn->close();
//echo($result);
?>