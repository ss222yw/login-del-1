<?php

require_once("src/view/loginView.php");
require_once("src/view/loggedInView.php");
require_once("src/model/loginModel.php");


class loginControll{


	private $loginView;
	private $loginModel;
	private $loggedInView;

	public function __construct(){
		$this -> loginModel = new  loginModel();
		$this -> loginView = new loginView($this -> loginModel);
		$this -> loggedInView = new loggedInView($this -> loginModel);
		$this -> getUsrAndPass();	
		$this -> keepMe();
		$this -> DontKeep();
		//var_dump($_COOKIE);
		//var_dump($this -> loginView -> foo() == true && $this -> loginView -> fooPass() == true);

	}

		public function getUsrAndPass(){
		
		$pass = $this -> loginView -> getPassword();
		$user = $this -> loginView -> getUserName();
		$this -> loginModel -> checkInput($user , $pass);
	}

 	public function isUsrLoggedOut(){

 		if ($this -> loggedInView -> SubmitLogout() == true) {
 		
 			 $this -> loginModel -> logout();
 		}

 	}
	public function displayLogin(){

		if ($this -> isUsrLoggedOut() == true ) {
			
			return $this -> loginView -> showLoginView();
		}
		if ($this -> loginModel -> isUserLoggedin() == true) {
		
			return  $this -> loggedInView -> showLoggedIn(); 
		}
		else
		{
			return $this -> loginView -> showLoginView();
		}		
	}


 	public function keepMe(){
 		
 			
 	if ( $this -> loginView -> ifUsrWantToKeepUsrAPass() == true) {
 		# code...
 		return true;
 		 
 		 	}

 	
   			return false;
 		
 	}

 	public function DontKeep(){
 		if ($this -> loginView -> ifUsrDontWantKeepAnyMore() == true) {
 			# code...
 			return true;
 		}
 		return false;
 	}

 
 	public function fooTest(){

 		if ($this -> loginView -> foo() == true && $this -> loginView -> fooPass() == true ) {
 			# code...
 			return true;
 		}
 		if ($this -> loginView -> foo() == false || $this -> loginView -> fooPass() == false) {
 			# code...
 		 	return false;
 		}
 	}
 	}

?>
