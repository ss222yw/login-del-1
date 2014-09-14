<?php

//namespace controller;

require_once("src/view/loginView.php");
require_once("src/view/msg.php");
require_once("src/model/loginModel.php");


class loginControll{


	private $loginView;
	private $loginModel;
	private $msg;

	public function __construct(){
		$this -> loginModel = new  loginModel();
		$this -> loginView = new loginView($this -> loginModel);
		$this -> msg = new msg($this -> loginModel);
		//$this -> showLoginMsg();
		//var_dump($this -> showLoginMsg());


	}

	public function displayLogin(){

		return $this -> loginView -> showLoginView();

	}

	public function getUsrInfo(){

		$this -> loginModel -> getUsrInfo();
	}


	public function getUsrAndPass(){
		
		$pass = $this -> loginView -> getPassword();
		$user = $this -> loginView -> getUsrName();

		//var_dump($user);
		//var_dump($pass);

		$this -> loginModel -> checkInput($user , $pass);
	}



	public function showLoginMsg(){

		return  $this -> msg -> showLoginMsg();
	}


	public function usrPressLogin(){
	
	if ($this -> loginView -> usrPressLogin()) {
		# code...
		echo "string";
		$this -> getUsrAndPass();
	}
	}

	public function isUserLoggedin(){

	 return $this -> loginModel -> isUserLoggedin(); 
 	}

 	public function isUsrLoggedOut(){
 		if ($this -> msg -> didUsrPressLogout()) {
 			# code...
 			 $this -> loginModel -> logout();
 			 
 		}
 		return false;
 	}


 	//public function keepMe(){
 		//var_dump($this -> loginView -> ifUsrWantToKeepUsrAPass());
 	//	return $this -> loginView -> ifUsrWantToKeepUsrAPass();
 //	}
}

?>
