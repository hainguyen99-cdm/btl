<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class admin_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

		// lay danh sach tai khoan
		function getList(){
			$this->db->select();
			$this->db->from ('taikhoan');
			return $query = $this->db->get ();
		}

		public function checkId($id)
		{
			$this->db->where('mataikhoan', $id);
			$this->db->select();
			$this->db->from ('taikhoan');
			return $query = $this->db->get ();
		}
		public function checkAcc($Acc)
		{
			$this->db->where('taikhoan', $Acc);
			$this->db->select();
			$this->db->from ('taikhoan');
			return $query = $this->db->get ();
		}
		public function addAcc($table,$data)
		{
			$insert=$this->db->insert($table,$data);
			return $insert;	
		}
		public function deleteAcc($id)
		{	
			$this->db->where('mataikhoan', $id);
			$this->db->delete('taikhoan');
			redirect('admin/admin/admin_view','refresh');
		}
		public function updateAccount($data,$id)
		{
			$this->db->where('mataikhoan', $id);
			$update=$this->db->update('taikhoan',$data);
			return $update;	
		}

    }
