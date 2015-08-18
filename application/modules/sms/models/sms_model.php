<?php
/**
* 
*/
class Sms_model extends MY_Model
{
	
	function __construct()
	{
		# code...
	}

	public function get_messages($user_id = NULL){
		$query = "SELECT * FROM sms_messages";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}
}
?>