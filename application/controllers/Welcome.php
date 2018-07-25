<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->Model('Model');
            $this->load->Model('Buku');
            $this->load->Model('Peminjaman');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
	 	}
	public function index()
	{
		$this->load->view('frontpage');
	}
	public function add()
	{
        $data = $_POST;
        $email = $data['email_st'];
        $result = $this->Model->checkMail($email);
        if(empty($result))
        {
            $email_st =$this->input->post('email_st');
            $pwd_st =md5 ($this->input->post('pwd_st'));
            $data = array
                (
					'email_st'   =>$email_st,
					'pwd_st'   => $pwd_st,

				);
			$insert= $this->Model->add($data);
            redirect('Welcome/login');
        }
        else
        {
            $msg = "Username is Already Exists";
        }
        $this->session->set_flashdata('msg', $msg);
        redirect('Welcome/signup');
	}
	function signup(){
        $this->load->view('signup');
    }
    function login(){
        $this->load->helper(array('form'));
        $this->load->view('login');
    }
    function login_admin(){
        $this->load->helper(array('form'));
        $this->load->view('login-admin');
    }
    function verify() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() != FALSE) {
        if(isset($this->session->userdata['logged_in'])){
        $this->load->view('home-mhs');
        }else{
        $this->load->view('login');
        }
        } else {
        $data = array(
        'username' => $this->input->post('username'),
        'password' => md5($this->input->post('password'))
        );
        $result = $this->Model->login($data);
        if ($result == TRUE) {
        $username = $this->input->post('username');
        $result = $this->Model->read_user_information($username);
        if ($result != false) {
        $session_data = array(
        'username' => $result[0]->email_st,
        'password' => $result[0]->pwd_st,
        );
        // Add user data in session
        $this->session->set_userdata('logged_in', $session_data);
        $this->load->view('home-mhs');
        }
        } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $data = array(
        'error_message' => 'Invalid Username or Password'
        );
        $this->load->view('login', $data);
        }
        }
        }
    public function board(){
        $data['buku']=$this->Buku->viewbook();
        $this->load->view('board-mhs',$data);
    }
    function verify_admin() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
        if ($this->form_validation->run() != FALSE) {
        if(isset($this->session->userdata['logged_in'])){
        $data['buku']=$this->Buku->viewbook();
        $this->load->view('home-admin',$data);
        }else{
        $this->load->view('login-admin');
        }
        } else {
        $data = array(
        'username' => $this->input->post('username'),
        'password' => $this->input->post('password')
        );
        $result = $this->Model->login_admin($data);
        if ($result == TRUE) {
        $username = $this->input->post('username');
        $result = $this->Model->read_admin_information($username);
        if ($result != false) {
        $session_data = array(
        'username' => $result[0]->username,
        'password' => $result[0]->password,
        );
        // Add user data in session
        $this->session->set_userdata('logged_in', $session_data);
        $data['buku']=$this->Buku->viewbook();
        $this->load->view('home-admin',$data);
        }
        } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        $data = array(
        'error_message' => 'Invalid Username or Password'
        );
        $this->load->view('login-admin', $data);
        }
        }
        }
        public function hom_admin() {
        $data['buku']=$this->Buku->viewbook();
        $this->load->view('home-admin',$data);
        }
        public function admin_bor() {
        $data['lst']=$this->Peminjaman->get_prop_adm();
        $this->load->view('admin-borrow',$data);
        }
        public function add_buku() {
        $this->load->view('view-add');
        }
        public function addbuk() {
        $ISBN =$this->input->post('ISBN');
				$judul_buku =$this->input->post('judul_buku');
        $pengarang =$this->input->post('pengarang');
        $penerbit =$this->input->post('penerbit');
        $jenis =$this->input->post('jenis');
				$result = $this->Buku->checkCreate($ISBN,$judul_buku);
				if($ISBN != null && $judul_buku != null && $pengarang != null && $penerbit != null && $jenis != null){
					if(!empty($result)){
						$message = "Similar data on table.\\nTry again.";
			      echo "<script type='text/javascript'>

						alert('$message');
						</script>";
			      $this->load->view('view-add');
					}
					else{
					$data = array
				(
					'ISBN'   =>$ISBN,
					'judul_buku'   => $judul_buku,
          'pengarang'   => $pengarang,
          'penerbit'   => $penerbit,
          'jenis'   => $jenis,
				);
				$insert= $this->Buku->add($data);
          redirect('Welcome/hom_admin');}
				}
				else {
				$message = "Has one or more without field.\\nTry again.";
	      echo "<script type='text/javascript'>

				alert('$message');
				</script>";
	      $this->load->view('view-add', $data);
				}
        }
        public function directtoborrow() {
        $ISBN =$this->input->post('ISBN');
				$judul_buku =$this->input->post('judul_buku');
        $pengarang =$this->input->post('pengarang');
        $penerbit =$this->input->post('penerbit');
        $jenis =$this->input->post('jenis');

            $data = array
				(
					'ISBN'   =>$ISBN,
					'judul_buku'   => $judul_buku,
                    'pengarang'   => $pengarang,
                    'penerbit'   => $penerbit,
                    'jenis'   => $jenis,

				);
			$insert= $this->Buku->add($data);
            redirect('Welcome/admin_bor');
        }
        public function addpinjam() {
        $ISBN = $this->input->post('ISBN');
        $email = $this->session->userdata['logged_in']['username'];
        $timestamp_a = date("Y-m-d H:i:s", strtotime('+1 day'));
        $timestamp_b = date("Y-m-d H:i:s", strtotime('+8 days'));
        $data = array
				(
					'ISBN'   =>$ISBN,
                    'email_st'  =>$email,
                    'tgl_pinjam' =>$timestamp_a,
                    'tgl_kembali' =>$timestamp_b,
				);
				$insert= $this->Peminjaman->add($data);
            redirect('Welcome/board');
        }
        public function borrow($id) {
        $data['buku']=$this->Buku->get_all();
        $data['buku']=$this->Buku->get_by_id($id);
        $this->load->view('view-borrow',$data);
        }
        public function borrowed() {
        $email_st=$this->session->userdata['logged_in']['username'];
        $data['peminjaman']=$this->Peminjaman->get_all_prop($email_st);
        $this->load->view('borrowed-view',$data);
        }
        public function bringback($no)
        {
        $this->Peminjaman->delete_id($no);
        redirect('Welcome/borrowed');
        }
        public function logout() {
        // Removing session data
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('welcome', 'refresh');
        }
        public function gets($id)
        {
            $data['buku']=$this->Buku->get_all();
            $data['buku']=$this->Buku->get_by_id($id);
            $this->load->view('view-update',$data);
        }
        public function update()
        {
            $ISBN =$this->input->post('ISBN');
            $judul_buku =$this->input->post('judul_buku');
            $pengarang =$this->input->post('pengarang');
            $penerbit =$this->input->post('penerbit');
            $jenis =$this->input->post('jenis');

                $data = array
                    (
                        'ISBN'   =>$ISBN,
                        'judul_buku'   =>$judul_buku,
                        'pengarang'   =>$pengarang,
                        'penerbit'   =>$penerbit,
                        'jenis'   =>$jenis,
                    );
                $this->Buku->update(array('ISBN' =>$ISBN), $data);
                redirect('Welcome/hom_admin');

        }
        public function delete_($no)
        {
        $this->Buku->delete_id($no);
        redirect('Welcome/hom_admin');
        }
        public function search_keyword(){
        $keyword    =   $this->input->post('keyword');
        $data['buku']    =   $this->Buku->search($keyword);
        $this->load->view('board-mhs',$data);
        }
				public function resetpwd()
				{
				$this->load->view('user_reset');
				}
				public function sendmail()
				{
					$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
					if ($this->form_validation->run() != FALSE) {
	        } else {
	        $data = $this->input->post('username');
	        $result = $this->Model->read_user_information($data);
	        if ($result == TRUE) {
					$from='From: NoReply Web <wewew66@gmail.com>';
	        $to = $this->input->post('username');
    			$subject='PHP mail() Test';
    			$body='This is a test message sent with the PHP mail function!';
					if(mail($to,$subject,$body,$from)==TRUE){
					$message = "Success!";
		      echo "<script type='text/javascript'>alert('$message');</script>";
			        $this->load->view('login');
			    } else {
			        echo 'E-mail delivery failure!';
			    }
	        }
	        }
				}
}
