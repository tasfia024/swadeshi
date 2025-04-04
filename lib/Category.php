<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath."/../config/Database.php");
	include_once ($filepath."/../helpers/Format.php");
?>

<?php
	class Category {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function store ($data) {
            $name = $data['name'];
            $imageFile = $_FILES['image'];

            $result = $this->uploadFile($imageFile);
            if (isset($result['success']) && !$result['success']) {
                return $result['message'];
            }

            $file_name = $result;

            $sql = "INSERT INTO categories (name, image) VALUES('".$name."', '".$file_name."')";
            $query = $this->db->insert($sql);

            if ($query) {
                $msg = '<div class="alert alert-success"><strong>Success!</strong> Thank you! your form have been submitted successfully</div>';
                return $msg;
            } else{
                $msg = '<div class="alert alert-success"><strong> Sorry!</strong> There has been problem inserting your details!</div>';
                return $msg;
            }

        }


        public function update ($id, $data) {
            $findData = $this->getDataById($id)->fetch_object();
            
            $name = $data['name'];

            $imageFile = $_FILES['image'];
            if ($imageFile['size']) {
                $result = $this->uploadFile($imageFile);
                if (isset($result['success']) && !$result['success']) {
                    return $result['message'];
                }

                $file_name = $result;
            } else {
                $file_name = $findData->image;
            }

            $query = "UPDATE events
	               	SET 
	               	name  = '$name', 
	               	image 	    = '$file_name'
	               	WHERE id     = '$id'";

	            $updated_rows = $this->db->update($query);
	            if ($updated_rows) {
                    $msg = '<div class="alert alert-success"><strong>Success!</strong> Data updated successfully</div>';
					return $msg;
	            }else {
	                $msg = '<div class="alert alert-danger"><strong>Error!</strong> Something went wrong.</div>';
					return $msg;
	            }
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



        // Get Events data
        public function getData () {
            $sql = "SELECT * FROM categories";
            $result = $this->db->select($sql);
            return $result;
        }

        // Get Event Data by Id
        public function getDataById ($id) {
            $sql = "SELECT * FROM categories WHERE id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        // Delete event by id
        public function deleteDataById ($id) {
            $query = "DELETE from categories where id = '$id'";
            $delcat = $this->db->delete($query);

            if($delcat != false){
                $msg = '<div class="alert alert-success"><strong> Congratulations!</strong> event deleted successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> event not deleted!</div>';
                return $msg;
            }
        }


	}
?>