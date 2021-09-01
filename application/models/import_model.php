<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class import_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

		// lay danh sach san pham trong hang cho nhap
		public function getList(){
			$this->db->select();
			$this->db->from ('hangchonhap');
			return $query = $this->db->get ();
		}
		public function addToCart($data){
			$insert=$this->db->insert('hangchonhap',$data);
			return $insert;	
		}
		public function updateCart($data,$id){
			$this->db->where('masanpham', $id);
			$update=$this->db->update('hangchonhap',$data);
			return $update;	
		}
		public function checkMasanpham($masanpham){
			$this->db->where('masanpham', $masanpham);
			$this->db->select();
			$this->db->from ('hangchonhap');
			return $query = $this->db->get ();
		}
		public function delete($id)
		{	
			$this->db->where('masanpham', $id);
			$this->db->delete('hangchonhap');
			redirect('import/import/waitImport_view','refresh');
		}
		public function deleteAll($table)
		{	
			$this->db->empty_table($table); 
		
		}
		public function insertHdn($data){
			$insert=$this->db->insert('hoadonnhap',$data);
			return $insert;	
		}
		public function checkmahoadonnhap($mahoadonnhap)
		{
			$this->db->where('mahoadonnhap', $mahoadonnhap);
			$this->db->select();
			$this->db->from ('hoadonnhap');
			return $query = $this->db->get ();
		}
	}

