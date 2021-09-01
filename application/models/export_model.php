<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class export_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
			$this->load->database();
        }

		public function checkHdx($mahoadonxuat)
		{
			$this->db->where('mahoadonxuat', $mahoadonxuat);
			$this->db->select();
			$this->db->from ('hoadonxuat');
			return $query = $this->db->get ();
		}
		public function insertHdx($data){
			$insert=$this->db->insert('hoadonxuat',$data);
			return $insert;	
		}
    }
