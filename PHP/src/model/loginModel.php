<?php

namespace model;
	
class loginModel {

	private $username;
	private $password;
	private $PasswordCookieFromFile;
	private $DateCookieFromFile;
	private $lines = "config.txt";
	private $linesWrite = "Cookie.txt";
	private $lineWriteCookieTime = "CookieTime.txt";
	private $session = "session";


	public function __construct(){
		@session_start();
		$this->OpenTextFile();
		$this->OpenTextFileToRead();
		$this->OpenTextFileToReadDate();
	}

	public function compareWeb($isVaild){
		if ($isVaild ==  $_SESSION[$this->session]) {
			return true;
		}
		return false;
	}



	public function OpenTextFile(){
		
		$fp = fopen($this->lines, "r");
		$fr = fread($fp, 13);
		$this->username = substr($fr, 0,5);
		$this->password = substr($fr, 5);
	}




	public function OpenTextFileToWrite($cryptPass , $CookieTimeNow){
		
		$fo = fopen($this->linesWrite, "w");
		$fw = fwrite($fo, $cryptPass);
		fclose($fo);

		
		$fopen = fopen($this->lineWriteCookieTime, "w");
		$fwt = fwrite($fopen, $CookieTimeNow);
		fclose($fopen);
	}




	public function OpenTextFileToRead(){
		if ($this->IfEmptyPasswordFile() > 0) {
			
			$fo = fopen($this->linesWrite, "r");
			$fr = fread($fo, filesize($this->linesWrite));
			fclose($fo);
			$this->PasswordCookieFromFile = $fr;
		}
		return;
	}




	public function OpenTextFileToReadDate(){
		if ($this->IfEmptyDateFile() > 0) {

			$fp = fopen($this->lineWriteCookieTime, "r");
			$fr = fread($fp, filesize($this->lineWriteCookieTime));
			fclose($fp);
			$this->DateCookieFromFile = $fr;
		}
		return;
	}




	public function IfEmptyPasswordFile(){
		$checkPasswordFile = @file($this->linesWrite);
		if ($checkPasswordFile === false) {
			return 0;
		}
		return count($checkPasswordFile);
	}




	public function IfEmptyDateFile(){
		$checkDateFile = @file($this->lineWriteCookieTime);
		if ($checkDateFile == false) {
			return 0;
		}
		return count($checkDateFile);
	}




	public function isUserLoggedin(){
		if (isset($_SESSION[$this->session]) == true) {
			return true;
		}
		return false;
 	}


	public function checkInput($user , $pass , $userCookie, $passCookie , $CookieTimeNow , $web){

		if (($user == $this->username && $pass == $this->password) == true
						|| $passCookie == $this->PasswordCookieFromFile && 
										 $userCookie == $this->username &&
							$CookieTimeNow < (int)$this->DateCookieFromFile ){

				 $_SESSION[$this->session] = $web;
				 return true;
		}
		return false;
	}



	public function logout(){
		unset($_SESSION[$this->session]);	
	}

}


?>