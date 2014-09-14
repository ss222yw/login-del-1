<?php

class msg{

 //private $msg;
 private $loginModel;
 

 public function showLoginMsg(){
 		$msgLogin = "
 				 <h1>Laboration login del 1</h1>
 				 </br>
 				 <h2>Admin är inloggad</h2>
 				 </br>
 				 <a href='?logout'>Logga ut</a>
 				 </br>
 				 </br>";
 
 return $msgLogin;	

 }

 public function __construct(loginModel $loginModel){
 	$this -> loginModel = $loginModel;	
 }

 public function UsrPressLogout(){
 	//var_dump($_GET['logout']);
 	if (isset($_GET['logout']) == true) {
 		# code...
 		return true;
 		
 	}
 	return false;
 }

 public function didUsrPressLogout(){
 	return isset($_GET['logout']);
 }

}	