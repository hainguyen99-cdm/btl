<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class export extends CI_Controller {

	//tai trang admin
	public function export_view()
	{
		$this->load->view('export_view.php');

	}

	// tai trang them tai khoan
	public function exportHistory_view()
	{
		$this->load->view('exportHistory_view.php');

	}

}
