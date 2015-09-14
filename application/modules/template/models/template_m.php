<?php 
class Template_m extends MY_Model
{
	function __construct(){

	}

	public function get_messages($user_id = NULL){
		$query = "CALL get_messages($user_id)";

		$result = $this->db->query($query);
		
		return $result->result_array();
	}
	public function get_active_user_count(){
		$query = "SELECT count(*) AS active_users FROM users WHERE status = 1";

		$result = $this -> db->query($query);

		return $result-> result_array();
	}
	public function get_all_user_count(){
		$query = "SELECT count(*) AS all_users FROM users";

		$result = $this -> db->query($query);

		return $result-> result_array();
	}

	public function get_all_recepient_count(){
		$query = "SELECT count(*) AS recepient_count FROM recepients";

		$result = $this -> db->query($query);

		return $result-> result_array();
	}

	/*public function get_all_recieving_emails(){
		$query = "SELECT COUNT(recepient_id) AS recieving_emails FROM recepients WHERE email_status = 1";

		$result = $this -> db->query($query);

		return $result-> result_array();
	}*/

	public function get_all_recieving_sms(){
		$query = "SELECT COUNT(recepient_id) AS recieving_sms FROM recepients WHERE sms_status = 1";

		$result = $this -> db->query($query);

		return $result-> result_array();
	}



}
//end of file
 ?>