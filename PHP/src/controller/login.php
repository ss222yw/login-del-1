<?php

require_once("session.php");
require_once("src/view/loginView.php");
require_once("src/model/loginModel.php");


class loginControll{


	private $loginView;
	private $loginModel;

	public function __construct(){

		$this -> loginView = new loginView($this -> loginModel);
		$this -> loginModel = new loginModel();
	}

	public function displayLogin(){

		return $this -> loginView -> showLoginView();

	}

	


}

?>




















