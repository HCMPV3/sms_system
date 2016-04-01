<?php 
class M_uploads extends MY_Model
{
	function __construct(){

	}

	public function get_uploads(){
		$query = "SELECT 
				    u.uploader AS uploader_id,
				    us.email,
				    u.upload_name,
				    u.date_uploaded,
				    u.file_size,
				    u.description
				FROM
				    uploads u JOIN users us ON us.user_id = u.uploader";

		$result = $this->db->query($query);
		return $result->result_array();
	}

	public function get_recepients_by_upload(){
		$query = "
		SELECT 
		    COUNT(recepient_id),
		    upload_id
		FROM
		    recepients
		GROUP BY upload_id
		";

		$result = $this->db->query($query);
		return $result -> result_array();
	}
}
?>