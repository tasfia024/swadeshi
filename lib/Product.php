<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath."/../config/Database.php");
	include_once ($filepath."/../config/config.php");
	include_once ($filepath."/../helpers/Format.php");
?>

<?php
	class Product {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function store ($data) {
            $productName    = $data['product_name'];
            $imageFile      = $_FILES['image'];
            $categoryId     = $data['category_id'] ?? null;
            $subCategoryId  = $data['sub_category_id'] ?? null;
            $productType    = $data['product_type'] ?? null;
            $price          = $data['price'];
            $stockQty       = $data['stock_qty'];
            $description    = $data['description'];

            if (!isset($categoryId) && !$categoryId) {
                $msg = "<div class='alert alert-danger'>The category field is required!</div>";
				return $msg;
            } elseif (!isset($productType) && !$productType) {
                $msg = "<div class='alert alert-danger'>The product type field is required!</div>";
				return $msg;
            }

            $result = $this->uploadFile($imageFile);
            if (isset($result['success']) && !$result['success']) {
                return $result['message'];
            }
            $file_name = $result;

            $sql = "INSERT INTO products (product_name, category_id, sub_category_id, product_type, image, price, stock_qty, description) VALUES('".$productName."', '".$categoryId."', '".$subCategoryId."', '".$productType."', '".$file_name."', '".$price."', '".$stockQty."', '".$description."')";
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
            $categoryId = $data['category_id'];
            $query = "UPDATE sub_categories
	               	SET 
	               	name  = '$name', 
	               	category_id 	    = '$categoryId'
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

        public function getData () {
            $sql = "SELECT sub_categories.*, categories.name as category_name FROM sub_categories INNER JOIN categories ON categories.id = sub_categories.category_id";
            $result = $this->db->select($sql);
            return $result;
        }

        public function getDataById ($id) {
            $sql = "SELECT * FROM sub_categories WHERE id = {$id} LIMIT 1";
            $result = $this->db->select($sql);
            return $result;
        }

        public function deleteDataById ($id) {
            $query = "DELETE from sub_categories where id = '$id'";
            $delSubCat = $this->db->delete($query);

            if($delSubCat != false){
                $msg = '<div class="alert alert-success"><strong> Congratulations!</strong> Data deleted successfully!</div>';
                return $msg;
            }else{
                $msg = '<div class="alert alert-danger"><strong> Sorry!</strong> Data not deleted!</div>';
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

	}
?>