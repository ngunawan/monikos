<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once 'db_creds.php';


$result = $conn->query("SELECT id,capsules FROM Users WHERE id = '" .$_POST['id']. "'");
//$result = $conn->query("SELECT id,capsules FROM Users WHERE id = '2'");


$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
   
    $rs["id"] = json_encode($rs["id"]);
    $rs["capsules"] = json_encode($rs["capsules"]);


    $outp .= '{"id":'  . $rs["id"] . ',';
    $outp .= '"capsules":'. $rs["capsules"]     . '}';
    //$outp .= '{"username":"'. $rs["username"] . '",';
    //$outp .= '"email":"'. $rs["email"]     . '"}';


}
$outp ='{"records":['.$outp.']}';

$conn->close();
echo($outp);
?>