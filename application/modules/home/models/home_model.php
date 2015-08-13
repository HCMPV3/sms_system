<?php 
class Student_model extends MY_Model
{
	function __construct(){

	}

	public function get_messages($user_id = NULL){
		$query = "CALL get_messages($user_id)";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}
}
//end of file
 ?>