<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{

	var $table = 'student';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

    function checkMail($email){
        $this -> db -> select('email_st');
           $this -> db -> from('student');
           $this -> db -> where('email_st', $email);
           $query = $this -> db -> get();
           return $query->result_array();
    }

	public function get_all()
	{
	$this->db->from($this->table);
	$query=$this->db->get();
	return $query->result();
	}

	public function add($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function delete_id($id)
	{
		$this->db->where('Nim', $id);
		$this->db->delete($this->table);
	}


	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('Nim',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

    public function login($data) {
    $condition = "email_st =" . "'" . $data['username'] . "' AND " . "pwd_st =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('student');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return true;
    } else {
    return false;
    }
    }

    function read_user_information($username) {
    $condition = "email_st =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('student');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return $query->result();
    } else {
    return false;
    }
    }


    public function login_admin($data) {
    $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return true;
    } else {
    return false;
    }
    }

    function read_admin_information($username) {

    $condition = "username =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return $query->result();
    } else {
    return false;
    }
    }


}
