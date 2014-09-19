<?php

   	require_once("src/view/loginView.php");
	require_once("src/view/logOutView.php");
	require_once("src/model/loginModel.php");


class loginControll{

		private $loginView;
		private $loginModel;
		private $logOutView;
		private $loggedIn = false;




		public function __construct(){
			$this->loginModel = new  loginModel();
			$this->loginView = new loginView($this->loginModel);
			$this->logOutView = new logOutView($this->loginModel);
		}




		private function getUsrAndPass(){
			$pass = $this->loginView->getPassword();
			$user = $this->loginView->getUserName();
			$userCookie = $this->loginView->issetCookieUsername();
 			$passCookie = $this->loginView->issetCookiePassword();
			return $this->loginModel-> checkInput($user , $pass, $userCookie, $passCookie);
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
			if ($this->loginView->ifUsrDontWantKeepAnyMore() == true) {
					return $this->loginView->showLoginView();
				}

				$this->isUsrLoggedOut();




			if ($this->loginView->usrPressLogin() == true 
				|| $this->loginView->keepMeInMind() == true) {

					if ($this->didLoginThisRequest() == true) {
						$this->loggedIn = true;
				}					
			}
			


					
			if ($this->loginModel->isUserLoggedin() == true) {
				return  $this->logOutView->showlogOutView($this->loggedIn);
			}
			else
			{
				return $this->loginView->showLoginView();
			}	
		}

	}

?>
