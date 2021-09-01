<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class baocao_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

		// lay danh sach bao cao

		function getList($col,$query){
			//lấy ra trong cơ sở dữ liệu những hàng thỏa mãn điều kiện có $col like $query
			$this->db->like($col, $query);
			$this->db->select();
			$this->db->from ('baocao');
			return $query = $this->db->get ();
		}

		//Xoá báo cáo xuất
		public function deleteBcx($id)
		{	
			$this->db->where('mabaocao', $id);
			$this->db->delete('baocao');
			redirect('baocao/baocaox/baocaox_view','refresh');
		}
		//Xoá báo cáo nhập
		public function deleteBcn($id)
		{	
			$this->db->where('mabaocao', $id);
			$this->db->delete('baocao');
			redirect('baocao/baocaon/baocaon_view','refresh');
		}
		public function updateBcx($data,$id)
		{
			$this->db->where('mabaocao', $id);
			$update=$this->db->update('baocao',$data);
			return $update;	
		}
		public function updateBcn($data,$id)
		{
			$this->db->where('mabaocao', $id);
			$update=$this->db->update('baocao',$data);
			return $update;	
		}

		public function checkId($id)
		{
			$this->db->where('mabaocao', $id);
			$this->db->select();
			$this->db->from ('baocao');
			return $query = $this->db->get ();
		}
		public function checkAcc($Acc)
		{
			$this->db->where('tenbaocao', $Acc);
			$this->db->select();
			$this->db->from ('baocao');
			return $query = $this->db->get ();
		}
		public function addAcc($table,$data)
		{
			$insert=$this->db->insert($table,$data);
			return $insert;	
		}
		public function addBcn($table,$data)
		{
			$insert=$this->db->insert($table,$data);
			return $insert;	
		}
		public function addBcx($table,$data)
		{
			$insert=$this->db->insert($table,$data);
			return $insert;	
		}

		//xem chi tiết HBCHDN
		public function get_baocao_mahoadonnhap($mahoadonnhap)
		{
			$this->db->where('mahoadonnhap', $mahoadonnhap);
			$this->db->select();
			$this->db->from ('hoadonnhap');
			return $query = $this->db->get ();
		}
		public function get_baocao_mabaocao($mahoadonnhap)
		{
			$this->db->where('mahoadonnhap', $mahoadonnhap);
			$this->db->select();
			$this->db->from ('baocao');
			return $query = $this->db->get ();
		}

		//xem chi tiết HBCHDX
		public function get_baocao_mahoadonxuat($mahoadonxuat)
		{
			$this->db->where('mahoadonxuat', $mahoadonxuat);
			$this->db->select();
			$this->db->from ('hoadonxuat');
			return $query = $this->db->get ();
		}
		public function get_baocao_mabaocao1($mahoadonxuat)
		{
			$this->db->where('mahoadonxuat', $mahoadonxuat);
			$this->db->select();
			$this->db->from ('baocao');
			return $query = $this->db->get ();
		}

		//LAY MAHDN
		function getListMHDN(){
			$this->db->select();
			$this->db->from ('hoadonnhap');
			return $query = $this->db->get ();
		}
		//LAY MAHDX
		function getListMHDX(){
			$this->db->select();
			$this->db->from ('hoadonxuat');
			return $query = $this->db->get ();
		}
		//LAY MAHDN
		function getListMTK(){
			$this->db->select();
			$this->db->from ('taikhoan');
			return $query = $this->db->get ();
		}

    }
