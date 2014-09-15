<?php

class loggedInView{

 private $loginModel;
 private $loginView;
 
 
 public function showLoggedIn(){

 	$ret ="";

 	if ($this -> loginView	-> getUserName() == true && $this -> loginView ->getPassword() == true) {
 		# code...
 		$ret .= "Inloggning lyckades!";
 	}
 		$LoggedInForm = "
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
 
 		return $LoggedInForm;	

	 }

 	public function __construct(loginModel $loginModel){
 		$this -> loginModel = $loginModel;	
 		$this -> loginView = new loginView($this -> loginModel);
 	}

 	public function SubmitLogout(){
 	
	 	if (isset($_POST['submitlogout']) == true) {

 			return true;
 		}
 			return false;
 	}

}	