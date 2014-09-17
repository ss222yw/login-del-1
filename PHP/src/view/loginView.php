<?php

class loginView{

	private $loginModel;
	
	public function __construct(loginModel $loginModel){
	$this -> loginModel = $loginModel;
	}
 
	public function SubmitLogin(){
	if (isset($_POST['submitLogin']) == true) {

	return true;	
	}
	return false;

	}

	public function usrPressLogin(){

	return isset($_POST['submitLogin']);
	}

	public function  userName(){
	if (isset($_POST['username']) == true) {
	return true;
	}
	return false;
	}

	 function password(){
	if (isset($_POST['password']) == true) {
	return true;
	}
	return false;
	}	


	public function getUserName(){
	if ($this -> userName() == true) {
	return htmlentities($_POST['username']);
	}
	}

 	public function getPassword(){
	if ($this -> password() == true) {
	return htmlentities($_POST['password']);
	}
	}

  	public function didUsrCheKeepMe(){
	if (isset($_POST['KeepMe'])) {
		return true; 
		}
		return false;
	}

	public function usrCheckedit(){
		return isset($_POST['KeepMe']);
	}


	public function showLoginView (){
		
		$ret = "";
		
		if ($this -> getUserName() == true && $this -> getPassword() == true) {
			
			if ($this -> loginModel -> isUserLoggedin() == false) {
				$ret .= "Felaktigt användarnamn och/eller lösenord ";
			}
		}

		if ( $this -> usrPressLogin() == true) {
			
	     	if ($this -> userName() == empty($_POST['username']) ){
		
			$ret .= "Användarnamn måste anges!";
		}

		if ($this -> password() == empty($_POST['password'])) {
			
			$ret .= "Lösenordet måste anges!";
		}

		}

		if (isset($_POST['submitlogout']) == true) {
		
			$ret .="Du har nu loggat ut";
		}
		
		$htmlBody = "<h1>Laboration login del 1</h1><h2>Ej Inloggad</h2><form action='' method='POST' >
					 <fieldset>
					 <legend>Login - Skriv in användarnamn och lösenord</legend>
 					 $ret
 					 </br>
 					 <label>Användarnamn : </label> <input type='text' name='username' maxlength='30' value='".$this -> getUserName()."'/>
					 <label>Lösenord : </label><input type='password' name='password' maxlength='30'/>
					 <label>Håll mig inloggad : </label><input type='checkbox' name='KeepMe'/>
					 <input type='submit' name='submitLogin' value='Logga in'/> 
					 </fieldset>
					 </br>
					 </form>" ;

    				 return $htmlBody;
		}
	

	public function ifUsrWantToKeepUsrAPass(){
		$usernameCookie = $this -> loginModel -> getCookUsr();
		$passwordCookie = $this -> loginModel -> getCookPass();
		$InputUserName = $this -> getUserName();
		$InputPassword = $this -> getPassword();
		$HidePassword = md5($passwordCookie);
		$hashed_password = crypt($HidePassword);
		
	 if ($InputUserName == $usernameCookie && $InputPassword == $passwordCookie) {
		
	    if (isset($_POST['submitLogin']) == true && isset($_POST['KeepMe']) == true) {
		
			 setcookie('loginView::user', $usernameCookie, time()+60*60*24);
		 	 setcookie('loginView::pass', $hashed_password , time()+60*60*24);
		  
		  	  return true;
				}
			}
			  return false;		
		}

		public function ifUsrDontWantKeepAnyMore(){
			if ($this -> issetCookieUsername() == true && $this -> issetCookiePassword() == true) {
		
				if (isset($_POST['submitlogout']) == true) {
			
				setcookie('loginView::user', "" , time() -1);
				setcookie('loginView::pass' , "" , time() -1);
				return true;
				}
			}
			}

		public function issetCookieUsername(){
			
			if (isset($_COOKIE['loginView::user'])) {
				
				return true;
			}
				return false;		
		}

		public function issetCookiePassword(){
				
			if (isset($_COOKIE['loginView::pass'])) {
							
				return true;
			}
				return false;
		}
		
}

?>