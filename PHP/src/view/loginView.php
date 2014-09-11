<?php

//require_once("src/model/loginModel.php");
class loginView{

private $loginModel;

	public function showLoginView (){
	
		$htmlBody = '<h1>Laboration login del 1</h1><h2>Ej Inloggad</h2><form action="" method="POST" >
		<fieldset>
<legend>Login - Skriv in användarnamn och lösenord</legend>
<label>Användarnamn : </label> <input type="text" name="name" maxlength="10"/>
<label>Lösenord : </label><input type="password" name="password" maxlength="10"/>
<label>Håll mig inloggad : </label><input type="checkbox" name="Auto"/>
<input type="submit" name="submit" value="Logga in"/> 
</fieldset>
</form>' ;

    return $htmlBody;
	}


public function __construct(loginModel $loginModel){

	$this -> loginModel = $loginModel;	
}

public function didUsrPressLogin(){
if (isset($_POST['submit'])) {
	# code...

	return true;

	
}
	return false;

}

public function usrPressLogin(){
	return $_POST['submit'];
}

public function  usrName(){
if (isset($_POST['name']) == true) {
	# code...
	return true;
}
return false;
}

 function passWord(){
	if (isset($_POST['password']) == true) {
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
		return $_POST['password'];
	}
}


}

?>