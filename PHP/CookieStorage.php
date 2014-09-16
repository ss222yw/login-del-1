<?php/*
namespace view;

class CookieStorage{

	private static $CookieName = "CookieStorage";

	public function save($string){

		setcookie(self::$CookieName,$string,-1);
	
	}

	public function load(){
		
		if (isset($_COOKIE[self::$CookieName])) {
			# code...
			$ret = $_COOKIE[self::$CookieName];
		}
		else
		{
			$ret ="";

			setcookie(self::$CookieName, "", time() -1);

			return $ret;
		}
	}
}
