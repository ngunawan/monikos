<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//alt database
$host = "metis.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "Metis";
$pass = "Metis200";
$dbname = "Metis";
$conn = new mysqli($host, $dbuser, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

/*
$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "monikosdbun";
$pass = "monikosdbpw";
$dbname = "monikosdb";
$conn = new mysqli($host, $dbuser, $pass, $dbname);
*/

//$result = $conn->query("SELECT DrugId, Generic,Brand, Class, Indication, HintLikes, HintDislikes FROM Drug");
$result = $conn->query("SELECT * FROM Drug");

//echo "here";

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
	$rs["Generic"] = clean($rs["Generic"]);
	$rs["DrugId"] = clean($rs["DrugId"]);
	$rs["Brand"] = clean($rs["Brand"]);
	$rs["Class"] = clean($rs["Class"]);
	$rs["Indication"] = clean($rs["Indication"]);
    $rs["Side Effects"] = clean($rs["Side Effects"]);
    $rs["Black Box Warning"] = clean($rs["Black Box Warning"]);
    $outp .= '{"Generic":"'  . $rs["Generic"] . '",';
    $outp .= '"DrugId":"'   . $rs["DrugId"]        . '",';
    $outp .= '"Brand":"'   . $rs["Brand"]        . '",';
    $outp .= '"Class":"'   . $rs["Class"]        . '",';
    $outp .= '"Indication":"'   . $rs["Indication"]        . '",';
    $outp .= '"Side Effects":"'   . $rs["Side Effects"]        . '",';
    $outp .= '"Black Box Warning":"'   . $rs["Black Box Warning"]        . '",';
    $outp .= '"HintLikes":"'   . $rs["HintLikes"]        . '",';
    //$outp .= '"Indication":"'. $rs["Indication"]     . '"}';
    $outp .= '"HintDislikes":"'. $rs["HintDislikes"]     . '"}';
     //$outp .= '{"username":"'. $rs["username"] . '",';
     //$outp .= '"email":"'. $rs["email"]     . '"}';
}
$outp ='{"records":['.$outp.']}';

//echo $outp;

$conn->close();

echo($outp);
?>