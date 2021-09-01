<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dskhachhang extends CI_Controller {

	//tai trang khach hàng
	
    public function dsKhachHang_view()
	{

		$this->load->model('khachhang_model');
		$data['listkhachhang'] =$this->khachhang_model->getList()->result_array();
		$this->load->view('dskhachhang_view.php',$data);

	}
    public function Deletekhachhang($makhachhang=null)
	{
        // echo $makhachhang;
        $this->load->model('khachhang_model');

        $delete = $this->khachhang_model->deleteKhachHang($makhachhang);
    }

	// tai trang them khach hàng
	

	
	public function editKhachHang_view($makhachhang=null)
	{	
		$this->load->model('khachhang_model');
		$data['khachhang'] = $this->khachhang_model->checkIdKhachHang($makhachhang)->result_array();
		$this->load->view('editkhachhang_view.php',$data);
    
    }
	public function editKhachHang()
	{
		$this->load->model('khachhang_model');
		
		$makhachhang=$this->input->post("makhachhang");
		$tenkhachhang=$this->input->post("tenkhachhang");
		$sodienthoai=$this->input->post("sodienthoai");
		$email=$this->input->post("email");
		$mahoadonxuat=$this->input->post("mahoadonxuat");

		$newData = [
			'tenkhachhang' => $tenkhachhang,
			'sodienthoai' => $sodienthoai,
			'email' => $email,
			'mahoadonxuat' => $mahoadonxuat
		];

		// echo "<pre>";
		// print_r($check1);
		$check2 = $this->khachhang_model->checkIdKhachHang($makhachhang)->result_array();
		// echo "<pre>";
		// print_r($check2);
		$data['khachhang'] = $this->khachhang_model->checkIdKhachHang($makhachhang)->result_array();

			$this->khachhang_model->updateKhachHang($newData,$makhachhang);
			redirect('dskhachhang/dskhachhang/dsKhachHang_view','refresh');
	}
}

