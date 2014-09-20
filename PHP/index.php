<?php

	require_once("common/HTMLView.php");
	require_once("src/controller/loginController.php");

 	$view = new HTMLView();
 	$loginControll = new \controller\loginControll();

 	$htmlBody = $loginControll->displayLogin();
	$view->echoHTML($htmlBody);

	
 
 	setlocale(LC_ALL, 'swedish');
 	$day = utf8_encode(ucfirst(strftime("%A")));
 	echo ucwords(strftime($day .'en. Den %d %B år %Y. Klockan är [%X].', strtotime('+1 hour')));
?>