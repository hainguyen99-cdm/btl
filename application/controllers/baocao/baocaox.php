<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class baocaox extends CI_Controller {

    
    public function baocaox_view()
    {
    

    	 $this->load->model('baocao_model');
		$col = 'mahoadonxuat';
		$query = 'hdx';
		$data['listBcx'] = $this->baocao_model->getList($col,$query)->result_array();
		$this->load->view('bcx.php',$data);
	} 
	//Xóa báo cáo xuất
	public function DeleteBcx($id=null)
	{	
		// echo $id;
		$this->load->model('baocao_model');
		try{
			$delete = $this->baocao_model->deleteBcx($id);
		}catch (Exception $e) {
			echo $e ;
		}	
	}
	
		//Xem chi tiết
	public function view_detailBcx($mahoadonxuat = NULL)
		{
			
			$this->load->model('baocao_model');
			$this->load->model('khachhang_model');
			//lay hoa don xuat 
			$result['detailBcx'] =$this->baocao_model->get_baocao_mahoadonxuat($mahoadonxuat)->result_array();
			//lay bao cao xuat 
			$result['detailBcc'] =$this->baocao_model->get_baocao_mabaocao1($mahoadonxuat)->result_array();
			$result['detailKh'] = $this->khachhang_model->getKH_DH($mahoadonxuat)->result_array();
			$this->load->view('detailBcx_view',$result);

		}

    
}
