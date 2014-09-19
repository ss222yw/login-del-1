<?php

class loginView{

	private $loginModel;

	public function __construct(loginModel $loginModel){
		$this->loginModel = $loginModel;

	} 



	private function pressLogIn(){
		if (isset($_POST['submitLogin']) == true) {
			return true;	
		}
			return false;
	}



	public function submitLogin(){
		return isset($_POST['submitLogin']);
	}



	private function  userName(){
		if (isset($_POST['username']) == true) {
			return true;
		}
			return false;
	}



	private function password(){
		if (isset($_POST['password']) == true) {
			return true;
		}
			return false;
	}



	public function getUserName(){
		if ($this->userName() == true) {
			return htmlentities($_POST['username']);
		}
	}


 	public function getPassword(){
		if ($this->password() == true) {
			return htmlentities($_POST['password']);
		}
	}


  	private function didUsrCheKeepMe(){
		if (isset($_POST['KeepMe'])) {
			return true; 
		}
			return false;
	}



	public function usrCheckedit(){
		return isset($_POST['KeepMe']);
	}



	public function showLoginView ($loggedIn){	
		$ret = "";	
		if ($this->getUserName() == true && $this->getPassword() == true) {
			if ($this->loginModel->isUserLoggedin() == false) {
				$ret .= "Felaktigt användarnamn och/eller lösenord ";
			}
		}

		if ( $this->submitLogin() == true) {
	     	if ($this->userName() == empty($_POST['username']) ){
				$ret .= "Användarnamn måste anges!";
			}

			if ($this->password() == empty($_POST['password'])) {	
				$ret .= "Lösenordet måste anges!";
			}
		}

		if (isset($_POST['submitlogout']) == true) {
			$ret .="Du har nu loggat ut";
		}
		else{
				if ($this->IsSetCookies() == true && $loggedIn == false) {
				$ret .= "Fel cookie information";
			}
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
	    if (isset($_POST['submitLogin']) == true && isset($_POST['KeepMe']) == true) {		
				$userCookie = $_POST['username'];
				$passCookie = $this->loginModel->getCryptPassword();
			 	setcookie('loginView::user', $userCookie,$this->loginModel->getCookieTime());
		 	 	setcookie('loginView::pass', $passCookie ,$this->loginModel->getCookieTime());
		  	    return true;
		}
				return false;
	}




	public function ifUsrDontWantKeepAnyMore(){
		if ($this->issetCookieUsername() == true && $this->issetCookiePassword() == true) {
			if (isset($_POST['submitlogout']) == true) {
				setcookie('loginView::user', "" , time() -1);
				setcookie('loginView::pass' , "" , time() -1);
				unset($_SESSION['session']);
				return true;
				}
				return false;
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




	public function IsSetCookies(){
		if ($this->issetCookiePassword() == true 
			&& $this->issetCookieUsername() == true) {
				return true;
		}
				return false;
	}
}

?>