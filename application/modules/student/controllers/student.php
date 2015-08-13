<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends MY_Controller {
	function __construct(){
		$this -> load ->model('student_model');
	}

	public function index()
	{
		$this ->load ->view('student_template');
	}

	public function student_inbox(){
		$messages = $this->student_model->get_messages(1);
		echo "<pre>";print_r($messages);echo "</pre>";exit;
		$data['content'] = "student_inbox";
		$this->load->view('student_template',$data);
	}
}
