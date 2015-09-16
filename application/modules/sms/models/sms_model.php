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
		$user_id_filter = isset($user_id)? "AND sender_id = $user_id":NULL;
		$query = "SELECT 
					    s.sms_id,
					    s.sms_content,
					    s.date_sent,
						c.category
					FROM
					    sms_messages s
					    LEFT JOIN 
					    categories c ON c.id = s.category_id
					    WHERE s.status = 0 $user_id_filter";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}

	public function get_sms_content($msg_id = NULL){
		$query = "
		SELECT * FROM sms_messages WHERE sms_id = $msg_id
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}	
}
?>