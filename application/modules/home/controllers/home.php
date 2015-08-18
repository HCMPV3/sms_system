<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent:: __construct();
		// $this -> load ->model('student_model');
		// $this -> load -> module("template");
	}

	public function index()
	{	
		$this -> template ->call_admin_template();
	}

}
