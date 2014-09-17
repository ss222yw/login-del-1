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
		$this -> loginView -> ifUsrWantToKeepUsrAPass();
		//var_dump($_COOKIE);
	//	var_dump($this -> loginView -> foo() == true && $this -> loginView -> fooPass() == true);

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
//var_dump($this -> loginView -> ifUsrDontWantKeepAnyMore() == true);
		if ($this -> isUsrLoggedOut() == true || $this -> loginView -> ifUsrDontWantKeepAnyMore() == true) {
			
			return $this -> loginView -> showLoginView();
		}
		if ($this -> loginModel -> isUserLoggedin() == true) {
		
			return  $this -> loggedInView -> showLoggedIn(); 
		}
		if ($this -> loginView -> issetCookieUsername() == true && $this -> loginView -> issetCookiePassword() == true ) {
 			# code...
 			return  $this -> loggedInView -> showLoggedIn(); 
 		}
 
		else
		{
			return $this -> loginView -> showLoginView();
		}		
	}






 	}

?>
