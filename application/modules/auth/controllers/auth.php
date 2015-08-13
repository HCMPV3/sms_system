<?php
/**
* 
*/
class Auth extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->load->model('auth_m');
	}

	function index()
	{
		$this->logout();
		$data['error'] = '';
		$this->load->view('auth_v2');
	}

	function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$hashed = $this->encrypt($password);

		$authentication = $this->auth_m->getUser($email, $hashed);

		if($authentication['auth'] == TRUE)
		{
			$user_id = $authentication['user_id'];
			$user_details = $this->get_user($user_id);
			$user_table = $user_details[0]['user_type'];
			
			$data = array(
				'logged_in' => TRUE,
				'userid' => $user_id,
				'user_table' => $user_table
			);

			$this->session->set_userdata($data);

			$redirect_url = $user_details[0]['user_type'];

			// $redirect_url = $this->getRedirect($user_type, $user_id);
			// // echo $redirect_url;die();
			
			// // echo "<pre>";print_r($this->session->all_userdata());die;
			// // echo base_url() . $redirect_url;die();
			redirect(base_url() . $redirect_url);
		}
		else
		{
			$data['error'] = 'Login Error! Please Try Again';
			$this->load->view('auth_v', $data);
		}
	}	

	function redirection(){
		redirect(base_url() .'home');
	}

	function logout()
	{
		$this->session->sess_destroy();
	}
}
?>