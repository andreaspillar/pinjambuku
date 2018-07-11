<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Model{

	var $table = 'peminjaman';


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

//	public function viewbook()
//	{
//    $query = $this->db->select('*')->from('buku')->get();
//    return $query->result();
//	}

	public function add($data)
	{
//        $this->db->where('ISBN', $id);
		$this->db->insert($this->table, $data);
		return $this->db->insert_id($id);
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

      function get_all_prop($email_st) {

    $this->db->select ( 'peminjaman.ISBN, buku.judul_buku, buku.pengarang, peminjaman.tgl_pinjam, peminjaman.tgl_kembali' );
    $this->db->from ( 'peminjaman' );
    $this->db->join ( 'buku', 'buku.ISBN = peminjaman.ISBN' , 'left' );
    $this->db->where ('email_st', $email_st);
    $query = $this->db->get ();
    return $query->result ();
      }

    function get_prop_adm(){
        $this->db->select ( 'peminjaman.ISBN, buku.judul_buku, buku.pengarang, peminjaman.email_st, peminjaman.tgl_pinjam, peminjaman.tgl_kembali' );
        $this->db->from ( 'peminjaman' );
        $this->db->join ( 'buku', 'buku.ISBN = peminjaman.ISBN' , 'left' );
//        $this->db->join ( 'student', 'student.email_st = peminjaman.email_st' , 'inner' );
        $query = $this->db->get ();
        return $query->result ();
    }

}
