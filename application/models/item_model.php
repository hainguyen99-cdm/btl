<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class item_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
			$this->load->database();
        }

		public function getList(){
			$this->db->select();
			$this->db->from ('sanpham');
			return $query = $this->db->get ();
		}

		public function checkItem($masanpham){
			$this->db->where('masanpham', $masanpham);
			$this->db->select();
			$this->db->from ('sanpham');
			return $query = $this->db->get ();
		}
		public function insert($data){
			$insert=$this->db->insert('sanpham',$data);
			return $insert;	
		}
		public function updateItem($data,$id){
			$this->db->where('masanpham', $id);
			$update=$this->db->update('sanpham',$data);
			return $update;	
		}
		public function layMaNcc($ma){
			$this->db->where_in('masanpham', $ma);
			$this->db->select('manhacungcap');
			$this->db->from('sanpham');
			return $query = $this->db->get ();
		}

    }
