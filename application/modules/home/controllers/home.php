<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this -> load ->model('users/m_users');
		$this -> check_login();
		// $this -> load -> module("template");
	}

	public function index()
	{	
		$data['user_data'] = $this->m_users->get_recepients();

		$this -> template ->call_admin_template($data);
	}

}
