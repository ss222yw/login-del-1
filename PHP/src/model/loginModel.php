<?php

class loginModel {

	private $username;
	private $password;
	private $PasswordCookieFromFile;
	private $DateCookieFromFile;
	private $cryptPass;
	private $CoTime;




	public function __construct(){
		@session_start();
		$this->OpenTextFile();
		$this->OpenTextFileToWrite();
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




	public function OpenTextFileToWrite(){
		$linesWrite = "Cookie.txt";
		$lineWriteCookieTime = "CookieTime.txt";
		$this->cryptPass = $this->getCryptPassword();
		$this->CoTime = $this->getCookieTime();
		$fo = fopen($linesWrite, "w");
		$fopen = fopen($lineWriteCookieTime, "w");
		$fw = fwrite($fo, $this->cryptPass);
		$fwt = fwrite($fopen, $this->CoTime);
		fclose($fo);
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




 	public function getCryptPassword(){
 		return	$passCookie = crypt(md5($this->cryptPass));	
 	}




 	public function getCookieTime(){
 		return $CookieTime = time()+60*60;
 	}
 	



	public function checkInput($user , $pass , $userCookie, $passCookie){
		$this->cryptPass = $passCookie;
		if (($user == $this->username && $pass == $this->password) == true
			|| $passCookie == $this->PasswordCookieFromFile && $userCookie == $this->username) {
				 $_SESSION['session'] = true;
				return true;
		}
		return false;
	}




	public function logout(){
		unset($_SESSION['session']);	
	}



	public function foo(){
		$this->cryptPass;
	}



	public function footwo(){
		$this->PasswordCookieFromFile;
	}

}


?>