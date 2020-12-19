<?php

class CAdmin extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('ModelGue');
		$this->load->model('ModelData');
    }
    function index(){
		$hasil=$this->ModelGue->semuadata('login');
		$data=array('data'=>$hasil);
		$this->load->view('Admin/ListAdmin',$data);
	}

	function get_T($id){
		
		$data = array('nomor_tabungan'=>$id);
		$hasil = $this->ModelGue->GetWhere('transaksi_tabungan',$data); 

		echo json_encode($hasil);
	}
	function tambahT(){
        $hasil=$this->ModelGue->semuadata('login');
		$nasabah=$this->ModelGue->semuadata('nasabah');
		$data= array('data'=>$hasil,'datanasa'=>$nasabah);
		$this->load->view('Admin/NewAdmin',$data);
	}

	function saveT(){
		// buat validasi data
		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('nasabah','No nasabah','required|trim');
		

		if ($this->form_validation->run() == FALSE) {
			// $hasil=$this->modelsaya->semuadata('barang');
			$hasil=$this->ModelGue->semuadata('login');
			$data= array(
					'data'=>$hasil,
					'pesan'=>validation_errors()
				); 
				
			$this->load->view('Admin/ListAdmin',$data);
			// pesan error
		}else{
			// jika tidak error maka data disimpan
			$user=$this->input->post('username');
			$nasa=$this->input->post('nasabah');
			$mail=$this->input->post('email');
			$dpn= $this->input->post('depan');
            $blkg=$this->input->post('belakang');
            $pas=$this->input->post('Pass');
			$akses=$this->input->post('akses');
			
			// validasi data double
			$x = array('username' =>$user  );
			$cari=$this->ModelGue->GetWhere('login',$x);

			if($cari != null ){
				// $hasil=$this->modelsaya->semuadata('barang');
				$data= array('username'=>$user,'pesan'=>'data Username tidak boleh Sama !');
				$this->load->view('Admin/NewAdmin',$data);
			}else{
				$data = array('username' =>$user ,
				'nomor_nasabah'=>$nasa,
				'email'=>$mail,
				'namadepan'=>$dpn,
				'namabelakang'=>$blkg,
				'PASSWORD'=>md5($pas),
                'hak_akses'=>$akses,
                'active'=>'true');
				
				// simpan data ke tabel 
				$this->ModelGue->insert('login',$data);
				$a=base_url('CAdmin');
				redirect($a);
				// atau memanggil ke index
				// $this->index()
			}
		}
	}
	public function editT($id){
		$where = array('login_id' =>$id );
		$Dt=$this->ModelGue->GetWhere('login',$where);
		$data=array('data'=>$Dt);
		$this->load->view('Admin/EditAdmin',$data );
	}
	function updateT(){
		// $user=$this->input->post('username');
        $nasa=$this->input->post('nasabah');
		$login_id=$this->input->post('loginid');
        $mail=$this->input->post('email');
        $dpn= $this->input->post('depan');
        $blkg=$this->input->post('belakang');
        $pas=$this->input->post('Pass');
        $akses=$this->input->post('akses');

		$data = array('login_id'=>$login_id,'email'=>$mail,'nomor_nasabah'=>$nasa,
		'namadepan'=>$dpn,'namabelakang'=>$blkg,'PASSWORD'=>md5($pas),
		'hak_akses'=>$akses,'active'=>'true');
        // var_dump($data) ;
        // return;
		// simpan data ke tabel jurusan
		$where=array('login_id'=>$login_id);
		$this->ModelGue->update('login',$data,$where);
		$a=base_url('CAdmin');
		redirect($a);
		// atau memanggil ke index
		// $this->barang();
	}
		function deletT($login_id){
		$syarat = array('login_id' => $login_id );
		$this->ModelGue->delete('login',$syarat);
		redirect(base_url('CAdmin'));
	}	
	function get_tabungan($id){
		
		$data = array('nomor_tabungan'=>$id);
		$hasil = $this->ModelGue->GetWhere('transaksi_tabungan',$data); 

		echo json_encode($hasil);
	}
	function autocomp(){
		
		// POST data
		$postData = $this->input->post('term');

		// Get data
		$data = $this->ModelData->get_nasabah($postData);
	
		echo json_encode($data);
   }
	   
	function get_nasabah($id){
				
		$hasil = $this->ModelData->ambil_nasabah($id); 

		echo json_encode($hasil);
	}
    
}

?>