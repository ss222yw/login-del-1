<?php

require_once("session.php");
require_once("src/view/loginView.php");


class loginControll{


	private $loginView;

	public function __construct(){

		$this -> loginView = new loginView();
	}

	public function displayLogin(){

		return $this -> loginView -> showLoginView();

	}


}


?>




















