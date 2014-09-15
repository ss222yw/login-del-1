<?php

class msg{

 private $loginModel;
 private $loginView;
 

 public function showLoginMsg(){

 	$ret ="";

 	if ($this -> loginView	-> getUsrName() == true && $this -> loginView ->getPassword() == true) {
 		# code...
 		$ret .= "Inloggning lyckades!";
 	}
 		$msgLogin = "
 		<form action='' method='POST' >
 				 <h1>Laboration login del 1</h1>
 				 <h2>Admin är inloggad</h2>
 				 $ret
 				 </br>
 				 </br>
 				 <input type='submit' name='submitlogout' value='Logga ut'/>
 				 </br>
 				 </br>
 				 </form>";
 
 		return $msgLogin;	

	 }

 	public function __construct(loginModel $loginModel){
 		$this -> loginModel = $loginModel;	
 		$this -> loginView = new loginView($this -> loginModel);
 	}

 	public function UsrPressLogout(){
 	
	 	if (isset($_POST['submitlogout']) == true) {
 		# code...
 			return true;
 		
 		}
 			return false;
 	}

}	