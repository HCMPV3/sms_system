<?php
// if(!defined(BASEPATH)) exit('No direct script access allowed');
/**
*  Author:
*/
class Home extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// echo "I WORK";exit;
		$data['content'] = 'home_default';
		$this ->load ->view('home_template',$data);
	}
}
?>