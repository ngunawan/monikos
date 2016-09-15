<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//alt database
/*$host = "phpmyadmin.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "phpMyAdmin";
$pass = "phpMyAdmin";
$dbname = "phpMyAdminDatabase";
*/


$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "monikosdbun";
$pass = "monikosdbpw";
$dbname = "monikosdb";
$conn = new mysqli($host, $dbuser, $pass, $dbname);

$result = $conn->query("SELECT Generic,Brand, Class, Indication, HintLikes, HintDislikes FROM Drug");

//echo "here";

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Generic":"'  . $rs["Generic"] . '",';
    $outp .= '"Brand":"'   . $rs["Brand"]        . '",';
    $outp .= '"Class":"'   . $rs["Class"]        . '",';
    $outp .= '"Indication":"'   . $rs["Indication"]        . '",';
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