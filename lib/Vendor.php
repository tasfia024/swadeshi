<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath."/../config/Database.php");
	include_once ($filepath."/../config/config.php");
	include_once ($filepath."/../helpers/Format.php");
?>

<?php
	class Vendor {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function store ($data) {
            $shopName    = $data['shop_name'];
            $shopAddress = $data['shop_address'];
            $nid     = $data['nid'];

            $userId = Session::get('userId');
            $userData = $this->getDataByUserId($userId)->fetch_object();
            
            if (!$userData->mobile_no) {
                $msg = "<div class='alert alert-danger'>The mobile no field is required!</div>";
				return $msg;
            } elseif (!$userData->dob) {
                $msg = "<div class='alert alert-danger'>The date of birth field is required!</div>";
				return $msg;
            } else {
                if (isset($userData->shop_name) && $userData->shop_name) {
                    $msg = "<div class='alert alert-danger'>You already applied. Please wait for admin approval!</div>";
				    return $msg;
                }
            }

            $sql = "INSERT INTO vendors (shop_name, nid, user_id, shop_address) VALUES('".$shopName."', '".$nid."', '".$userId."', '".$shopAddress."')";
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
            $userType = Session::get('userType');
            $userId = Session::get('userId');
            $sql = "SELECT vendors.*, users.name, users.mobile_no, users.dob, users.email, users.gender
            FROM vendors
            INNER JOIN users ON users.id = vendors.user_id";

            if ($userType != 1) {
                $sql = $sql . " WHERE user_id = {$userId} LIMIT 1";
            }

            $result = $this->db->select($sql);
            return $result;
        }

        public function getDataById ($id) {
            $sql = "SELECT * FROM vendors WHERE id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        public function getDataByUserId ($id) {
            $sql = "SELECT users.*, vendors.shop_name, vendors.nid, vendors.shop_address, vendors.status as vendor_status FROM users
            LEFT JOIN vendors ON vendors.user_id = users.id
            WHERE users.id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        public function deleteDataById ($id) {
            $query = "DELETE from vendors where id = '$id'";
            $delVendor = $this->db->delete($query);

            if($delVendor != false){
                $msg = '<div class="alert alert-success"><strong> Congratulations!</strong> Data deleted successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> Data not deleted!</div>';
                return $msg;
            }
        }

        public function approveById ($userId) {
            $status = 1;
            $type = 2;
            $query = "UPDATE vendors
	               	SET 
	               	status  = '$status'
	               	WHERE user_id  = '$userId'";
            $updated_rows = $this->db->update($query);

            $query1 = "UPDATE users
                    SET 
                    type  = '$type'
                    WHERE id  = '$userId'";
            $updated_rows1 = $this->db->update($query1);
	            
	            if ($updated_rows) {
                    $msg = '<div class="alert alert-success"><strong>Success!</strong> Vendor approved successfully</div>';
					return $msg;
	            }else {
	                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Something went wrong.</div>';
					return $msg;
	            }
        }
	}
?>