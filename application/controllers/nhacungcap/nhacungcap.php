<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nhacungcap extends CI_Controller {

	//tai trang  nha cung cap
	public function ncc_view()
	{

		$this->load->model('ncc_model');
		$data['listncc'] = $this->ncc_model->getMancc()->result_array();
		$this->load->view('ncc_view.php',$data);

	}

	public function DeleteNcc($manhacungcap=null)
	{	
		// echo $id;
		$this->load->model('ncc_model');
		try{
			$delete = $this->ncc_model->deleteNcc($manhacungcap);
		}catch (Exception $e) {
			echo $e ;
 		}	
}




 	public function suaNcc_view($manhacungcap=null)
	{
		$this->load->model('ncc_model');
		$data['modifyNcc'] = $this->ncc_model->checkNcc($manhacungcap)->result_array();
		$this->load->view('suancc_view.php',$data);
		// echo "<pre>";
		// print_r($data);

	}
	public function modifyNcc()
	{
		$this->load->model('ncc_model');
		$tennhacungcap=$this->input->post("tennhacungcap");
		$manhacungcap=$this->input->post("manhacungcap");
		$email=$this->input->post("email");
		
		$newData = [
			'tennhacungcap' => $tennhacungcap,
			'email' => $email,
		];
		$check1= $this->ncc_model->checkNcc($manhacungcap)->result_array();
		// echo "<pre>";
		// print_r($check1);
		// $check2 = $this->ncc_model->checkNcc($email)->result_array();
		// echo "<pre>";
		// print_r($check2);
		$data['modifyNcc'] = $this->ncc_model->checkNcc($manhacungcap)->result_array();

		 if(!empty($check1) && $check1[0]['manhacungcap'] != $check2[0]['manhacungcap']){
			echo '<script>';
			echo 'alert("Nhà cung cấp đã tồn tại")';
			echo '</script>';
		
			$this->load->view('suancc_view.php',$data);
		}
		else{
			$this->ncc_model->suaNcc($newData,$manhacungcap);
			redirect('nhacungcap/nhacungcap/ncc_view','refresh');
		}
	}
// tải trang them ncc
	public function addNcc_view()
	{	
		$this->load->view('addNcc_view.php');
	}

	// them tai khoan
	public function addNcc(){
		$manhacungcap=$this->input->post("manhacungcap");
		$tennhacungcap=$this->input->post("tennhacungcap");
		$email=$this->input->post("email");
		

		$this->load->model('ncc_model');

		$result['checkNcc'] = $this->ncc_model->checkNcc($manhacungcap)->result_array();
		$result['checkEmail'] = $this->ncc_model->checkEmail($email)->result_array();
		$newNcc=[
			'manhacungcap'=>$manhacungcap,
			'tennhacungcap'=>  $tennhacungcap,
			'email'=>  $email,
		];

		if(($manhacungcap == null || $tennhacungcap == null || $email == null )  ){
			$data['lack'] = "Vui lòng nhập đầy đủ thông tin nhà cung cấp";
			$this->load->view('addNcc_view.php',$data);
			echo $data['lack'];
		}
		elseif(!empty($result['checkNcc'])){
			$data['idError'] = "Mã nhà cung cấp đã tồn tại, nhập mã khác";
			$this->load->view('addNcc_view.php',$data);
		}
		elseif(!empty($result['checkEmail'])){
			$data['emailError'] = "Email đã tồn tại, nhập email khác";
			$this->load->view('addNcc_view.php',$data);
		}
		else{
			$insert=$this->ncc_model->addNcc('nhacungcap',$newNcc);
			if($insert){
				$success['success'] =" Thêm nhà cung cấp thành công";
				redirect('nhacungcap/nhacungcap/ncc_view','refresh',$success);
			}
		}
	}
}

	
