<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class ncc_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

		// lay danh sach ncc
		function getMancc(){
			$this->db->select();
			$this->db->from ('nhacungcap');
			return $query = $this->db->get ();
		}
		// xoa ncc
		public function deleteNcc($manhacungcap)
		{	
			$this->db->where('manhacungcap', $manhacungcap);
			$this->db->delete('nhacungcap');
			redirect('nhacungcap/nhacungcap/ncc_view','refresh');
		}
		// sửa nhà u
		public function suaNcc($data,$manhacungcap)
		{
			$this->db->where('manhacungcap', $manhacungcap);
			$update=$this->db->update('nhacungcap',$data);
			return $update;	
		}
		public function checkNcc($manhacungcap)
		{
			$this->db->where('manhacungcap', $manhacungcap);
			$this->db->select();
			$this->db->from ('nhacungcap');
			return $query = $this->db->get ();
		}
		public function LayNCC_TheoMa($manhacungcap)
		{
			$this->db->where_in('manhacungcap', $manhacungcap);
			$this->db->select();
			$this->db->from ('nhacungcap');
			return $query = $this->db->get ();
		}
		public function checkEmail($email)
		{
			$this->db->where('email', $email);
			$this->db->select();
			$this->db->from ('nhacungcap');
			return $query = $this->db->get ();
		}
		public function addNcc($table,$data)
		{
			$insert=$this->db->insert($table,$data);
			return $insert;	
		}

}

		