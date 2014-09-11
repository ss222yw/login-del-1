<?php

class session{

private $user;

	public function __construct(){
		session_start();
	}

	public function login(){

		
	}

	public function logout(){

		//session_unset();

	}

	public function isUserLoggedin(){
		if (isset($_SESSION['name'])) {
			# code...

			return true;
		}
		return false;

	}
}


?>
