<?php

//require_once("CookieStorage.php");

class loginView{

private $loginModel;
//private $msg;

public function __construct(loginModel $loginModel){

	$this -> loginModel = $loginModel;
	//$this -> messages = new \view\ CookieStorage();
}

public function didUsrPressLogin(){
if (isset($_POST['submit']) == true) {
	# code...

	return true;

	
}
	return false;

}

public function usrPressLogin(){
	return isset($_POST['submit']);
	//$_POST['submit'];
}

public function  usrName(){
if (isset($_POST['name']) == true) {
	# code...
	return true;
}
return false;
}

 function passWord(){
	if (isset($_POST['pass']) == true) {
		# code...
		return true;
	}
	return false;
}


public function getUsrName(){
	if ($this -> usrName() == true) {
		# code...
		return $_POST['name'];
	}
}
 public function getPassword(){
	if ($this -> passWord() == true) {
		# code...
		return $_POST['pass'];
	}
}


	public function showLoginView (){
		
				$ret = "";
		
		
		if ($this -> getUsrName() == true && $this -> getPassword() == true) {
			# code...
			if ($this -> loginModel -> isUserLoggedin() == false) {
				# code...
				$ret .= "Felaktigt användarnamn och/eller lösenord ";
			}
		}

		if ( $this -> usrPressLogin() == true) {
			# code...
				if ($this -> usrName() == empty($_POST['name']) ){
			# code...
			$ret .= "Användarnamn måste anges!";
		}
		if ($this -> password() == empty($_POST['pass'])) {
			# code...
			$ret .= "Lösenordet måste anges!";
		}

		}
		if (isset($_POST['submitlogout']) == true) {
			# code...
			$ret .="Du har nu loggat ut";
		}
		

		
		$htmlBody = "<h1>Laboration login del 1</h1><h2>Ej Inloggad</h2><form action='' method='POST' >
		<fieldset>
<legend>Login - Skriv in användarnamn och lösenord</legend>
 $ret
 </br>
<label>Användarnamn : </label> <input type='text' name='name' maxlength='10'/>
<label>Lösenord : </label><input type='password' name='pass' maxlength='10'/>
<label>Håll mig inloggad : </label><input type='checkbox' name='Auto'/>
<input type='submit' name='submit' value='Logga in'/> 
</fieldset>
</form>" ;

    return $htmlBody;
	}



	//public function didUsrCheKeepMe(){
	//	if (isset($_POST['Auto'])) {
			# code...
	//		return true;
	//	}
	//	return false;
	//}

	//public function usrCheckedit(){
	//	return isset($_POST['Auto']);
	//}

	

	//public function ifUsrWantToKeepUsrAPass(){
		//var_dump($this -> usrCheckedit());
		//var_dump($this -> usrPressLogin());
	//	if ($this -> usrPressLogin() == true && $this -> usrCheckedit() == true) {
			# code...

			# code...
		//	$this -> test ->save("name" , "pass");
			//setcookie("nam", $_POST['name'] , time() -1);
			//setcookie("paw", $_POST['pass'] , time() -1);

				//var_dump($_COOKIE);
	//	}
	//	else
	//	{
			//$ret = $this -> test ->load();
			//setcookie("nam", "" , time() -1);
			//setcookie("paw" , "" , time() -1);
	//	}
		//return $ret;
	//}

}

?>