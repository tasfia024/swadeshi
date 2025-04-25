<?php
	include_once 'config/Session.php';
	include 'config/Database.php';

	class ClientHome {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function getAllProducts () {
            $sql = "SELECT products.*, categories.name as category_name, sub_categories.name as sub_category_name, vendors.shop_name, vendors.shop_address
            FROM products
            INNER JOIN categories ON categories.id = products.category_id
            INNER JOIN sub_categories ON sub_categories.id = products.sub_category_id
            LEFT JOIN vendors ON vendors.user_id = products.vendor_id ORDER BY products.id DESC";

            $result = $this->db->select($sql);
            return $result;
        }

        public function getLatestProducts () {
            $sql = "SELECT products.*, categories.name as category_name, sub_categories.name as sub_category_name, vendors.shop_name, vendors.shop_address
            FROM products
            INNER JOIN categories ON categories.id = products.category_id
            INNER JOIN sub_categories ON sub_categories.id = products.sub_category_id
            LEFT JOIN vendors ON vendors.user_id = products.vendor_id ORDER BY products.id DESC LIMIT 8";

            $result = $this->db->select($sql);
            return $result;
        }

        public function getFeaturedProducts () {
            $sql = "SELECT products.*, categories.name as category_name, sub_categories.name as sub_category_name, vendors.shop_name, vendors.shop_address
            FROM products
            INNER JOIN categories ON categories.id = products.category_id
            INNER JOIN sub_categories ON sub_categories.id = products.sub_category_id
            LEFT JOIN vendors ON vendors.user_id = products.vendor_id
            WHERE products.product_type = 'Featured'
            ORDER BY products.id DESC LIMIT 8";

            $result = $this->db->select($sql);
            return $result;
        }

        public function productDetailsById ($id) {
            $sql = "SELECT products.*, categories.name as category_name, sub_categories.name as sub_category_name, vendors.shop_name, vendors.shop_address
            FROM products
            INNER JOIN categories ON categories.id = products.category_id
            INNER JOIN sub_categories ON sub_categories.id = products.sub_category_id
            LEFT JOIN vendors ON vendors.user_id = products.vendor_id
            WHERE products.id = {$id}
            LIMIT 1";

            $result = $this->db->select($sql);
            return $result;
        }

        public function relatedProducts ($categoryId) {
            $sql = "SELECT products.*, categories.name as category_name, sub_categories.name as sub_category_name, vendors.shop_name, vendors.shop_address
            FROM products
            INNER JOIN categories ON categories.id = products.category_id
            INNER JOIN sub_categories ON sub_categories.id = products.sub_category_id
            LEFT JOIN vendors ON vendors.user_id = products.vendor_id
            WHERE products.category_id = {$categoryId}
            LIMIT 4";

            $result = $this->db->select($sql);
            return $result;
        }

        public function getAllCategories () {
            $sql = "SELECT * FROM categories ORDER BY id ASC";

            $result = $this->db->select($sql);
            return $result;
        }

        public function latestCategory () {
            $sql = "SELECT * FROM categories ORDER BY id ASC LIMIT 8";

            $result = $this->db->select($sql);
            return $result;
        }

        public function addToCart ($productId, $data) {
            $qty = $data['qty'];

            if (!isset($qty) && !$qty && !$productId) {
                $msg = "<div class='alert alert-danger'>The category field is required!</div>";
				return $msg;
            }
            
            $findData = $this->getDataById($productId);
            if ($findData) {
                $msg = "<div class='alert alert-danger'>This product already added to your cart!</div>";
				return $msg; 
            }

            $findProduct = $this->getProductById($productId)->fetch_object();
            
            $userId = Session::get('userId');
            
            $sql = "INSERT INTO carts (product_id, user_id, qty, price) VALUES('".$productId."', '".$userId."', '".$qty."', '".$findProduct->price."')";
            $query = $this->db->insert($sql);

            if ($query) {
                $msg = '<div class="alert alert-success"><strong>Success!</strong> Thank you! Product Added To Cart Successfully</div>';
                return $msg;
            } else{
                $msg = '<div class="alert alert-success"><strong> Sorry!</strong> There has been problem inserting your details!</div>';
                return $msg;
            }

        }

        public function getDataById ($id) {
            $sql = "SELECT * FROM carts WHERE product_id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        public function getProductById ($id) {
            $sql = "SELECT * FROM products WHERE id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }
	}
?>