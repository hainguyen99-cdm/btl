<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();

	}
	
	public function login_view()
	{
		$this->load->view('login_view.php');

	}
	public function checkLogin()
	{
		$taikhoan=$this->input->post("taikhoan");
		$matkhau=$this->input->post("matkhau");

		$this->load->library('session');
		$this->load->model('login_model');
		
		$data['loginInfo'] =$this->login_model->CheckLogin($taikhoan,$matkhau)->result_array();
		if($taikhoan==null || $matkhau==null){
			$data['error'] = "Vui lòng nhập đủ thông tin";
			$this->load->view('login_view.php',$data);
		}
		elseif(empty($data['loginInfo'])){
			$data['error'] = "Sai ten dang nhap hoac mat khau!";
			$this->load->view('login_view.php',$data);
			// echo "<pre>";
			//  print_r($data['loginInfo']);
		}
		else {
			// $this->load->view('home_view.php',$data);
			$this -> session -> set_userdata('ok',$data['loginInfo']);
			$name = $_SESSION ['ok'];
			if(isset($name)){
				// $this->load->view('home_view.php',$data);
				// print_r($data);
				redirect('home/home/load_home');
			}
		}
	}
	public function logout()
	{
		unset ( $_SESSION ['ok']);
		$this->load->view('login_view.php');

	}

}
