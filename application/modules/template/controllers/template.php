<?php
	class Template extends MY_Controller
	{
		function __construct()
		{
			parent:: __construct();
			$this->load->model('template_m');
		}

		function call_template($data = NULL)
		{
			$this->load->view('template_v',$data);
		}
	}
?>