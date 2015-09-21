<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('m_users');
		$this->check_login();
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
		$data['user_data_faulty'] = $this->m_users->get_faulty_recepients();
		$data['category_data'] = $this->m_users->get_categories();
		$data['district_data'] = $this->m_users->get_districts();
		$data['county_data'] = $this->m_users->get_counties();
		$data['usertypes'] = $this->m_users->get_usertypes();
		$data['active'] = 'recipients';
		// echo "<pre>";print_r($data['user_data_faulty']);echo "</pre>";exit;
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

	public function rename_category(){
		$category_id = $this->input->post("category_id_renaming");
		$category_name = $this->input->post("new_category_name");
		// echo "UPDATE categories SET category = $category_name WHERE id = $category_id";exit;
		$query = $this->db->query("UPDATE categories SET category = '$category_name' WHERE id = $category_id");

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
		$county = $this->input->post('county');
		$usertypes = 1;//the default for usertype

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
			'sms_status' => 1,
			// 'email_status' => $email_recieve,
			'category_id' => $category,
			'district_id' => $district,
			'county_id' => $county,
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
				$redirect_url = 'users/recipients';
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
				$redirect_url = 'users/recipients';

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

	public function upload_recepients($file_name = NULL){
		//  Include PHPExcel_IOFactory
		// include 'PHPExcel/IOFactory.php';
		// include 'PHPExcel/PHPExcel.php';

		$inputFileName = 'uploads/excel/'.$file_name;

		$objReader = new PHPExcel_Reader_Excel2007();
		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($inputFileName);

		// echo "<pre>";print_r($inputFileName);exit;

		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow()+1; 
		$highestColumn = $sheet->getHighestColumn();

		// echo "<pre>";print_r($highestRow);echo "</pre>";exit;
		$rowData = array();
		for ($row = 3; $row < $highestRow; $row++){ 
		    //  Read a row of data into an array
		    $rowData_ = $sheet->rangeToArray('A' . $row . ':H' . $row);
		// echo "<pre>";print_r($rowData_);echo "</pre>";
		    array_push($rowData, $rowData_[0]);
		    //  Insert row data array into your database of choice here
		}

		// echo "<pre>";print_r($rowData);echo "</pre>";exit;
		/*
		names
		facility_name
		mfl
		district
		id_number
		mobile
		email
		trainingsite
		*/

		foreach ($rowData as $r_data) {
			// echo "<pre>";print_r($r_data);echo "</pre>";
			$status = 1;
			$district = strtolower($r_data[3]);
			$district = ucfirst($district);
			$fault_index = NULL;
			// echo $district;

			$facility_code = $r_data[2];

			$query = "SELECT * FROM facilities WHERE facility_code = '$facility_code'";
			// $query = "SELECT * FROM districts WHERE district = '$district'";

			$result = $this->db->query($query)->result_array();
			// $district_name = $result[0]['district'];

			// echo "<pre>";print_r($result);echo "</pre>";
			if (empty($result)) {
			$queryy = "SELECT * FROM districts WHERE district = '$district'";
			$resultt = $this->db->query($queryy)->result_array();
				// echo $r_data[0]."</br>";
				// $query = "";
			if (empty($resultt)) {
				$fault_index = 1;
				$status = 2;
				$district_id = NULL;
			}else{
				$district_id = $result[0]['id'];
				$fault_index = 0;
				// echo "<pre>";print_r($resultt); echo "</pre>";
			}
			}//if no facility code match
			else{
				$district_id = $result[0]['district'];
			}
		
					$names = $r_data[0];
					$phone = $r_data[5];
					if (isset($phone)) {
						$phone = preg_replace('/\s+/', '', $phone);
						$phone = ltrim($phone, '0');
						$phone = '254'.$phone;
					}else{
						$phone = NULL;
					}
					
					$email = $r_data[6];
					$number_length = isset($phone)?strlen($phone):0;
					// echo $phone;
					echo "Number Length:  ".$number_length;
					if ($number_length != 12) {
						if (isset($fault_index)) {
							$fault_index = 3;//both error in phone and district
							// $status = 2;
						}else{
							$fault_index = 2;
						}
							$status = 2;
					}

					$sms_status = isset($status)? $status: 1;
					$rec = array();
					$rec_data = array(
						'fname' => $names,
						'email' => $email,
						'phone_no' => $phone,
						// 'email_status' => 1,
						'sms_status' => $sms_status,
						'user_type' => 1,
						'category_id' => 1,
						'district_id'=>$district_id,
						'fault_index'=>$fault_index
						);

					array_push($rec, $rec_data);
					$insertion = $this->db->insert_batch('recepients',$rec);
				echo "QUERY SUCCESSFUL. ".$insertion." ".mysql_insert_id()."</br>";
		}
		
					// };
		// echo "QUERY SUCCESSFUL. LAST ID INSERTED: ".mysql_insert_id(); exit;
		redirect( base_url().'users/recipients');

	}//end of recepient upload

	public function download_excel(){
		// We'll be outputting an excel file
		$filename = "excel_files/sms_recipients_template.xlsx";

		$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
    	$excel2=$objPHPExcel= $excel2->load($filename);
    	$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');

		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
		// It will be called file.xls
		header("Content-Disposition: attachment; filename=$filename");
		// Write file to the browser
        $objWriter -> save('php://output');
       $objPHPExcel -> disconnectWorksheets();
       unset($objPHPExcel);
	}

	public function upload_excel(){
		// echo "<pre>";print_r($this->input->post());echo "</pre>";exit;
		// ini_set('memory_limit', '1024M'); // or you could use 1G
		$config['upload_path'] = 'uploads/excel/';
		$config['allowed_types'] = 'xls|xlsx';
		$config['max_size']	= '2048';

		$res = $this->load->library('upload', $config);
		// echo "<pre>";print_r($res);exit;
		// $field_name = "recipient_excel";
		if ( ! $this->upload->do_upload("recipient_excel"))
		{
			echo "<pre>";print_r($this->upload->display_errors());echo "</pre>";
			echo "I didnt work";
		}
		else
		{
			// $data = array('upload_data' => $this->upload->data());
			// echo "<pre>";print_r($this->upload->data());echo "</pre>";
			$result = $this->upload->data();
			// echo "<pre>";print_r($result['file_name']);echo "</pre>";
			// redirect(base_url().'users/upload_excel/'.);
			$this->upload_recepients($result['file_name']);
			echo "I worked";
		}
	}
}
?>