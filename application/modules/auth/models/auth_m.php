<?php
/**
* 
*/
class Auth_m extends MY_Model
{
	
	function __construct()
	{
		# code...
	}

	public function getUser($email, $password)
    {
    	$user = array();
    	$query = $this->db->get_where('users', array('email' => $email, 'password' => $password, 'status' => 1), 1);
        
        $details = $query->result_array();
        // echo "<pre>";print_r($details);die;

    	if($details)
    	{
    		$user['auth'] = TRUE;
    		$user['user_id'] = $details[0]['user_id'];
    		$user['usertype'] = $details[0]['user_type_id'];
    	}
    	else
    	{
    		$user['auth'] = FALSE;
    	}

    	// echo "<pre>";print_r($user);die;

        
    	return $user;
    }
}
?>