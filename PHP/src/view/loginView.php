<?php

class loginView{

private $loginModel;
private $CookieStorage;
	

public function __construct(loginModel $loginModel){

	$this -> loginModel = $loginModel;

}

public function SubmitLogin(){
if (isset($_POST['submit']) == true) {

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



	
/*
	public function ifUsrWantToKeepUsrAPass(){
			
			if (isset($_POST['submit']) == true) {
			# code...
			if (isset($_POST['KeepMe']) == true) {
			# code...
			setcookie("nam", $_POST['name'] , - 1);
			setcookie("paw", $_POST['pass'] , - 1);

		//header('Location: ' . $_SERVER['PHP_SELF']);
				
			}
		}
		if (isset($_POST['submitlogout']) == true) {
			# code...
			setcookie("nam", "" , time() -1);
			setcookie("paw" , "" , time() -1);
		}
		
		
		}
*/

}

?>