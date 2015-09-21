<?php
// if(!defined(BASEPATH)) exit('No direct script access allowed');
/**
*  Author:
*/
class Template extends MY_Controller
{
	
	public function __construct() {        
    parent::__construct();
    $this->load->model('template_m');
    $this->load->model('users/m_users');
	// $this -> check_login();
	}

	public function index()
	{
		// echo "I WORK";exit;
		// $active_users = $this->template_m->get_active_user_count();
		$all_recepients = $this->template_m->get_all_recepient_count();
		// $r_emails = $this->template_m->get_all_recieving_emails();
		$r_sms = $this->template_m->get_all_recieving_sms();

		$data['recepients_count'] = $all_recepients[0]['recepient_count'];
		// $data['emails_count'] = $r_emails[0]['recieving_emails'];
		$data['sms_count'] = $r_sms[0]['recieving_sms'];
		// $data['all_users'] = $all_users[0]['all_users'];
		$data['content'] = 'template_default';
		$this ->load ->view('template',$data);
	}

	public function call_admin_template($data = NULL){
		$all_recepients = $this->template_m->get_all_recepient_count();
		// $r_emails = $this->template_m->get_all_recieving_emails();
		// $r_sms = $this->template_m->get_all_recieving_sms();
		$r_sms = $this->m_users->get_recepients();
		$data['sms_count'] = count($r_sms);
		$all_users = $this->template_m->get_all_user_count();

		$data['recepients_count'] = $all_recepients[0]['recepient_count'];
		// $data['emails_count'] = $r_emails[0]['recieving_emails'];
		// $data['sms_count'] = $r_sms[0]['recieving_sms'];
		$data['all_users'] = $all_users[0]['all_users'];
		$data['content'] = isset($data['content'])? $data['content']:'template_default';
		// echo "<pre>";print_r($data['active_users']);exit;
		$this ->load ->view('template',$data);
	}

}
?>