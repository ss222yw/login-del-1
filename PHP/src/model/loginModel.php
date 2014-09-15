<?php

class loginModel {

private $username;
private $password;


public function __construct(){

	@session_start();
	$this -> getUsrInfo();
}

public function getUsrInfo(){


	$lines = "config.txt";

	$fp = fopen($lines, "r");

	$fr = fread($fp, 13);

	$this -> username = substr($fr, 0,5);

	$this -> password = substr($fr, 5);

}

	public function isUserLoggedin(){
	
		if (isset($_SESSION['user']) == true) {
			# code...
			return true;
		}
		return false;
 	}

	public function checkInput($user , $pass){

	if ($user  == $this -> username && $pass == $this -> password) {
		# code...

		$_SESSION['user'] = true;
	}
}

	public function logout(){
			# code...
			unset($_SESSION["user"]);
	
}

}


?>