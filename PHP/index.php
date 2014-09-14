<?php



require_once("common/HTMLView.php");

require_once("src/controller/login.php");

 	$view = new HTMLView();
	$model = new LoginModel();
 	$lgc = new loginControll();

 	$htmlBody = $lgc -> displayLogin();

	$showMsg = $lgc -> showLoginMsg();

 	$lgc -> getUsrAndPass();


if ($lgc -> isUsrLoggedOut() == true) {
	# code...

	$view->echoHTML($htmlBody);
}

elseif ($lgc -> isUserLoggedin() == true ) {
	# code...
$view -> echoHTML($showMsg);
}
else
{
	$view->echoHTML($htmlBody);
}
  
 setlocale(LC_ALL, 'swedish');
 $day = utf8_encode(ucfirst(strftime("%A")));
 echo ucwords(strftime($day .'en. Den %d %B år %Y. Klockan är [%X].', time()));
?>