<?php 
class Sms extends MY_Controller{
	function __construct(){
		parent:: __construct();
		// $this -> load -> module('template');
		$this -> load -> model('sms_model');
		$this -> load -> model('users/m_users');
	}

	public function index($to = NULL){
		// $get_messages = $this -> sms_model -> get_messages(1);
		// echo "<pre>";print_r($get_messages);echo "</pre>";exit;
		$data['active'] = 'sms';
		if (isset($to) && $to == 'individual') {
			$data['content'] = 'sms/sms_home_individual';
			$data['recipients'] = $this -> m_users ->get_recepients();
		}else{
			$data['content'] = 'sms/sms_home';
			$data['past_messages'] = $this -> sms_model ->get_messages();
			$data['categories'] = $this -> m_users ->get_categories();
		}
		
		// echo "<pre>";print_r($data['recipients']);exit;
		$this -> template ->call_admin_template($data);
	}

	public function send_sms($message = NULL,$category = NULL,$to = NULL){
		// echo "<pre>";print_r($this->input->post());echo "</pre>";exit;
		// $user_id = 1;
		// echo $to;exit;
		if ($to == 'category') {
		$message = $_POST['sms_body'];
		$category = $_POST['category'];
		$message_ = isset($message)? $message:'This is a test message';
		$message = urlencode($message_);

		$sms_data = array();
		$sms_data_ = array(
			'sms_content' => $message_,
			'category_id' =>$category
			);
		array_push($sms_data,$sms_data_);
		$this->db->insert_batch('sms_messages',$sms_data);

		$phone_numbers = $this->m_users->get_numbers($category);
		// echo "<pre>";print_r($phone_numbers);exit;
		foreach ($phone_numbers as $key => $user_no)
		{
			// echo "<pre>";print_r($user_no['phone_no']);echo "</pre>";
			$user_num = $user_no['phone_no'];
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_num&text=$message");
		}
		// echo "I worked";
		}
		else{
		$message = $_POST['sms_body'];
		$recipients = $_POST['recipients'];
		$message_ = isset($message)? $message:'This is a test message';
		$message = urlencode($message_);

		$sms_data = array();
		$sms_data_ = array(
			'sms_content' => $message_,
			'person_id' =>$recipients
			);
		array_push($sms_data,$sms_data_);
		$this->db->insert_batch('sms_messages',$sms_data);

		$phone_numbers = $this->m_users->get_number($recipients);
		// echo "<pre>";print_r($phone_numbers);exit;
		foreach ($phone_numbers as $key => $user_no)
		{
			// echo "<pre>";print_r($user_no['phone_no']);echo "</pre>";
			$user_num = $user_no['phone_no'];
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_num&text=$message");
		}
		echo "I worked";
		}
		// $this -> index();
		// redirect(base_url().'sms');
	}

	public function tester(){
		// echo $message;
	}
}

 ?>