<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class import extends CI_Controller {

	//tai them san pham vao hang cho nhap
	public function import_view()
	{
		$this->load->model('supplier_model');

		$data['chonnhacungcap'] = $this->supplier_model->getList()->result_array();

		$this->load->view('import_view.php',$data);
	
	}

	// tai trang hang cho nhap hang
	public function waitImport_view()
	{	
		$this->load->model('import_model');

		$data['chonhap'] = $this->import_model->getList()->result_array();

		// echo "<pre>";
		// print_r($data);
		$this->load->view('waitImport_view.php',$data);

	}

	//them san pham vao gio hang nhap
	public function  waitImport() {

		$this-> load->model('import_model');
		$this->load->model('supplier_model');
		//nhan gia tri tu form
		$masanpham=$this->input->post('masanpham');
		$tensanpham=$this->input->post('tensanpham');
		$loaisanpham=$this->input->post('loaisanpham');
		$giathanh=$this->input->post('giathanh');
		$tennhacungcap=$this->input->post('tennhacungcap');
		$soluong=$this->input->post('soluong');

		if($masanpham ==null ||$tensanpham == null ||$tensanpham == null ||
		$giathanh == null || $tennhacungcap == null || $soluong == null ) {
			$data['chonnhacungcap'] = $this->supplier_model->getList()->result_array();
			$data['lack'] = "Vui lòng nhập đầy đủ thông tin";
			$this->load->view('import_view.php',$data);
		}
		else{

			//load anh
			$config['upload_path']          = 'public/css/img/';
			$config['allowed_types'] = '*';
			$config['max_size']             = 10000000;
			$config['max_width']            = 19200;
			$config['max_height']           = 10800;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('anh'))
			{
				$anh=null;
			}
			else
			{
				$img = array('upload_data' => $this->upload->data());

					foreach ($img as $key => $value):
							$anh=$value['file_name'];   
					endforeach; 
			}
			
			
			$laymancc = $this->supplier_model->getName($tennhacungcap)->result_array();
				
			// echo '<pre>';
			// print_r($laymancc);

				$tongtien = $giathanh*$soluong;
				$data=[
					'masanpham'=>$masanpham,
					'tensanpham'=>  $tensanpham,
					'loaisanpham'=>  $loaisanpham,
					'giathanh'=>  $giathanh,
					'manhacungcap'=>  $laymancc[0]['manhacungcap'],
					'soluong'=>  $soluong,
					'anh' => $anh,
					'tongtien' => $tongtien
				];
			
				// echo '<pre>';
				// print_r($data);


			$checkma =  $this->import_model->checkMasanpham($data['masanpham'])->result_array();
			// echo '<pre>';
			// print_r($checkma);
			if(!empty($checkma)){
				$soluongmoi = $data['soluong'] + $checkma[0]['soluong'];
				$checkma[0]['soluong'] = $soluongmoi;
				$checkma[0]['tongtien'] = $soluongmoi * $checkma[0]['giathanh'];
				$suasoluong =  $this->import_model->updateCart($checkma[0],$masanpham);
				redirect('import/import/waitImport_view','refresh');
				
			}else {
				$this->import_model->addToCart($data);
				redirect('import/import/waitImport_view','refresh');
			}
		}
	}
	//xoa san pham trong gio hang nhap
	public function deleteIteam($id=null)
	{	
		// echo $id;
		$this->load->model('import_model');
		try{
			$delete = $this->import_model->delete($id);
		}catch (Exception $e) {
			echo $e ;
 		}	
		
	}
	public function deleteall()
	{	
		// echo $id;
		$this->load->model('import_model');
		$delete = $this->import_model->deleteAll('hangchonhap');
			redirect('import/import/waitImport_view','refresh');
		
		
	}


	// them san pham tu gio nhap hang vao kho
	public function importItem(){
		$this-> load->model('import_model');
		$this->load->model('item_model');
		$this->load->model('baocao_model');



		//nhan gia tri tu form
		$mahoadonnhap=$this->input->post('mahoadonnhap');
		$ngaynhap=$this->input->post('ngaynhap');

		$checkhoadon =  $this->import_model->checkmahoadonnhap($mahoadonnhap)->result_array();

		if($mahoadonnhap==null || $ngaynhap==null){
			$data['chonhap'] = $this->import_model->getList()->result_array();
			$data['error'] ="Vui lòng nhập đầy đủ thông tin";

			$this->load->view('waitImport_view.php',$data);
			return;
		}
		elseif((!empty($checkhoadon)))
		{
			$data['chonhap'] = $this->import_model->getList()->result_array();
			$data['error'] ="Mã hóa đơn đã tồn tại";

			$this->load->view('waitImport_view.php',$data);
			return;
		}
		else{
			$list= $this->import_model->getList()->result_array();

			$tonghoadon = 0;
			$i=0;
			foreach($list as $key => $value):
				$tonghoadon = $tonghoadon +$value['tongtien'];
				$checkma =  $this->item_model->checkItem($value['masanpham'])->result_array();

				if(!empty($checkma)){
					$soluongmoi = $value['soluong'] + $checkma[0]['soluong'];
					$checkma[0]['soluong'] = $soluongmoi;
				
					unset($checkma[0]['tongtien']);
					$suasoluong =  $this->item_model->updateItem($checkma[0],$checkma[0]['masanpham']);				
				}
				else {
					unset($value['tongtien']);
					$this->item_model->insert($value);
				}
				$i++;
			endforeach;

			//them hoa don nhap
			for($j=0; $j<$i; $j++){
				$checkma =  $this->item_model->checkItem($list[$j]['masanpham'])->result_array();
				if(!empty($checkma)){

					$list[$j]=[
						'mahoadonnhap'=>$mahoadonnhap,
						'masanpham' => $list[$j]['masanpham'],
						'ngaynhap'=>  $ngaynhap,
						'soluong'=> $list[$j]['soluong'],
						'giathanh'=>  $checkma[0]['giathanh'],
						'tongtien'=> ($checkma[0]['giathanh']*$list[$j]['soluong']),
					];

					$this->import_model->insertHdn($list[$j]);		
				}
				else {
					$list[$j]=[
						'mahoadonnhap'=>$mahoadonnhap,
						'masanpham' => $list[$j]['masanpham'],
						'ngaynhap'=>  $ngaynhap,
						'soluong'=> $list[$j]['soluong'],
						'giathanh'=>  $list[$j]['giathanh'],
						'tongtien'=> $list[$j]['tongtien'],
					];
					$this->import_model->insertHdn($list[$j]);
				}
			}

			//them bao cao nhap
			$name = $_SESSION ['ok'];
			
			$tenbaocao = 'báo cáo '.$mahoadonnhap;

			$newBaocao = [
				'tenbaocao'=>$tenbaocao,
				'mahoadonnhap' => $mahoadonnhap,
				'mahoadonxuat' => NULL,
				'mataikhoan' => $name[0]['taikhoan']
			];
			$this->baocao_model->addBcn('baocao',$newBaocao);
			
			echo '<script>';
			echo 'alert("Nhập hàng thành công")';
			echo '</script>';
			redirect('import/import/deleteall','refresh');
		 }

	}

}
