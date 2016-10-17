<?php 

class Mnemonics extends Controller {

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
		//echo "\n echoing user name " . $user->name;


		//directory path
		//$this->view('games/names', ['name' => $user->name]);
		$this->view('mnemonics/mnemonic-form');
	}
//
	public function form(){
		$this->view('mnemonics/mnemonic-form');	
	}

//	public function menu($lid = ''){
//		$this->view('games/gamemenu', ['lid'=> $lid]);	
//	} 

//	public function game1($lid = ''){
//		$this->view('games/game1',['lid'=> $lid]);
//	}
}

?>