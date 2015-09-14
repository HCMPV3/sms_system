<?php
/**
* 
*/
class M_users extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}

	public function get_recepients(){
		$query = "
			SELECT 
				r.recepient_id,
			    r.fname,
			    r.lname,
			    r.email,
			    r.phone_no,
			    r.sms_status,
			    r.created_at,
			    r.user_type,
			    c.id,
			    c.category,
                d.district
			FROM
			    recepients r
			        JOIN
			    categories c ON c.id = r.category_id
					JOIN
				districts d ON d.id = r.district_id
				ORDER BY 
				r.fname
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_categories(){
		$query = "
		SELECT * from categories
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_users(){
		$query = "
		SELECT * from users
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_districts(){
		$query = "
		SELECT * from districts
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_usertypes(){
		$query = "
		SELECT * from user_type
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}


	public function get_numbers($category = NULL){
		// $category_criteria = isset($category)? "AND category_id = $category" : NULL;
		$category_criteria = (isset($category) && $category == "all")? NULL :  "AND category_id = $category";

		$query = "
		SELECT phone_no FROM recepients WHERE sms_status = 1 $category_criteria
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_number($id = NULL){
		// $category_criteria = isset($category)? "AND category_id = $category" : NULL;
		$query = "
		SELECT phone_no FROM recepients WHERE sms_status = 1 AND recepient_id = $id
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	


}
?>