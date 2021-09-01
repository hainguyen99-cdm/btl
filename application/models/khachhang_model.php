<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
class khachhang_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
    public function getList()
    {
        $this->db->select();
        $this->db->from('khachhang');
        return $query = $this->db->get();
    }
	public function getKH_DH($mahoadonxuat)
	{
		$this->db->where('mahoadonxuat',$mahoadonxuat);
		$this->db->select();
		$this->db->from('khachhang');
		return $query = $this->db->get();
	}
    public function addKhachHang($table, $data)
    {
        $insert=$this->db->insert($table, $data);
        return $insert;
    }
    public function updateKhachHang($data, $id)
    {
        $this->db->where('makhachhang', $id);
        $update=$this->db->update('khachhang', $data);
        return $update;
    }
    public function checkKhachHang($id)
    {
        $this->db->where('makhachhang', $id);
        $this->db->select();
        $this->db->from('khachhang');
        return $query = $this->db->get();
    }
    public function deleteKhachHang($makhachhang)
    {
        $this->db->where('makhachhang', $makhachhang);
        $this->db->delete('khachhang');
        redirect('dskhachhang/dskhachhang/dskhachhang_view', 'refresh');
    }
    public function checkIdKhachHang($id)
    {
        $this->db->where('makhachhang', $id);
        $this->db->select();
        $this->db->from('khachhang');
        return $query = $this->db->get();
    }
    public function checkKH($kh)
    {
        $this->db->where('tenkhachhang', $kh);
        $this->db->select();
        $this->db->from('khachhang');
        return $query = $this->db->get();
    }
	public function checkPhoneNb($sdt)
    {
        $this->db->where('sodienthoai', $sdt);
        $this->db->select();
        $this->db->from('khachhang');
        return $query = $this->db->get();
    }
	public function checkMail($email)
    {
        $this->db->where('email', $email);
        $this->db->select();
        $this->db->from('khachhang');
        return $query = $this->db->get();
    }
}
