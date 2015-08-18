<?php
// if(!defined(BASEPATH)) exit('No direct script access allowed');
/**
*  Author:
*/
class Template extends MY_Controller
{
	
	public function __construct() {        
    parent::__construct();
	}

	public function index()
	{
		// echo "I WORK";exit;
		$data['content'] = 'template_default';
		$this ->load ->view('template',$data);
	}

	public function call_admin_template($data = NULL){
		$data['content'] = isset($data['content'])? $data['content']:'template_default';
		// echo "<pre>";print_r($data);exit;
		$this ->load ->view('template',$data);
	}

}
?>