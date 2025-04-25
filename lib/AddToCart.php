<?php
	include_once 'config/Session.php';
	include 'config/Database.php';

	class AddToCart {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function store ($productId, $data) {
            $qty = $data['qty'];
            return $data;
            $categoryId = $data['category_id'] ?? null;

            if (!isset($categoryId) && !$categoryId) {
                $msg = "<div class='alert alert-danger'>The category field is required!</div>";
				return $msg;
            } 
            
            $sql = "INSERT INTO sub_categories (name, category_id) VALUES('".$name."', '".$categoryId."')";
            $query = $this->db->insert($sql);

            if ($query) {
                $msg = '<div class="alert alert-success"><strong>Success!</strong> Thank you! your form have been submitted successfully</div>';
                return $msg;
            } else{
                $msg = '<div class="alert alert-success"><strong> Sorry!</strong> There has been problem inserting your details!</div>';
                return $msg;
            }

        }

        public function getData () {
            $userId = Session::get('userId');
            $sql = "SELECT * FROM carts WHERE user_id = {$userId}";

            $result = $this->db->select($sql);
            return $result;
        }
	}
?>