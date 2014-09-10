<?php

require_once("common/HTMLView.php");

require_once("src/controller/login.php");


 $view = new HTMLView();

 $lgc = new loginControll();

 $htmlBody = $lgc -> displayLogin();

$view->echoHTML($htmlBody);
?>