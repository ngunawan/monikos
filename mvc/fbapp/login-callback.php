<?php
header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");
session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '116488348813741',
  'app_secret' => '6e84eeccc1b6c5681573168f3975a3ba',
  'default_graph_version' => 'v2.7'
]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);

  try {
  
    $requestProfile = $fb->get("/me?fields=name,email");
    $profile = $requestProfile->getGraphNode()->asArray();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }

  //$_SESSION['name'] = $profile['FBSessionName']; //sessional variable stored as users name

  //echo "we in the fb php";
  //echo

  /*$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
  $dbuser = "monikosdbun";
  $pass = "monikosdbpw";
  $dbname = "monikosdb";
  $conn = new mysqli($host, $dbuser, $pass, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  } 

  $sql = "SELECT * FROM Users WHERE id LIKE '".$profile["id"]."'";
  if ($conn->query($sql) === TRUE) {
    echo '[{
    "response": 200,
    "username": "'.$_POST["username"].'",
    "email": "'.$_POST["email"].'",
    "password": "'.$_POST["password"].'"}]';
  } else {
    echo '[{"response":"'.$conn->error.'"}]';
  }*/
  




  echo '{
    "fbname": "'.$profile["name"].'",
    "fbid": "'.$profile["id"].'"}'; 
  //setcookie('FBname', $profile['name'], time() + (3600 * 8), "/dj/javascriptDJ/"); //expires in 8 hours
  //setcookie('FBid', $profile['id'], time() + (3600 * 8), "/dj/javascriptDJ/");
  //header('location: ../');
  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}
