<?php

class loginView{

private $loginModel;
	

public function __construct(loginModel $loginModel){

	$this -> loginModel = $loginModel;


	//var_dump($this -> fooPass());
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
		return $_POST['username'];
	}
}
 public function getPassword(){
	if ($this -> password() == true) {
		# code...
		return $_POST['password'];
	}
}

  public function didUsrCheKeepMe(){
		
		if (isset($_POST['KeepMe'])) {
			# code...
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
 					 <label>Användarnamn : </label> <input type='text' name='username' maxlength='10' value='".$this -> getUserName()."'/>
					 <label>Lösenord : </label><input type='password' name='password' maxlength='10'/>
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
			//var_dump($_COOKIE);
			//var_dump(isset($_POST['submitLogin']) == true);
			//var_dump(isset($_POST['KeepMe']) == true);
		
			if (isset($_POST['submitLogin']) == true && isset($_POST['KeepMe']) == true) {
			# code...
		  setcookie("user", $usernameCookie, time()+60*60*24);
		  setcookie("pass", $passwordCookie, time()+60*60*24);

		//header('Location: ' . $_SERVER['PHP_SELF']);
				return true;
			}
			return false;

	
		
	
		}
		public function ifUsrDontWantKeepAnyMore(){
		if (isset($_POST['submitlogout']) == true) {
			# code...
		setcookie("user", "" , time() -1);
		setcookie("pass" , "" , time() -1);
		return true;
		}
		return false;
		}



		public function foo(){
				# code...
			if (isset($_COOKIE['user'])) {
				# code...
				$CookieStorage = $_COOKIE['user'];
				return $CookieStorage;
			}
		return false;

						
		}

		public function fooPass(){
				# code...
			if (isset($_COOKIE['pass'])) {
							# code...
				$CookieStoragePass = $_COOKIE['pass'];
				return $CookieStoragePass;
			}
		return false;
		
		}
		
}

?>