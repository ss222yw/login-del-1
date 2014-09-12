<?php

class msg{

 //private $msg;
 private $loginModel;
 

 public function showLoginMsg(){
 		$msgLogin = "<strong>Admin är inloggad</strong>
 				 <a href='?logout'>logga ut</a>";
 
 return $msgLogin;	

 }

 public function __construct(loginModel $loginModel){
 	$this -> loginModel = $loginModel;	
 }

 public function didUsrPressLogout(){
 	//if (isset($_GET['logout'])) {
 		# code...
 	//	return true;
 	//}
 	//return false;
 }
}	