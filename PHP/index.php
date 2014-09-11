<?php

require_once("common/HTMLView.php");

require_once("src/controller/login.php");


 $view = new HTMLView();

 $lgc = new loginControll();

 $htmlBody = $lgc -> displayLogin();

 $lgc -> getUsrInfo();

$showMsg = $lgc -> showLoginMsg();
 //$lgc -> getPass();

// $lgc -> getUsr();

  
 $view->echoHTML($htmlBody);
 setlocale(LC_ALL, 'swedish');
    echo ucwords(strftime('%A, den %d %B år %Y. Klockan är [%H:%M:%S].', time()));
 //$view -> echoHTML($showMsg);
 
?>