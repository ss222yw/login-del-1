<?php
session_start();
//namespace model;
class loginModel {

private $username;
private $password;
//private $UserLoggedin = false;


public function __construct(){

	
	$this -> getUsrInfo();
}

public function getUsrInfo(){


	$lines = "config.txt";


	$fp = fopen($lines, "r");


	$fr = fread($fp, 13);

	$this -> username = substr($fr, 0,5);

	$this -> password = substr($fr, 5);

//	var_dump($this -> username);
//	var_dump($this -> password);

}

	public function isUserLoggedin(){
	//return $this -> UserLoggedin;
		//if (isset($_SESSION['user']) == true) {
			# code...
			return isset($_SESSION['user']);
		//}
		//return false;
 	}

public function checkInput($user , $pass){

//var_dump($user  == $this -> username);
	//	var_dump($this -> username);
 //  var_dump($user);
	if ($user  == $this -> username && $pass == $this -> password) {
		# code...

		// $this -> UserLoggedin = true;

		$_SESSION['user'] = true;
	}
}

	public function logout(){

	unset($_SESSION["user"]);
}

}


?>