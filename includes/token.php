<?php
class Token{
	public static function generate(){
		return $_SESSION['token'] = md5(uniqid());
	}
	public static function check($token){
		if(isset($_POST['token']))
			$tokenName = $_POST['token'];
		
		if(isset($_SESSION['token']) && $token === $_SESSION[$tokenName]){
			if(self::check($tokenName)){
				unset($_SESSION[$tokenName]);
			}
			return true;
		}
		return false;
	}
}