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
                d.district,
                ct.county
			FROM
			    recepients r
			        LEFT JOIN
			    categories c ON c.id = r.category_id
					LEFT JOIN
				districts d ON d.id = r.district_id
					LEFT JOIN
				counties ct ON d.county = ct.id
				WHERE c.status = 1
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

	public function get_counties($county_id = NULL){
		$and = isset($county_id)? " WHERE id = $county_id":NULL;
		$query = "
		SELECT * from counties $and
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_county_districts($county_id = NULL){
		$and = isset($county_id)? " WHERE county = $county_id":NULL;
		$query = "
		SELECT * from districts $and
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_usertypes(){
		$query = "
		SELECT * from user_type WHERE level = 2
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}


	public function get_numbers($category = NULL,$county = NULL,$district = NULL){
		// $category_criteria = isset($category)? "AND category_id = $category" : NULL;
		$criteria = (isset($category) && $category == "all")? NULL :  "AND category_id = $category";
		$criteria .= (isset($county) && $county != "all" && $county!='')? " AND county_id = $county" : NULL ;
		$criteria .= (isset($district) && $district != "all" && $district!='')? " AND district_id = $district" : NULL ;
		// echo "SELECT phone_no FROM recepients WHERE sms_status = 1 $criteria";exit;
		$query = "
		SELECT phone_no FROM recepients WHERE sms_status = 1 $criteria
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_number($id = NULL){
		// $category_criteria = isset($category)? "AND category_id = $category" : NULL;
		echo "SELECT phone_no FROM recepients WHERE sms_status = 1 AND recepient_id = $id";exit;
		$query = "
		SELECT phone_no FROM recepients WHERE sms_status = 1 AND recepient_id = $id
		";
		// $result = $this->db->query($query);
		// return $result -> result_array();
	}

}
?>