<?php 
class Sms extends MY_Controller{
	function __construct(){
		parent:: __construct();
		// $this -> load -> module('template');
		$this -> load -> model('sms_model');
		$this -> load -> model('users/m_users');
	}

	public function index(){
		// $get_messages = $this -> sms_model -> get_messages(1);
		// echo "<pre>";print_r($get_messages);echo "</pre>";exit;
		$data['content'] = 'sms/sms_home';
		$data['past_messages'] = $this -> sms_model ->get_messages();
		// echo "<pre>";print_r($data['past_messages']);exit;
		$this -> template ->call_admin_template($data);
	}

	public function send_sms($message = NULL){
				// $facility_phone .= "254728778002+254707463571";
				// echo "<pre>";print_r($facility_phone);exit;
				//clean the phone numbers
				// $phone_numbers = explode("+", $facility_phone);
				//send the message here
		// $member_id = $this -> session ->userdata('user_id');//to be done
		$user_id = 1;
		$message = $_POST['sms_body'];
		$message_ = isset($message)? $message:'This is a test message';
		$message = urlencode($message_);

		$sms_data = array();
		$sms_data_ = array(
			'user_id' => $user_id,
			'sms_content' => $message_
			);
		array_push($sms_data,$sms_data_);
		$this->db->insert_batch('sms_messages',$sms_data);

		$phone_numbers = $this->m_users->get_numbers();
		// echo "<pre>";print_r($phone_numbers);exit;
		foreach ($phone_numbers as $key => $user_no)
		{
			// echo "<pre>";print_r($user_no['phone_no']);echo "</pre>";
			$user_num = $user_no['phone_no'];
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_num&text=$message");
		}
		echo "I worked";
		// $this -> index();
		// redirect(base_url().'sms');
	}

	public function tester(){
		// echo $message;
	}
}

 ?>