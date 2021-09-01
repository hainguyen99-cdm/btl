<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SP_Controller extends CI_Controller {

	public function ShowSP()
	{
		$this->load->view('ListSP_view');
	}
	public function ajaxShowSP(){
		$this->load->model('sanpham_model');
		$record = $this->sanpham_model->getList()->result();
		echo json_encode($record);
	}

	public function showGio(){
		if(isset($_POST['LMaSP'])){
			$LMaSP=$_POST['LMaSP'];
				$MaSP = explode(',', $LMaSP);
			
				$x ="";
				for($i=0;$i<count($MaSP); $i++){
					if($i==0){
						$x = $x."'".$MaSP[$i]."'";
					} else{
						$x=$x.",'".$MaSP[$i]."'";
					}

				}
				$sql = "SELECT * FROM `sanpham` WHERE masanpham in (".$x.")";
				$record['info'] = $this->db->query($sql)->result_array();
				$this->load->view('GioHang_view',$record);
		}else {
			echo '<script>';
			echo 'alert("Bạn chưa thêm sản phẩm nào vào giỏ, hãy chọn sản phẩm!")';
			echo '</script>';
			redirect('SP/SP_Controller/ShowSP','refresh');
		}
	}
	public function suaSP(){

        if(isset($_GET["data"]))

        {

            $data = $_GET["data"];

        }

        $sql = "SELECT * FROM `sanpham` WHERE masanpham ="."'".$data."'";

        $record['info'] = $this->db->query($sql)->result_array();

        $sql1 = "SELECT manhacungcap FROM `nhacungcap`";

        $record['chonnhacungcap'] = $this->db->query($sql1)->result_array();

        // print_r($record['info']);

        // print_r($record['chonnhacungcap']);

        $this->load->view('suaSP_view',$record);

    }
	public function luuSP(){
		
		$masanpham=$this->input->post('masanpham');
		$tensanpham=$this->input->post('tensanpham');
		$loaisanpham=$this->input->post('loaisanpham');
		$giathanh=$this->input->post('giathanh');
		$manhacungcap=$this->input->post('manhacungcap');
		$soluong=$this->input->post('soluong');
		$anhcu =$this->input->post('anhcu');
		$this-> load->model('sanpham_model');
		//echo $anhcu;

		$config['upload_path']= 'public/css/img/';


		$config['allowed_types'] = '*';
		$config['max_size']             = 10000000;
		$config['max_width']            = 19200;
		$config['max_height']           = 10800;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('anhmoi'))
		{
			$anh = $anhcu;
		}
		else
		{
			$img = array('upload_data' => $this->upload->data());

				foreach ($img as $key => $value):
						$anh=$value['file_name'];   
				endforeach; 
		}
		$data=[
			'masanpham'=>$masanpham,
			'tensanpham'=>  $tensanpham,
			'loaisanpham'=>  $loaisanpham,
			'giathanh'=>  $giathanh,
			'manhacungcap'=>  $manhacungcap,
			'soluong'=>  $soluong,
			'anh' => $anh,
		];

		// echo '<pre>';
		// print_r($data);

		$suasanpham =  $this->sanpham_model->updateSoluong($data,$data['masanpham']);
		if($suasanpham){
			echo '<script>';
			echo 'alert("Sửa sản phẩm thành công")';
			echo '</script>';
			redirect('SP/SP_Controller/ShowSP','refresh');
		}

	}
}
?>
