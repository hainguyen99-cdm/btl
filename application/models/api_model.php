<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class api_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }


		public function fetch_all(){
			$this->db->order_by('id','DESC');
			return $query = $this->db->get ('nhanvien');
		}
	}
