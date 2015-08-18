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

	public function get_members(){
		$query = "
		SELECT * from recepients
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}

	public function get_numbers(){
		$query = "
		SELECT phone_no FROM recepients;
		";
		$result = $this->db->query($query);
		return $result -> result_array();
	}


}
?>