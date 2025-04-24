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
            $mobileNo = $data['mobile_no'];

            $userData = Session::get('userData');
            $userId = $userData->id;
            if (!$userData->mobile_no) {
                $msg = "<div class='alert alert-danger'>The mobile no field is required!</div>";
				return $msg;
            } elseif (!$userData->dob) {
                $msg = "<div class='alert alert-danger'>The date of birth field is required!</div>";
				return $msg;
            } else {
                $vendorSql = "SELECT * FROM vendors WHERE user_id = {$userId} LIMIT 1";
                $isExist = $this->db->select($vendorSql)->fetch_object();
                if ($isExist) {
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
            $sql = "SELECT vendors.*, users.name as user_name, users.mobile_no, users.dob, users.email, users.gender
            FROM vendors
            INNER JOIN users ON users.id = vendors.user_id";
            $result = $this->db->select($sql);
            return $result;
        }

        public function getDataById ($id) {
            $sql = "SELECT * FROM vendors WHERE id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        public function deleteDataById ($id) {
            $query = "DELETE from vendors where id = '$id'";
            $delSubCat = $this->db->delete($query);

            if($delSubCat != false){
                $msg = '<div class="alert alert-success"><strong> Congratulations!</strong> Data deleted successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> Data not deleted!</div>';
                return $msg;
            }
        }
	}
?>