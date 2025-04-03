<?php
	
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
				header("Location: sign_in.php");
			}
		}

		public static function checkLogin(){
			if (self::get("login") == true) {
				header("Location: index.php");
			}
		}

		public static function destroy(){
			session_destroy();
			session_unset();
			header("Location: index.php");
		}


		// public static function checkAdminSession(){
		// 	if (self::get("adminLogin") == false) {
		// 		self::destroy();
		// 		header("Location: adminLogin.php");
		// 	}
		// }

		// public static function checkadminLogin(){
		// 	if (self::get("adminLogin") == true) {
		// 		header("Location: admin.php");
		// 	}
		// }

	}

?>