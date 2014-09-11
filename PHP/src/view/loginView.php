<?php

//require_once("src/model/loginModel.php");
class loginView{

private $loginModel;

	public function showLoginView (){
	
		$htmlBody = '<form action="" method="POST" >
<h1>Login - Skriv in användarnamn och lösenord</h1>
<p>
<label>Användarnamn : </label> <input type="text" name="name" maxlength="10"/>
<label>lösenord : </label><input type="password" name="password" maxlength="10"/>
<label>Håll mig inloggad</label><input type="checkbox" name="Auto"/>
<br/>
<br/>
</p>
<input type="submit" name="submit" value="logga in"/> 
</form>';

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