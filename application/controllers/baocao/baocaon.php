<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class baocaon extends CI_Controller {

    // hien thi giao dien bao cao nhap 
    public function baocaon_view()
    {	
		//load model 
    	$this->load->model('baocao_model');

		$col = 'mahoadonnhap';
		$query = 'hdn';


		$data['listBcn'] = $this->baocao_model->getList($col,$query)->result_array();

		$this->load->view('bcn.php',$data);

    }
	
    //Xóa báo cáo nhập
		public function DeleteBcn($mabaocao=null)
		{	
		
			$this->load->model('baocao_model');
			try{
				$delete = $this->baocao_model->deleteBcn($mabaocao);
			}catch (Exception $e) {
				echo $e ;
	 		}	
		}
		

				//Xem chi tiết
		public function view_detailBcn($mahoadonnhap = NULL)
			{
				
				$this->load->model('baocao_model');
				$this->load->model('item_model');
				$this->load->model('ncc_model');

	

				$result['detailBcn'] = $this->baocao_model->get_baocao_mahoadonnhap($mahoadonnhap)->result_array();
				$result['detailBc'] = $this->baocao_model->get_baocao_mabaocao($mahoadonnhap)->result_array();
				
				
				$ListMasp = [];
				
					
				$result['NhaCC'] = [];
				for($i=0; $i< count($result['detailBcn']) ;$i++){
					$a = $result['detailBcn'][$i]['masanpham'];
					array_push($ListMasp, $a);
				}
				$maNcc = $this->item_model->layMaNcc($ListMasp)->result_array();

				for($i=0; $i< count($maNcc); $i++){
					$Nhacungcap = $this->ncc_model->LayNCC_TheoMa($maNcc[$i])->result_array();

					array_push($result['NhaCC'], $Nhacungcap);
				}

				
				for($i=0 ; $i< count($result['detailBcn']); $i++){
					$a =$result['NhaCC'][$i][0]['tennhacungcap'];
					array_push($result['detailBcn'][$i], $a);
				}
				$this->load->view('detailBcn_view',$result);

			}		
	

}
