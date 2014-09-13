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

 public function didUsrPressLogout(){
 	//var_dump($_GET['logout']);
 	if (isset($_GET['logout'])) {
 		# code...
 		//echo "Du har nu loggat ut";
 		//header("Location: index.php");
//	header("Location:" . $_SERVER["PHP_SELF"]); 
 		return true;
 		
 	}
 	return false;
 }

}	