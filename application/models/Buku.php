<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Model{

	var $table = 'buku';


	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

    public function get_all()
	{
	$this->db->from($this->table);
	$query=$this->db->get();
	return $query->result();
	}

	public function viewbook()
	{
//	$this->db->from($this->table);
//	$query=$this->db->get();
//	return $query->result();
    $query = $this->db->select('*')->from('buku')->get();
    return $query->result();
	}
	function checkCreate($ISBN,$judul_buku){
			$this -> db -> select('*');
			$this -> db -> from('buku');
			$this -> db -> where('ISBN', $ISBN);
			$this -> db -> or_where('judul_buku', $judul_buku);
			$query = $this -> db -> get();
			return $query->result_array();
	}
	public function add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function delete_id($id)
	{
		$this->db->where('ISBN', $id);
		$this->db->delete($this->table);
	}


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('ISBN',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

    function search($keyword)
    {
        $this->db->like('judul_buku',$keyword);
        $this->db->or_like('ISBN',$keyword);
        $this->db->or_like('pengarang',$keyword);
        $this->db->or_like('penerbit',$keyword);
        $this->db->or_like('jenis',$keyword);
        $query  =   $this->db->select('*')->from('buku')->get();
        return $query->result();
    }
}
