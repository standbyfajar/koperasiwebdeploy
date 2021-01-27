<?php

class CPeminjaman extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('form','url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('ModelGue');
		$this->load->model('ModelData');
		$this->load->library('Mylibrary');
		$this->load->library('Fpdf');

	}

	function index(){
		
		$hasil=$this->ModelGue->semuadata('peminjaman');
		$data=array('datakar'=>$hasil);
		$this->load->view('Peminjaman/ListPeminjaman',$data);
	}
	function autocomp(){
		
		 // POST data
		 $postData = $this->input->post('term');

		 // Get data
		 $data = $this->ModelData->get_auto($postData);
	 
		 echo json_encode($data);
	}

    function get_P($id){
		
		$hasil = $this->ModelData->datastat($id); 

		echo json_encode($hasil);
	}
	function tambahP(){
		if (!isset($this->session->hd)) 
		{
			$no= $this->ModelData->get_notrans();
			// $notransbaru= "TR".date('Y-m-d').sprintf("%03s",$no->transaksi+1);
			$n=$no->nota+1;
			// echo $n;
			$transnew="TR".date('y-m-d').substr('0000'.$n,-4,4);

			$dtsession=array('noPM'=>$transnew,'tanggal'=>date('y-m-d'),'nik'=>'');
			$this->session->set_userdata($dtsession);

			$this->session->set_userdata('hd',0);

		}
		// $idp=$this->session->noPP;
		$ses=array('hd'=>0,
					'noPM'=>'',
					'tanggal'=>'',
					'nik'=>'');
		$this->session->unset_userdata($ses);
		$nota=$this->session->noPP;
		$PP=$this->ModelData->data_PP();
		$this->ModelData->updatenota($nota);
		$this->session->unset_userdata('hd',0);

		$hasil=$this->ModelGue->semuadata('peminjaman');
		$data=array('datakar'=>$hasil,'datapp'=>$PP);

		$this->load->view('Peminjaman/NewPeminjaman',$data);
	}

	function saveP(){
		// buat validasi data
		$this->form_validation->set_rules('no_pengajuan','No pengajuan','required|trim');
		$this->form_validation->set_rules('nominal','nominal','required|trim');

		if ($this->form_validation->run() == FALSE) {
			// $hasil=$this->modelsaya->semuadata('barang');
			$hasil=$this->ModelGue->semuadata('peminjaman');
			$data= array(
					'datakar'=>$hasil,
					'pesan'=>validation_errors()
				); 
				
			$this->load->view('Peminjaman/ListPeminjaman',$data);
			// pesan error
		}else{
			// jika tidak error maka data disimpan
			$peng=$this->input->post('no_pengajuan');
			$tgl=$this->input->post('tgl');
			$trans= $this->input->post('nomor');
			$nasa=$this->input->post('nasa');
			$nominal=$this->input->post('nominal');
			$cicil=$this->input->post('cicil');
			$bunga=$this->input->post('bunga');
			$cicil_bulan=$this->input->post('cicil_bulan');
			$ket=$this->input->post('ket');
			
			// validasi data double
			$x = array('nomor_pinjam' =>$trans  );
			$cari=$this->ModelGue->GetWhere('peminjaman',$x);

			if($cari != null){
				$data= array('nomor_pinjam'=>$kod,'pesan'=>'data pinjam tidak boleh Sama');
				$this->load->view('Peminjaman/NewPeminjaman',$data);
			}else{
				$data = array('nomor_pengajuan' =>$peng ,
				'tanggal_transaksi'=>$tgl,
				'nomor_pinjam'=>$trans,
				'nomor_nasabah'=>$nasa,
				'nominal'=>$nominal,
				'cicilan'=>$cicil,
				'bunga'=>$bunga,
				'kredit_bulan'=>$cicil_bulan,
				'keterangan'=>$ket);
				
				// simpan data ke tabel 
				$this->ModelGue->insert('peminjaman',$data);
				// var_dump($data);
				$a=base_url('CPeminjaman');
				redirect($a);
				// atau memanggil ke index
				// $this->index()
			}
		}
	}

	function delete_detil($id_pinjam)

		{
			
			$where=array('nomor_pengajuan'=>$id_pinjam);
			
			$dat=$this->ModelGue->GetWhere('peminjaman',$where);

			// ini script ngapus dateta detail
			$this->ModelGue->delete('peminjaman',$where);

			$this->session->set_userdata('pesan','Data Pengajuan peminjam sudah dihapus');
			redirect(base_url().'CPeminjaman');
		}

	public function Cetak_form($nota){
			$this->session->set_userdata('muncul',true);
	
			$where=array('nomor_pinjam'=>$nota);
			$datadetil=$this->ModelData->cetak_peminjaman($nota);	
			$this->load->library('fpdf');
			$pdf= new FPDF('P','mm','A4');
			$pdf->AddPage();
			// judul baris 1
			$pdf->SetFont('Arial','B',14);
			$title="Form Peminjaman";
			$pdf->SetTitle($title);
			$pdf->SetAuthor('Fajar karunia');
			// cell(width,height,text,border,endline, align)
				// $this->base_url('koperasi.jpg', 1, 0.7, 3.8); // logo
				$pdf->Image('koperasi.jpg',5,5,-400);
				$pdf->Cell(200,4,'Form Transaksi Peminjaman  ',0,1,'C');
				$pdf->Cell(200,10,' Koperasi Sahabat Mandiri ',0,1,'C');
				// $pdf->Cell(205,4,'Jln Pintu Air Utara ',0,1,'C');

			$pdf->Ln();	
			$pdf->SetFont('Arial','',11);	
			// cell(width,height,text,border,endline, align)
			// $pdf->Cell(8,8,'',1,0,'C');
				$pdf->Cell(95,8,'No Transaksi ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->nomor_pinjam,0,1,'C');

				$pdf->Cell(95,8,'Tanggal ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->tanggal_transaksi,0,1,'C');

				$pdf->Cell(95,8,'Nasabah ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->nama_nasabah,0,1,'C');

				$pdf->Cell(95,8,'nominal ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->nominal,0,1,'C');

				$pdf->Cell(95,8,'Cicilan ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->cicilan,0,0,'C');
				$pdf->Cell(-28,8," x",0,1,'C');

				$pdf->Cell(95,8,'jasa Pinjaman ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->bunga,0,0,'C');
				

				$pdf->Cell(95,8,'Setoran tiap bulan ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->kredit_bulan,0,1,'C');

				$pdf->Cell(95,8,'Keterangan ',0,0,'C');
				$pdf->Cell(5,8,':',0,0,'C');
				$pdf->Cell(45,8,$datadetil->keterangan,0,1,'C');

			$pdf->Ln();
				$pdf->SetLineWidth(0.5);
				$pdf->Line(20, 25, 190, 25);

			$pdf->Ln();
				//menentukan tebal
				$pdf->SetLineWidth(0.5);
				
				//menentukan titik awal dan titik akhir garis yang akan di buat (x1,y1,x2,y2)
				$pdf->Ln();
				$pdf->Cell(300,5,'Prepared By,',0,1,'C');
				$pdf->Line(85, 145, 35, 145); 
				// $pdf->Cell(300,70,'',1,0,'R');
				// $pdf->Cell(60,70,$datadetil->nama_nasabah,0,0,'R');  //nama
				$pdf->Cell(60,70,'( Nasabah )',0,0,'R');  //nama 
				$pdf->Line(135, 145, 175, 145); 
				$pdf->Cell(95,70,'( Ketua )',0,1,'R');  //nama 

				// $pdf->Line(85, 125, 125, 125); 

			$pdf->Output();

		}


}

?>