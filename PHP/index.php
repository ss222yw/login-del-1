<?php

require_once("common/HTMLView.php");

require_once("src/controller/login.php");


 $view = new HTMLView();
$model = new LoginModel();
 $lgc = new loginControll();

 $htmlBody = $lgc -> displayLogin();

 $lgc -> getUsrInfo();
 // $lgc -> usrPressLogin();
$showMsg = $lgc -> showLoginMsg();
 $lgc -> getUsrAndPass();
// var_dump($lgc -> isUserLoggedin());
 //$model -> checkInput($user , $pass);
if ($lgc -> isUserLoggedin() == true) {
	# code...


$view -> echoHTML($showMsg);

	
 
 
}
else
{
	$view->echoHTML($htmlBody);
}
  
 

  //if ($lgc -> isUserLoggedin() == true) {
  	# code...
  

 // }
 setlocale(LC_ALL, 'swedish');
    echo ucwords(strftime('%Aen. den %d %B år %Y. Klockan är [%H:%M:%S].', time()));
?>