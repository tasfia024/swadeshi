<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath."/../config/Database.php");
	include_once ($filepath."/../config/config.php");
	include_once ($filepath."/../helpers/Format.php");
?>

<?php
	class SubCategory {
		private $db;
		function __construct()
		{
			$this->db = new Database();
		}

        public function store ($data) {
            $name = $data['name'];
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

	}
?>