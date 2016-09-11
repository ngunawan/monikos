<?php

class App {

	protected $controller = "home";

	protected $method = "index";

	protected $params = [];

	public function __construct(){
		echo "what!";
		print_r($this->parseUrl());
		$url = $this->parseUrl();
	}

	public function parseUrl(){
		if(isset($_GET['url'])){
			echo $_GET['url'];

			return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
		}
	}

}

?>