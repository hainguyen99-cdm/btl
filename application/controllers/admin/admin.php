<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

	//tai trang admin
	public function admin_view()
	{

		$this->load->model('admin_model');
		$data['listAccount'] = $this->admin_model->getList()->result_array();
		$this->load->view('admin_view.php',$data);

	}

	// tai trang them tai khoan
	public function addAccount_view()
	{	
		$this->load->view('addAccount_view.php');
	}

	// them tai khoan
	public function addAccount(){
		$mataikhoan=$this->input->post("mataikhoan");
		$taikhoan=$this->input->post("taikhoan");
		$matkhau=$this->input->post("matkhau");
		$loaitaikhoan=$this->input->post("loaitaikhoan");
		$ngaytao=$this->input->post("ngaytao");

		$this->load->model('admin_model');

		$result['checkId'] = $this->admin_model->checkId($mataikhoan)->result_array();
		$result['checkAcc'] = $this->admin_model->checkAcc($taikhoan)->result_array();
		$newAccount=[
			'mataikhoan'=>$mataikhoan,
			'taikhoan'=>  $taikhoan,
			'matkhau'=>  $matkhau,
			'loaitaikhoan'=>  $loaitaikhoan,
			'ngaytao'=>  $ngaytao
		];

		if(($mataikhoan == null || $taikhoan == null || $matkhau == null ||
		$loaitaikhoan == null || $ngaytao == null) || ($mataikhoan == null 
		&& $taikhoan == null && $matkhau == null && $ngaytao == null)  ){
			$data['lack'] = "Vui lòng nhập đầy đủ thông tin";
			$this->load->view('addAccount_view.php',$data);
		}
		elseif(!empty($result['checkId'])){
			$data['idError'] = "Mã tài khoản đã tồn tại, nhập mã khác";
			$this->load->view('addAccount_view.php',$data);
		}
		elseif(!empty($result['checkAcc'])){
			$data['accError'] = "Tài khoản đã tồn tại, nhập mã khác";
			$this->load->view('addAccount_view.php',$data);
		}
		else{
			$insert=$this->admin_model->addAcc('taikhoan',$newAccount);
			if($insert){
				$success['success'] =" Thêm tài khoản thành công";
				redirect('admin/admin/admin_view','refresh',$success);
			}
		}
	}

	//xoa tai khoan 
	public function DeleteAcc($id=null)
	{	
		// echo $id;
		$this->load->model('admin_model');
		try{
			$delete = $this->admin_model->deleteAcc($id);
		}catch (Exception $e) {
			echo $e ;
 		}	
		
	}

	// load modifyAcc 
	public function load_modifyAccount($mataikhoan=null)
	{
		$this->load->model('admin_model');
		$data['modifyAcc'] = $this->admin_model->checkId($mataikhoan)->result_array();
		$this->load->view('modifyAccount_view.php',$data);
		// echo "<pre>";
		// print_r($data);

	}
	public function modifyAccount()
	{
		$this->load->model('admin_model');
		
		$mataikhoan=$this->input->post("mataikhoan");
		$taikhoan=$this->input->post("taikhoan");
		$matkhau=$this->input->post("matkhau");
		$loaitaikhoan=$this->input->post("loaitaikhoan");
		$ngaytao=$this->input->post("ngaytao");

		$newData = [
			'taikhoan' => $taikhoan,
			'matkhau' => $matkhau,
			'loaitaikhoan' => $loaitaikhoan,
			'ngaytao' => $ngaytao
		];
		$check1= $this->admin_model->checkAcc($taikhoan)->result_array();
		// echo "<pre>";
		// print_r($check1);
		$check2 = $this->admin_model->checkId($mataikhoan)->result_array();
		// echo "<pre>";
		// print_r($check2);
		$data['modifyAcc'] = $this->admin_model->checkId($mataikhoan)->result_array();

		 if(!empty($check1) && $check1[0]['taikhoan'] != $check2[0]['taikhoan']){
			echo '<script>';
			echo 'alert("Taì khoản đã tồn tại")';
			echo '</script>';
		
			$this->load->view('modifyAccount_view.php',$data);
		 }
		else{
			$this->admin_model->updateAccount($newData,$mataikhoan);
			redirect('admin/admin/admin_view','refresh');
		}
	}
}
