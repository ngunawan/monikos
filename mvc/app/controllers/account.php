<?php 

class Account extends Controller {

	protected $user;

	public function __construct(){
		$this->user = $this->model('User');
	}


	public function index($name = '', $otherName = ''){
		
		//refers to user model
		//we can do $this->model becuase this class extends Controller, and ->model is incliuded in controller
		
		//creates the user
		$user = $this->model('User');
		$user->name = $name;
		echo "\n echoing user name " . $user->name;


		//directory path
		$this->view('account/index', ['name' => $user->name]);
	}

	public function test($param){
		echo " : " . $param . " : ";
	}

	public function create($username = '', $email = '', $password = ''){
		/*header("Access-Control-Allow-Origin: *");
		header("Content-Type: application/json; charset=UTF-8");
		$host = "monikosdb.ci7ganrx1sxe.us-east-1.rds.amazonaws.com:3306";
		$dbuser = "monikosdbun";
		$pass = "monikosdbpw";
		$dbname = "monikosdb";
		$conn = new mysqli($host, $dbuser, $pass, $dbname);

		$result = $conn->query("INSERT INTO Users (id, username, email, password) VALUES (NULL, ".$username.",". $email .",". $password .");");
		*/
		$this->view('account/index', ['name' => $user->name, 
									'username' => $username,
									'email' => $email,
									'password' => $password]);	

		//$this->user->create([
		//User::create([
		//	'username' => $username,
		//	'email' => $email
		//]);
	}


}

?>