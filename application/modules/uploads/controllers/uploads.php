<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Uploads extends MY_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->model('m_uploads');
		$this->load->model('m_users');
		$this->check_login();
	}

	public function index(){
		$data['user_data'] = $this->m_users->get_recepients();
		$uploads = $this->m_uploads->get_uploads();
		// echo "<pre>";print_r($uploads);exit;
		// echo "I work";
		$data['active'] = "uploads";
		$data['uploads'] = $uploads;
		$data['content'] = "uploads/uploads_v";
		$this ->template->call_admin_template($data);
	}

	public function download_excel($file_name){
		// We'll be outputting an excel file
		$filename = "uploaded_files/excel/".$file_name;

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


}

?>