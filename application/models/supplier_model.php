<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class supplier_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

		
		function getList(){
			$this->db->select();
			$this->db->from ('nhacungcap');
			return $query = $this->db->get ();
		}
		function getName($tennhacungcap){
			$this->db->where('tennhacungcap', $tennhacungcap);
			$this->db->select();
			$this->db->from ('nhacungcap');
			return $query = $this->db->get ();
		}
	}
