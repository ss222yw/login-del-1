<?php

class loginModel {

private $username;
private $password;

public function __construct(){
	@session_start();
	$this -> OpenTextFile();
}

public function OpenTextFile(){

	$lines = "config.txt";

	$fp = fopen($lines, "r");
	$fr = fread($fp, 13);

	$this -> username = substr($fr, 0,5);
	$this -> password = substr($fr, 5);

}

	public function isUserLoggedin(){
	
		if (isset($_SESSION['session']) == true) {
			
			return true;
		}
		return false;
 	}

	public function checkInput($user , $pass){

	if ($user  == $this -> username && $pass == $this -> password) {

		$_SESSION['session'] = true;
	}
}

	public function logout(){

		unset($_SESSION["session"]);	
}

	public function getCookUsr(){
		return $this -> username;
	}

	public function getCookPass(){
		return	 md5($this -> password);
	}

	}


?>