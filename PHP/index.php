<?php



require_once("common/HTMLView.php");

require_once("src/controller/login.php");

 $view = new HTMLView();
$model = new LoginModel();
 $lgc = new loginControll();

 $htmlBody = $lgc -> displayLogin();

//$lgc -> isUserLoggedOut();
//$lgc -> foo();
 //$lgc -> getUsrInfo();
 // $lgc -> usrPressLogin();

$showMsg = $lgc -> showLoginMsg();

 $lgc -> getUsrAndPass();

// var_dump($lgc -> isUserLoggedin());
 //$model -> checkInput($user , $pass);
if ($lgc -> isUsrLoggedOut() == true) {
	# code...
	$view->echoHTML($htmlBody);
}

if ($lgc -> isUserLoggedin() == true ) {
	# code...
$view -> echoHTML($showMsg);
}
 //if ($lgc -> isUsrLoggedOut() == true) {
	# code...
//	$view->echoHTML($htmlBody);
//}
else
{
	$view->echoHTML($htmlBody);
}
  
 setlocale(LC_ALL, 'swedish');
 echo ucwords(strftime('%Aen. Den %d %B år %Y. Klockan är [%X].', time()));
?>