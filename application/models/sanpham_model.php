<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class sanpham_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
			$this->load->database();
        }
		public function getList(){
			$this->db->select();
			$this->db->from ('sanpham');
			$this->db->order_by('soluong','desc');
			return $query = $this->db->get ();
		}

        public function getSp($masanpham)
        {
			$this->db->where_in('masanpham', $masanpham);
			$this->db->select();
			$this->db->from ('sanpham');
			return $query = $this->db->get ();
        }
		public function updateSoluong($data,$id){
			$this->db->where('masanpham', $id);
			$update=$this->db->update('sanpham',$data);
			return $update;	
		}
    }
