<?php 
class Sms extends MY_Controller{
	function __construct(){
		parent:: __construct();
		// $this -> load -> module('template');
		$this -> load -> model('sms_model');
		$this -> load -> model('users/m_users');
		$this -> check_login();
	}

	public function index($to = NULL){
		// $get_messages = $this -> sms_model -> get_messages(1);
		// echo "<pre>";print_r($get_messages);echo "</pre>";exit;
		$user_id = $this->session->userdata('userid');
		// echo "<pre>";print_r($this->session->userdata('userid'));exit;
		$data['county_data'] = $this->m_users->get_counties();
		$data['active'] = 'sms';
		if (isset($to) && $to == 'individual') {
			$data['content'] = 'sms/sms_home_individual';
			$data['recipients'] = $this -> m_users ->get_recepients();
		}else{
			$data['content'] = 'sms/sms_home';
			$data['past_messages'] = $this -> sms_model ->get_messages($user_id);
			$data['categories'] = $this -> m_users ->get_categories();
		}
		
		// echo "<pre>";print_r($data['past_messages']);exit;
		$this -> template ->call_admin_template($data);
	}

	public function send_sms($message = NULL,$category = NULL,$to = NULL){
		// echo "<pre>";print_r($this->input->post());echo "</pre>";exit;
		// $user_id = 1;
		$county = $this->input->post("county");
		$district = $this->input->post("district");
		$user_id = $this->session->userdata('userid');
		// echo $district;exit;
		/*if ($county=='0') {
			echo "No county selected";
		}else{
			echo "County selected";
		}exit;*/
		// echo "This is sthe ".$district;exit;
		// echo $to;exit;
		if ($to == 'category') {
		$message = $_POST['sms_body'];
		$category = $_POST['category'];
		$message_ = isset($message)? $message:'This is a test message';
		$message = urlencode($message_);

		$sms_data = array();
		$sms_data_ = array(
			'sms_content' => $message_,
			'category_id' =>$category,
			'county_id' => $county,
			'district_id' => $district,
			'sender_id' => $user_id
			);
		array_push($sms_data,$sms_data_);
		$this->db->insert_batch('sms_messages',$sms_data);

		$phone_numbers = $this->m_users->get_numbers($category,$county,$district);
		// echo "<pre>";print_r($phone_numbers);exit;
		foreach ($phone_numbers as $key => $user_no)
		{
			// echo "<pre>";print_r($user_no['phone_no']);echo "</pre>";
			$user_num = $user_no['phone_no'];
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_num&text=$message");
		}
		echo "I worked";
		}
		else{
		$message = $_POST['sms_body'];
		$recipients = $_POST['recipients'];
		$message_ = isset($message)? $message:'This is a test message';
		$message = urlencode($message_);

		$sms_data = array();
		$sms_data_ = array(
			'sms_content' => $message_,
			'person_id' =>$recipients,
			'sender_id' => $user_id
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
			// echo "http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_num&text=$message";
		}
		echo "SMS has been sent";
		}
		// $this -> index();
		// redirect(base_url().'sms');
	}

	public function resend_sms($message = NULL,$category = NULL,$to = NULL){
		// echo "<pre>";print_r($this->input->post());echo "</pre>";exit;
		// $user_id = 1;
		// echo $to;exit;
		$user_id = $this->session->userdata('userid');
		$msg_id = $this->input->post('id');
		// echo $id;exit;
		$message_content = $this->sms_model->get_sms_content($msg_id);
		// echo "<pre";print_r($message_content); exit;
		$message = $message_content[0]['sms_content'];
		$category = $message_content[0]['category_id'];
		$county = ($message_content[0]['county_id'] = 0)? NULL :$message_content[0]['county_id'];
		$district = ($message_content[0]['district_id'] = 0)? NULL :$message_content[0]['district_id'];

		$message_ = isset($message)? $message:'This is a test message';
		$message = urlencode($message_);

		$sms_data = array();
		$sms_data_ = array(
			'sms_content' => $message_,
			'category_id' =>$category,
			'county_id' => $county,
			'district_id' => $district,
			'sender_id' => $user_id
			);
		array_push($sms_data,$sms_data_);
		$this->db->insert_batch('sms_messages',$sms_data);

		$phone_numbers = $this->m_users->get_numbers($category,$county,$district);
		// echo "<pre>";print_r($phone_numbers);exit;
		foreach ($phone_numbers as $key => $user_no)
		{
			// echo "<pre>";print_r($user_no['phone_no']);echo "</pre>";
			$user_num = $user_no['phone_no'];
			file("http://41.57.109.242:13000/cgi-bin/sendsms?username=clinton&password=ch41sms&to=$user_num&text=$message");
		}
	}

	public function update_counties(){
		$query = "SELECT r.recepient_id,r.district_id from recepients r";
		$recipients = $this->db->query($query)->result_array();

		$queryy = "SELECT * from districts";
		$districts = $this->db->query($queryy)->result_array();
		// echo "<pre>";print_r($res);
		$data = array();
		$x = 0;
		foreach ($recipients as $rec_data) {
			foreach ($districts as $dist_data) {
				if ($rec_data['district_id'] == $dist_data['id']) {
					$data[$x]['dist_id']=$dist_data['id'];
					$data[$x]['dist_name']=$dist_data['district'];
					$recepient_id = $data[$x]['rec_id']=$rec_data['recepient_id'];
					$county_id = $data[$x]['county_id']=$dist_data['county'];
				}
			}
				$county_update_query = "UPDATE recepients SET county_id = $county_id WHERE recepient_id= $recepient_id";
				$this->db->query($county_update_query);
				// $county_id=$recepient_id=NULL;
			$x = $x+1;
		}
		echo "<pre>";print_r($data);exit;
	}

	public function clear_message($msg_id,$all = NULL){
		$user_id = $this->session->userdata('userid');
		if (isset($all) && $all == 'all') {
			$query = "UPDATE sms_messages SET status = 1 WHERE sender_id = $user_id";
			$result = $this->db->query($query);
		}else{
		$query = "UPDATE sms_messages SET status = 1 WHERE sms_id = $msg_id";
		$result = $this->db->query($query);
		}
		redirect(base_url().'sms/index/category');
	}

	public function tester(){
		// $phone_numbers = $this->m_users->get_numbers(1,1);
		// echo "<pre>";print_r($phone_numbers);exit;
	}
}

 ?>