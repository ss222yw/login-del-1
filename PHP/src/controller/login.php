<?php

require_once("session.php");
require_once("src/view/loginView.php");
require_once("src/view/msg.php");
require_once("src/model/loginModel.php");


class loginControll{


	private $loginView;
	private $loginModel;
	


	public function __construct(){
		$this -> loginModel = new loginModel();
		$this -> loginView = new loginView($this -> loginModel);
		$this -> msg = new msg($this -> loginModel);
		



	}

	public function displayLogin(){

		return $this -> loginView -> showLoginView();

	}

	public function getUsrInfo(){

		$this -> loginModel -> getUsrInfo();
	}


	public function IsUsrLoggedIn(){
		
		//if () {
			# code...


		//}
	}

	public function showLoginMsg(){
		return $this -> msg -> showLoginMsg();
	}

	

	public function getUsr(){
		$user = $this -> loginView -> getUsrName();
//		var_dump($user);
	}


	public function getPass(){
		$pass = $this -> loginView -> getPassword();

	}

}

?>




















