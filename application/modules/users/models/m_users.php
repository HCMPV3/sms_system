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
			    r.email_status,
			    r.sms_status,
			    r.created_at,
			    r.user_type,
			    c.id,
			    c.category
			FROM
			    recepients r
			        JOIN
			    categories c ON c.id = r.category_id
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


	public function get_numbers($category = NULL){
		// $category_criteria = isset($category)? "AND category_id = $category" : NULL;
		$category_criteria = (isset($category) && $category == "all")? NULL :  "AND category_id = $category";

		$query = "
		SELECT phone_no FROM recepients WHERE sms_status = 1 $category_criteria
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}


}
?>