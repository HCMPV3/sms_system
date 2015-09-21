<?php
if (!defined('BASEPATH')) exit('No direct access to script allowed');

/**
* 
*/
require APPPATH."third_party/MX/Controller.php";
class MY_Controller extends MX_Controller
{
	
	var $data;
	function __construct()
	{
		parent::__construct();
		$this->load->module("template");  
		// error_reporting(1);     
	}
	
	public function index(){
		
	}

	public function encrypt($data){
		$key = $this -> encrypt -> get_key();
		$encrypted_data = $key . $data;
		$data = md5($encrypted_data);
		echo $data;
		return $data;
	}

	function get_user($id){
		// $user_details = $this->template->User_details($id);

		return $user_details;
	}

	function check_login($current = NULL)
    {
        if(!$this->session->userdata('logged_in'))
        {
            redirect(base_url() . 'auth');
        }

        else
        {
            $usertype = $this->session->userdata('usertype');

            if($usertype != $current)
            {
                redirect(base_url() . 'auth');
            }
        }
    }
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
    
}

?>