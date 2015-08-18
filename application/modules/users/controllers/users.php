<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('m_users');
	}

	public function index(){
		$data['content'] = 'users/users_v';
		$data['user_data'] = $this->m_users->get_members();
		// echo "<pre>";print_r($data['user_data']);echo "</pre>";exit;
		$this ->template->call_admin_template($data);
	}

	public function view_users(){
		
	}

	public function add_user(){
		$results = $this ->input->post();
		// echo "<pre>";print_r($results);echo "</pre>";exit;
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		// $onames = $this->input->post('onames');
		$email = $this->input->post('email');
		$phone_no = $this->input->post('phone_no');
		$sms_recieve = $this->input->post('sms_recieve');
		$email_recieve = $this->input->post('email_recieve');
		$user_type = $this->input->post('user_type');

		$userinfo = array();
			$user_info = array(
				'email' => $email,
				'password' => md5(123456),
				'status' => 1,
				 );
			array_push($userinfo, $user_info);

			$insertion = $this ->db->insert_batch('users',$userinfo);

		$user_id = mysql_insert_id();
		// $user_id = 4;
		$minfo = array();
		$member_info = array(
			'user_id'=>$user_id,
			'fname' => $fname,
			'lname' => $lname,
			'email' => $email,
			'phone_no' => $phone_no,
			'sms_status' => $sms_recieve,
			'email_status' => $email_recieve,
			'user_type' => 1
			 );
		array_push($minfo, $member_info);

		// echo "<pre>";print_r($minfo);exit;
		$insertion = $this ->db->insert_batch('recepients',$minfo);
		
		redirect(base_url().'users');
	}

	public function change_status($status,$type,$member){
		switch ($status) {
			case 'activate':
				switch ($type) {
					case 'sms':
						$query = "UPDATE `recepients` SET `sms_status` = '1' WHERE `recipient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					case 'email':
						$query = "UPDATE `recepients` SET `email_status` = '1' WHERE `recipient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					default:
						# code...
						break;
				}//nested switch,for type
				break;
			case 'deactivate':
				switch ($type) {
					case 'sms':
						$query = "UPDATE `recepients` SET `sms_status` = '2' WHERE `recipient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					case 'email':
						$query = "UPDATE `recepients` SET `email_status` = '2' WHERE `recipient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					default:
						# code...
						break;
				}//nested switch,for type
				break;
			default:
				# code...
				break;
		}//status switch

		redirect(base_url().'users');
	}
}
?>