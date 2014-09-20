<?php
	
	namespace controller;

   	require_once("src/view/loginView.php");
	require_once("src/view/logOutView.php");
	require_once("src/model/loginModel.php");


class loginControll{

		private $loginView;
		private $loginModel;
		private $logOutView;
		private $loggedIn = false;




		public function __construct(){
			$this->loginModel = new \model\loginModel();
			$this->loginView = new \view\loginView($this->loginModel);
			$this->logOutView = new \view\logOutView($this->loginModel);
		}




		private function getUsrAndPass(){

			$pass = $this->loginView->getPassword();
			$user = $this->loginView->getUserName();
			$userCookie = $this->loginView->getCookieUsername();
 			$passCookie = $this->loginView->getCookiePassword();
 			$CookieTimeNow = time();
			return $this->loginModel-> checkInput($user , $pass, $userCookie, $passCookie , $CookieTimeNow);
		}




 		public function isUsrLoggedOut(){
 			if ($this->logOutView->SubmitLogout() == true) {
 				 $this->loginModel->logout();
 			}
 		}
 			



 		public function didLoginThisRequest(){
			if ($this->getUsrAndPass() == true) {
				if ($this->loginView->usrCheckedit() == true) {
						$this->loginView->ifUsrWantToKeepUsrAPass();
					}
				return true;
			} 	
			return false;
 		}




		public function displayLogin(){
			$this->isUsrLoggedOut();
			if ($this->loginView->ifUsrDontWantKeepAnyMore() == true) {
				   return $this->loginView->showLoginView($this->loggedIn);
			}

			if ($this->loginView->submitLogin() == true 
				&& $this->loginModel->isUserLoggedin() == true	
						|| $this->loginView->IsSetCookies() == true
						 && $this->loginModel->isUserLoggedin() == true) {

					$this->loggedIn;
						
			}
			else
			{
					$this->loggedIn = $this->didLoginThisRequest();
			}

					
			if ($this->loginModel->isUserLoggedin() == true) {
				return  $this->logOutView->showlogOutView($this->loggedIn);
			}
			else
			{
				return $this->loginView->showLoginView($this->loggedIn);
			}	
		}

	}

?>
