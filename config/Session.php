<?php
	include_once ("config.php");

	class Session {
		public static function init(){
			if (version_compare(phpversion(), '7.4.0', '<')) {
				if (session_id() == '') {
					session_start();
				}
			}else{
				if (session_status() == PHP_SESSION_NONE) {
						session_start();
				}	
			}
		}

		public static function set($key, $val){
			$_SESSION[$key] = $val;
		}

		public static function get($key){
			if (isset($_SESSION[$key])) {
				return $_SESSION[$key];
			}else{
				return false;
			}
		}

		public static function checkSession(){
			if (self::get("login") == false) {
				self::destroy();

				header("Location: /swadeshi-ecommerce/sign_in.php");
				exit;
				// echo "<script>window.location.href='index.php';</script>";
			}
		}

		public static function checkLogin(){
			if (self::get("login") == true) {
				header("Location: /swadeshi-ecommerce/index.php");
				exit;
			}
		}

		public static function destroy(){
			session_destroy();
			session_unset();
			header("Location: /swadeshi-ecommerce/index.php");
			exit;
		}
	}

?>