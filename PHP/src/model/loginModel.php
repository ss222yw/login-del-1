<?php


class loginModel {

private $username;
private $password;
private $UserLoggedin = false;


public function __construct(){
	//$this -> getUsrInfo();
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
	return $this -> UserLoggedin;
 	}

public function checkInput($user , $pass){

//var_dump($user  == $this -> username);
	//	var_dump($this -> username);
 //  var_dump($user);
	if ($user  == $this -> username && $pass == $this -> password) {
		# code...

		 $this -> UserLoggedin = true;
	}
	//echo "fel";
}


	
}

?>