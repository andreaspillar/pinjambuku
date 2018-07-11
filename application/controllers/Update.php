<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {


	 public function __construct()
	 	{
	 		parent::__construct();
			$this->load->helper('url');
	 		$this->load->Model('Buku');
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
	
	
	
}
