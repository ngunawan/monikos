$host = "mysql.danilachenchik.com";
$dbuser = "mnksdbun";
$pass = "mnksdbpw";
$dbname = "mnkstest";
$conn = new mysqli($host, $dbuser, $pass, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT Generic,Brand, Class, Indication, HintLikes, HintDislikes FROM Drug");

function clean($string) {
		$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $rs["DrugId"] = clean($rs["DrugId"]);
    $rs["Generic"] = clean($rs["Generic"]);
    $rs["Brand"] = clean($rs["Brand"]);
    $rs["Class"] = clean($rs["Class"]);
    $rs["Indication"] = clean($rs["Indication"]);
    $outp .= '{"Generic":"'  . $rs["Generic"] . '",';
    $outp .= '"Brand":"'   . $rs["Brand"]        . '",';
    $outp .= '"DrugId":"'   . $rs["DrugId"]        . '",';
    $outp .= '"Class":"'   . $rs["Class"]        . '",';
    $outp .= '"Indication":"'   . $rs["Indication"]        . '",';
    $outp .= '"HintLikes":"'   . $rs["HintLikes"]        . '",';
    //$outp .= '"Indication":"'. $rs["Indication"]     . '"}';
    $outp .= '"HintDislikes":"'. $rs["HintDislikes"]     . '"}';
     //$outp .= '{"username":"'. $rs["username"] . '",';
     //$outp .= '"email":"'. $rs["email"]     . '"}';
}
$outp ='{"records":['.$outp.']}';
$conn->close();

echo($outp);