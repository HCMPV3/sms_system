<?php
/**
* 
*/
class MY_Model extends CI_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}
    
   function getUser_details($id)
  {
    $sql = "SELECT `us`.`id`,`us`.`email`,`us`.`status`,`us`.`user_type_id`,`ut`.`user_type`
        FROM `users` `us`
        JOIN `user_types` `ut`
        ON `us`.`user_type_id` = `ut`.`id`
        WHERE `us`.`id` = '$id'";
    $result = $this->db->query($sql);
    return $result->result_array();
  }


}

?>