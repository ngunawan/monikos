<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//Metis database
/*$host = "metis.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "Metis";
$pass = "Metis200";
$dbname = "Metis";
$conn = new mysqli($host, $dbuser, $pass, $dbname);
*/

/*temp database */
/*$host = "mysql.danilachenchik.com";
$dbuser = "mnksdbun";
$pass = "mnksdbpw";
$dbname = "mnkstest";
$conn = new mysqli($host, $dbuser, $pass, $dbname);
*/
require_once 'db_creds.php';

/*
$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
$dbuser = "monikosdbun";
$pass = "monikosdbpw";
$dbname = "monikosdb";
$conn = new mysqli($host, $dbuser, $pass, $dbname);
*/

//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//} 

//$result = $conn->query("SELECT DrugId, Generic,Brand, Class, Indication, HintLikes, HintDislikes FROM Drug");
$result = $conn->query("SELECT * FROM Drug");
//$result = json_decode($result);

//echo "here";

function clean($string) {
    //adds div class to Mnemonics
    $string = str_replace('(', '(<div class=key-terms>', $string); 
    $string = str_replace(')', '</div>)', $string);
    
    return $string;
    //    return preg_replace(' ', '-', $string); // Removes special chars.
    //   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function cleanPlus($string) {
    $string = str_replace('+', '', $string); 
    
    return $string;
    
}

//encodes string to utf8
function utf8_encode_deep(&$input) {
    if (is_string($input)) {
        $input = utf8_encode($input);
    } else if (is_array($input)) {
        foreach ($input as &$value) {
            utf8_encode_deep($value);
        }

        unset($value);
    } else if (is_object($input)) {
        $vars = array_keys(get_object_vars($input));

        foreach ($vars as $var) {
            utf8_encode_deep($input->$var);
        }
    }
}



$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    //    $rs["Brand/Generic Hint"] = clean(json_decode($rs["Brand/Generic Hint"]));
    $rs["Brand/Generic Hint"] = clean($rs["Brand/Generic Hint"]);
     $rs["Class"] = cleanPlus($rs["Class"]);
     $rs["Indication"] = cleanPlus($rs["Indication"]);
     $rs["Black Box Warning"] = cleanPlus($rs["Black Box Warning"]);
    //    $rs["Side Effects"] = clean($rs["Side Effects"]);

    ////   
    $rs["Generic"] = json_encode($rs["Generic"]);
    $rs["DrugId"] = json_encode($rs["DrugId"]);
    $rs["Brand"] = json_encode($rs["Brand"]);
    $rs["Class"] = json_encode($rs["Class"]);
    utf8_encode_deep($rs["Indication"]);
    $rs["Indication"] = json_encode($rs["Indication"]);
    utf8_encode_deep($rs["Black Box Warning"]);
    $rs["Black Box Warning"] = json_encode($rs["Black Box Warning"]);
    utf8_encode_deep($rs["Brand/Generic Hint"]);
    $rs["Brand/Generic Hint"] = json_encode($rs["Brand/Generic Hint"]);
    utf8_encode_deep($rs["Side Effects"]);
    $rs["Side Effects"] = json_encode($rs["Side Effects"]);
    utf8_encode_deep($rs["Generic Audio"]);
    $rs["Generic Audio"] = json_encode($rs["Generic Audio"]);


    //    if(is_utf8($rs["Brand/Generic Hint"])) {
    //        $rs["Brand/Generic Hint"] = json_encode($rs["Brand/Generic Hint"]);
    //    } else {
    //        $rs["Brand/Generic Hint"] = "";
    //    }


    //    $rs["Brand/Generic Hint"] = preg_replace('/,', '', $rs["Brand/Generic Hint"]);

    //    	$rs["Generic"] = clean($rs["Generic"]);
    //	$rs["DrugId"] = clean($rs["DrugId"]);
    //	$rs["Brand"] = clean($rs["Brand"]);
    //	$rs["Class"] = clean($rs["Class"]);
    //	$rs["Indication"] = clean($rs["Indication"]);
    //    $rs["Side Effects"] = clean($rs["Side Effects"]);
    //    $rs["Black Box Warning"] = clean($rs["Black Box Warning"]);


    $outp .= '{"Generic":'  . $rs["Generic"] . ',';
    $outp .= '"DrugId":'   . $rs["DrugId"]        . ',';
    $outp .= '"Brand":'   . $rs["Brand"]        . ',';
    $outp .= '"Class":'   . $rs["Class"]        . ',';
    $outp .= '"Indication":'   . $rs["Indication"]        . ',';
    $outp .= '"Side Effects":'   . $rs["Side Effects"]        . ',';
    $outp .= '"Black Box Warning":'   . $rs["Black Box Warning"]        . ',';
    $outp .= '"Mnemonic":'. $rs["Brand/Generic Hint"]       . ',';
    $outp .= '"Generic Audio":'. $rs["Generic Audio"]       . ',';
    $outp .= '"HintLikes":"'   . $rs["HintLikes"]        . '",';
    //    $outp .= '"Indication":"'. $rs["Indication"]     . '"}';
    $outp .= '"HintDislikes":"'. $rs["HintDislikes"]     . '"}';
    //$outp .= '{"username":"'. $rs["username"] . '",';
    //$outp .= '"email":"'. $rs["email"]     . '"}';


}
$outp ='{"records":['.$outp.']}';
//$outp = json_encode($outp);



//echo $outp;

$conn->close();

echo($outp);
?>