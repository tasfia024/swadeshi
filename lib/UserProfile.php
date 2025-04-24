<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath."/../config/Database.php");
	include_once ($filepath."/../config/config.php");
	include_once ($filepath."/../helpers/Format.php");
?>

<?php
	class UserProfile {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function update ($data) {
            $id = Session::get('userId');
            $findData = $this->getDataById($id)->fetch_object();

            $name       = $data['name'];
            $email       = $data['email'];
            $mobileNo    = $data['mobile_no'];
            $imageFile      = $_FILES['image'];
            $dob          = $data['dob'];
            $gender       = $data['gender'];
            $address    = $data['address'];

            if (!isset($gender) && !$gender) {
                $msg = "<div class='alert alert-danger'>The gender field is required!</div>";
				return $msg;
            }

            $imageFile = $_FILES['image'];
            if ($imageFile['size']) {
                $result = $this->uploadFile($imageFile);
                if (isset($result['success']) && !$result['success']) {
                    return $result['message'];
                }
                $file_name = $result;

                if ($findData->image) {
                    unlink('../uploads/' . $findData->image);
                }
            } else {
                $file_name = $findData->image;
            }
        
            $query = "UPDATE users
	               	SET 
	               	name        = '$name', 
	               	email 	    = '$email',
	               	dob 	= '$dob',
	               	image 	            = '$file_name',
	               	gender 	    = '$gender',
	               	address 	            = '$address',
	               	mobile_no 	    = '$mobileNo'
	               	WHERE id            = '$id'";

	            $updated_rows = $this->db->update($query);
	            if ($updated_rows) {
                    $msg = '<div class="alert alert-success"><strong>Success!</strong> Data updated successfully</div>';
					return $msg;
	            }else {
	                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Something went wrong.</div>';
					return $msg;
	            }
        }

        public function getDataById ($id) {
            $sql = "SELECT users.*, vendors.shop_name, vendors.nid, vendors.shop_address, vendors.status as vendor_status FROM users
            LEFT JOIN vendors ON vendors.user_id = users.id
            WHERE users.id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        public function uploadFile ($file) {
            $imageFileType = strtolower(pathinfo(basename($file["name"]),PATHINFO_EXTENSION));
            $file_name = strtotime("now").'-'.uniqid().'-'.rand(0,999999).'.' . $imageFileType;
            $target_file = '../uploads/' . $file_name;

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> only JPG, JPEG, PNG & GIF files are allowed.!</div>';
                $dataReturn['message'] = $msg;
                $dataReturn['success'] = false;

                return $dataReturn;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> file already exists.!</div>';
                $dataReturn['message'] = $msg;
                $dataReturn['success'] = false;

                return $dataReturn;
            }

            // Check file size
            if ($file["size"] > 5000000) {
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> your file is too large!</div>';
                $dataReturn['message'] = $msg;
                $dataReturn['success'] = false;

                return $dataReturn;
            }

            // Check if $uploadOk is set to 0 by an error
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $file_name;
            } else {
                $dataReturn['message'] = '<div class="alert alert-danger"><strong> Sorry!</strong> there was an error uploading your file!</div>';
                $dataReturn['success'] = false;

                return $dataReturn;
            }
        }

	}
?>