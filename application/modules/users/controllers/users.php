<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('m_users');
	}

	public function index(){
		$data['content'] = 'users/users_v';
		$data['user_data'] = $this->m_users->get_recepients();
		// echo "<pre>";print_r($data['user_data']);echo "</pre>";exit;
		$this ->template->call_admin_template($data);
	}

	public function view_users(){
		$data['content'] = 'users/recepients_v';
		$data['user_data'] = $this->m_users->get_recepients();
		// echo "<pre>";print_r($data['user_data']);echo "</pre>";exit;
		$this ->template->call_admin_template($data);
	}

	public function recipients(){
		$data['content'] = 'users/recepients_v';
		$data['user_data'] = $this->m_users->get_recepients();
		$data['category_data'] = $this->m_users->get_categories();
		$data['district_data'] = $this->m_users->get_districts();
		$data['county_data'] = $this->m_users->get_counties();
		$data['usertypes'] = $this->m_users->get_usertypes();
		$data['active'] = 'recipients';
		// echo "<pre>";print_r($data['county_data']);echo "</pre>";exit;
		$this ->template->call_admin_template($data);
	}

	public function delete_recipient($recipient){
		$query = "DELETE FROM recepients WHERE recepient_id = $recipient";

		$results = $this->db->query($query);
		redirect(base_url().'users/recipients');
	}

	public function members(){
		$data['content'] = 'users/users_v';
		$data['user_data'] = $this->m_users->get_users();
		$data['active'] = 'users';
		// echo "<pre>";print_r($data['user_data']);echo "</pre>";exit;
		$this ->template->call_admin_template($data);
	}

	public function categories($status = NULL){
		$data['content'] = 'users/category_v';
		$data['category_data'] = $this->m_users->get_categories();
		$data['active'] = 'categories';
		// echo "<pre>";print_r($data['category_data']);echo "</pre>";exit;
		$this ->template->call_admin_template($data);
	}

	public function add_category(){
		$category_name = $this -> input-> post('category');
		// echo $category_name;exit;
		$insertion = array();
		$insertion_data = array(
			'category'=> $category_name
			);

		array_push($insertion, $insertion_data);

		$this -> db -> insert_batch('categories',$insertion);

		redirect('users/categories');
	}

	public function delete_category($category_id){
		$query = $this->db->query("DELETE FROM categories WHERE id = $category_id");

		redirect('users/categories');
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
		// $email_recieve = $this->input->post('email_recieve');
		$category = $this->input->post('category');
		$district = $this->input->post('district');
		$usertypes = $this->input->post('usertypes');

		$userinfo = array();
			$user_info = array(
				'email' => $email,
				'password' => md5(123456),
				'status' => 1,
				 );
			array_push($userinfo, $user_info);

			// $insertion = $this ->db->insert_batch('users',$userinfo);

		$user_id = mysql_insert_id();
		// $user_id = 4;
		$minfo = array();
		$member_info = array(
			'fname' => $fname,
			'lname' => $lname,
			'email' => $email,
			'phone_no' => $phone_no,
			// 'sms_status' => $sms_recieve,
			// 'email_status' => $email_recieve,
			'category_id' => $category,
			'district_id' => $district,
			'user_type' => $usertypes
			 );
		array_push($minfo, $member_info);

		// echo "<pre>";print_r($minfo);exit;
		$insertion = $this ->db->insert_batch('recepients',$minfo);
		
		redirect(base_url().'users/recipients');
	}

	public function add_admin(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		// $hashed = $this->encrypt(123456);
		$user_info = array();
		$user_info_ = array(
			'email'=> $email,
			'password'=>$this->encrypt(123456),
			'status'=>1
			);

		array_push($user_info, $user_info_);

		$this->db->insert_batch('users',$user_info);

		redirect(base_url().'users/members');

	}

	public function reset_password($id){
		// $pwd = md5(123456);
		$pwd = $this->encrypt(123456);
		$query = "UPDATE `users` SET `password`= '$pwd' WHERE `user_id`= $id";
		$this->db->query($query);

		redirect(base_url().'users/members');
	}

	public function change_status($status,$type,$member){
		switch ($status) {
			case 'activate':
				switch ($type) {
					case 'sms':
						$query = "UPDATE `recepients` SET `sms_status` = '1' WHERE `recepient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					case 'email':
						$query = "UPDATE `recepients` SET `email_status` = '1' WHERE `recepient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					default:
						# code...
						break;
				}//nested switch,for type
				$redirect_url = 'users/recepients';
				break;
			case 'deactivate':
				switch ($type) {
					case 'sms':
						$query = "UPDATE `recepients` SET `sms_status` = '2' WHERE `recepient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					case 'email':
						$query = "UPDATE `recepients` SET `email_status` = '2' WHERE `recepient_id` = $member";
						$this->db->query($query);
						// return true;
						break;
					default:
						# code...
						break;
				}//nested switch,for type
				$redirect_url = 'users/recepients';

				break;
			case 'users':
				switch ($type) {
					case 'active':
						$query = "UPDATE `users` SET `status`='2' WHERE user_id = $member";
						$this->db->query($query);
						// return true;
						break;
					case 'inactive':
						$query = "UPDATE `users` SET `status`='1' WHERE user_id = $member";
						$this->db->query($query);
						// return true;
						break;
					default:
						# code...
						break;
				}//nested switch,for type
				$redirect_url = 'users/members';
				break;

			case 'category':
				switch ($type) {
					case 'activate':
						$query = "UPDATE categories SET `status`='1' WHERE `id`= $member";
						$this->db->query($query);
						break;
					case 'deactivate':
						$query = "UPDATE categories SET `status`='0' WHERE `id`= $member";
						$this->db->query($query);
						break;
					
					default:
						# code...
						break;
				}
				$redirect_url = 'users/categories';
				break;
			default:
				# code...
				break;
		}//status switch

		redirect(base_url().$redirect_url);
	}

	public function get_districts($county_id = NULL){
		$county_id = $this->input->post('county');
		$counties = $this->m_users->get_county_districts($county_id);

		// echo $counties;
		echo json_encode($counties);
	}
}
?>