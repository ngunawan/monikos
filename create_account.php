<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$posts = var_dump($_POST);
echo $posts;

$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "monikosdbun";
$pass = "monikosdbpw";
$dbname = "monikosdb";
$conn = new mysqli($host, $dbuser, $pass, $dbname);

//$result = $conn->query("SELECT Generic,Brand FROM Dr);
//$result = $conn->query("INSERT INTO Users (id, username, email, password) VALUES (NULL, ".$username.",". $email .",". $password .");");
//$result = $conn->query("INSERT INTO Users (id, username, email, password) VALUES (NULL, wow, wow@wow.com, dawg);");

// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Users (id, username, email, password)
VALUES (NULL, '".$_POST["username"]."', '".$_POST["email"]."', '".$_POST["password"]."')";

if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "username": "john",
    "email": "john@john.com",
    "password": "kkkjnkd"}]';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



/*$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Generic":"'  . $rs["Generic"] . '",';
    //$outp .= '"Brand":"'   . $rs["Brand"]        . '",';
    //$outp .= '"Class":"'   . $rs["Class"]        . '",';
    //$outp .= '"Indication":"'. $rs["Indication"]     . '"}';
    $outp .= '"Brand":"'. $rs["Brand"]     . '"}';
     //$outp .= '{"username":"'. $rs["username"] . '",';
     //$outp .= '"email":"'. $rs["email"]     . '"}';
}
$outp ='{"records":['.$outp.']}';*/
//$conn->close();

echo($result);
?>