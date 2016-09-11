<?php 

class Home extends Controller {
	public function index($name = '', $otherName = ''){
		
		//refers to user model
		//we can do $this->model becuase this class extends Controller, and ->model is incliuded in controller
		
		//creates the user
		$user = $this->model('User');
		$user->name = $name;
		echo "\n echoing user name " . $user->name;


		//directory path
		$this->view('home/index', ['name' => $user->name]);
	}

	public function test($param){
		echo " : " . $param . " : ";
	}


}

?>