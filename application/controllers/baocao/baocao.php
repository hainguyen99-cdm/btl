<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class baocao extends CI_Controller {

	// tai giao dien bao cao 
	public function baocao_view()
	{
		$this->load->view('baocao_view.php');	
	}
}
