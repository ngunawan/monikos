<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'db_creds.php';

$sql = "SELECT * FROM SchoolLists WHERE schoolid LIKE '".$_POST["school_id"]."'";
$result = $conn->query($sql);

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"list_id":"'  . $rs["lid"] . '",';
    $outp .= '"list_name":"'   . $rs["name"]        . '",';
    $outp .= '"drugnames":"'. $rs["drugnames"]     . '"}';
   
}
$outp ='{"records":['.$outp.']}';
echo($outp);




$conn->close();

?>