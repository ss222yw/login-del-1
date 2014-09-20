<?php

class loginModel {

	private $username;
	private $password;
	private $PasswordCookieFromFile;
	private $DateCookieFromFile;




	public function __construct(){
		@session_start();
		$this->OpenTextFile();
		$this->OpenTextFileToRead();
		$this->OpenTextFileToReadDate();
	}




	public function OpenTextFile(){
		$lines = "config.txt";
		$fp = fopen($lines, "r");
		$fr = fread($fp, 13);
		$this->username = substr($fr, 0,5);
		$this->password = substr($fr, 5);
	}




	public function OpenTextFileToWrite($cryptPass , $CookieTimeNow){
		$linesWrite = "Cookie.txt";
		$fo = fopen($linesWrite, "w");
		$fw = fwrite($fo, $cryptPass);
		fclose($fo);

		$lineWriteCookieTime = "CookieTime.txt";
		$fopen = fopen($lineWriteCookieTime, "w");
		$fwt = fwrite($fopen, $CookieTimeNow);
		fclose($fopen);
	}




	public function OpenTextFileToRead(){
		if ($this->IfEmptyPasswordFile() > 0) {
			$linesWrite = "Cookie.txt";
			$fo = fopen($linesWrite, "r");
			$fr = fread($fo, filesize($linesWrite));
			fclose($fo);
			$this->PasswordCookieFromFile = $fr;
		}
		return;
	}




	public function OpenTextFileToReadDate(){
		if ($this->IfEmptyDateFile() > 0) {
			$lineWriteCookieTime = "CookieTime.txt";
			$fp = fopen($lineWriteCookieTime, "r");
			$fr = fread($fp, filesize($lineWriteCookieTime));
			fclose($fp);
			$this->DateCookieFromFile = $fr;
		}
		return;
	}




	public function IfEmptyPasswordFile(){
		$checkPasswordFile = @file("Cookie.txt");
		if ($checkPasswordFile === false) {
			return 0;
		}
		return count($checkPasswordFile);
	}




	public function IfEmptyDateFile(){
		$checkDateFile = @file("CookieTime.txt");
		if ($checkDateFile == false) {
			return 0;
		}
		return count($checkDateFile);
	}




	public function isUserLoggedin(){
		if (isset($_SESSION['session']) == true) {
			return true;
		}
		return false;
 	}


	public function checkInput($user , $pass , $userCookie, $passCookie , $CookieTimeNow){

		if (($user == $this->username && $pass == $this->password) == true
						|| $passCookie == $this->PasswordCookieFromFile && 
										 $userCookie == $this->username &&
							$CookieTimeNow < (int)$this->DateCookieFromFile ){

				 $_SESSION['session'] = true;
				 return true;
		}
		return false;
	}




	public function logout(){
		unset($_SESSION['session']);	
	}

}


?>