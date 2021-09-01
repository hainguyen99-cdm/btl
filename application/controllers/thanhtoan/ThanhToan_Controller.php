<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ThanhToan_Controller extends CI_Controller {
	public function test()
	{	
		$tenkhachhang=$this->input->post("tenkhachhang");
		$sodienthoai=$this->input->post("sodienthoai");
		$email=$this->input->post("email");
		$mahoadonxuat=$this->input->post("mahoadonxuat");
		$ngayxuat=$this->input->post("ngayxuat");


		$info1[] = $this->input->post("info1");
		$tongtien = $this->input->post("TienTungSP");
		$soluong = $this->input->post("SLTungSP");

		
		$newTongtien = explode(',', $tongtien);
		$newSoluong = explode(',', $soluong);


		$newkhachhang=[
			'tenkhachhang'=>  $tenkhachhang,
			'sodienthoai'=>  $sodienthoai,
			'email'=>  $email,
			'mahoadonxuat'=>  $mahoadonxuat
		];
		$this->load->model('sanpham_model');
		$this->load->model('khachhang_model');
		$this->load->model('export_model');
		$this->load->model('baocao_model');



		// bat loi
		$checkHdx = $this->export_model->checkHdx($mahoadonxuat)->result_array();

		if(($tenkhachhang == null || $sodienthoai == null ||
		$email == null || $mahoadonxuat == null) ){
			$data['info'] = $this->sanpham_model->getSp($info1[0])->result_array();
			$data['lack'] = "Vui lòng nhập đầy đủ thông tin";
			$this->load->view('GioHang_view.php',$data);
		
		}
		elseif(!empty($checkHdx)){
			$data['info'] = $this->sanpham_model->getSp($info1[0])->result_array();
			$data['hdxError'] = "Mã hóa đơn xuất đã tồn tại";
			$this->load->view('GioHang_view.php',$data);
		}
		else {
			$data['sanpham'] = $this->sanpham_model->getSp($info1[0])->result_array();
			$i=0;
			$n =count($data['sanpham']);

			//tru di so luong san pham trong database
			for($i=0; $i<$n; $i++){
				$soluongsauxuat = $data['sanpham'][$i]['soluong'] - $newSoluong[$i];
				
				$data['sanpham'][$i]['soluong'] = $soluongsauxuat;
				// echo "<br>".$data['sanpham'][$i]['soluong'];
				$this->sanpham_model->updateSoluong($data['sanpham'][$i],$data['sanpham'][$i]['masanpham']);				
			}
			

			//lay ra thong tin hoa don va them vao database
			
			$hoadon[] =[];
			for($i=0;$i<$n;$i++){
				$hoadon[$i]['mahoadonxuat'] = $mahoadonxuat;
				$hoadon[$i]['masanpham'] = $data['sanpham'][$i]['masanpham'];
				$hoadon[$i]['ngayxuat'] = $ngayxuat;
				$hoadon[$i]['soluong'] = $newSoluong[$i];
				$hoadon[$i]['giathanh'] = $data['sanpham'][$i]['giathanh'];
				$hoadon[$i]['tongtien'] = $newTongtien[$i];
				// echo '<pre>';
				// print_r($hoadon[$i]);
				$inhoadon =  $this->export_model->insertHdx($hoadon[$i]);			
			}


			//them khach hang vao database
			$themkhachhang = $this->khachhang_model->addKhachHang('khachhang',$newkhachhang);

			//them bao cao xuat hang
			$name = $_SESSION ['ok'];
			
			$tenbaocao = 'báo cáo '.$mahoadonxuat;

			$newBaocao = [
				'tenbaocao'=>$tenbaocao,
				'mahoadonnhap' => NULL,
				'mahoadonxuat' => $mahoadonxuat,
				'mataikhoan' => $name[0]['taikhoan']
			];
			$this->baocao_model->addBcn('baocao',$newBaocao);
			echo '<script>';
			echo 'alert("Xuất hàng thành công. Hãy kiểm tra báo cáo xuất!")';
			echo '</script>';
			redirect('SP/SP_Controller/ShowSP','refresh');
			

		 }
	}
}

