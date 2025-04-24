<?php
	include_once 'config/Session.php';
	include 'config/Database.php';

	class User {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function userRegistration($data){
            $name 		= $data['name'];
            $username 	= $data['username'];
            $email 		= $data['email'];
            $password 	= $data['password'];

            $checkEmail = $this->emailCheck($email);
            if ($checkEmail == true) {
                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Email Address already exist! </div>';
                return $msg;
            }

            $checkUsername = $this->usernameCheck($username);
            if ($checkUsername == true) {
                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Username already exist! </div>';
                return $msg;
            }

            if (strlen($username) < 3) {
                $msg = '<div class="alert alert-danger"><strong>Error!</strong> User name is too short! </div>';
                return $msg;
            }elseif (preg_match('/[^a-z0-9_-]+/i', $username)) {
                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Username must contain only alphanumerical, dashes and underscore! </div>';
                return $msg;
            }

            if (strlen($password) < 5) {
                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Password must be minimum 5 digit </div>';
                return $msg;
            }

            $password 	= md5($data['password']);

            $sql = "INSERT INTO users (name, username, email, password) VALUES('".$name."', '".$username."', '".$email."', '".$password."')";
            $query = $this->db->insert($sql);

            if ($query) {
                $msg = '<div class="alert alert-success"><strong>Success!</strong> Thank you! you have been registered</div>';
                return $msg;
            } else{
                $msg = '<div class="alert alert-success"><strong> Sorry!</strong> There has been problem inserting your details!</div>';
                return $msg;
            }
        }


        
        public function userLogin($data){
            $username = $data['username'];
            $password = md5($data['password']);


            $checkUsername = $this->usernameCheck($username);
            if ($checkUsername == false) {
                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Username not exist! </div>';
                return $msg;
            }

            $result = $this->getLoginUser($username, $password);
            if ($result) {
                $data = $result->fetch_object();

                Session::init();
                Session::set("login", true);
                Session::set("userId", $data->id);
                Session::set("userType", $data->type);
                Session::set("name", $data->name);
                Session::set("username", $data->username);
                Session::set("userData", $data);
                Session::set("loginmsg", '<div class="alert alert-success"><strong> Success! </strong>You are LoggedIn! </div>');

                header("Location: index.php");
            }else{
                $msg = '<div class="alert alert-danger"><strong>Error!</strong> User not found! </div>';
                return $msg;
            }

        }


        public function usernameCheck ($username) {
            $sql = "SELECT username FROM users WHERE username = '".$username."'";
            $result = $this->db->select($sql);

            if (!$result) {
                return false;
            } else {
                return true;
            }
        }



        public function emailCheck($email){
            $sql = "SELECT email FROM users WHERE email = '".$email."'";
            $result = $this->db->select($sql);

            if (!$result) {
                return false;
            } else {
                return true;
            }
        }


        public function getLoginUser($username, $password){
            $sql = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."' AND status = 1 LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }


	}
?>