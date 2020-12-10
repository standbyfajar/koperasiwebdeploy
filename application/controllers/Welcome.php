<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if(empty($this->session->userdata('userlogin'))){
			redirect('CLogin');
		}
		$qr= $this->db->query("select sum(nominal)as total from transaksi_tabungan")->row();
		$angka= $this->rupiah($qr->total);
		$data= array("data1"=>$angka);

		$this->load->view('Template',$data);
		
	}
	function rupiah ($angka) {
		$hasil = 'Rp ' . number_format($angka, 0, ",", ".");
		return $hasil;
	  }
}
