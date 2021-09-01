<?php

    if (!defined('BASEPATH'))
        exit('No direct script access allowed');

    class login_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
			$this->load->database();
        }

        public function CheckLogin($taikhoan,$matkhau)
        {
            $this->db->where('taikhoan', $taikhoan);
			$this->db->where('matkhau', $matkhau);
			$this->db->select();
			$this->db->from ('taikhoan');
			return $query = $this->db->get ();
        }
    }
