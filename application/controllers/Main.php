<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');
  }

	public function index()
	{
		if($this->session->userdata('login_admin') == true)
		{
			redirect('admin/');
		} elseif($this->session->userdata('login_akun') == true)
		{
			redirect('akun/');
		}

		$this->load->view('v_main');
	}

	function home()
	{
		$this->load->view('v_home');
	}

	function login()
	{
		$this->load->view('v_login');
	}

	function register()
	{
		$this->load->view('v_register');
	}

	function admin()
	{
		$this->load->view('v_login_admin');
	}

	function bukti($id_daftar)
	{
		$where = array('a.id_daftar' => $id_daftar);
		$data = $this->m_main->show_pendaftaran(null, $where)->result();;
		// $html = $this->load->view('akun/v_bukti_2');

		$this->load->library('pdf');
		$pdf = new FPDF('P','mm','A4');
		$pdf->AddPage();

		$pdf->Image('images/PAUD2.png',10,10,30,30);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(80);
		$pdf->Cell(30,15,'BKB - PAUD MAWAR 015',0,1,'C');

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(80);
		$pdf->Cell(30,5,'Jl. Gang Pioneer RT. 003 / RW. 015',0,1,'C');
		$pdf->Cell(80);
		$pdf->Cell(30,5,'Kota Administrasi Jakarta Utara 14440',0,1,'C');
		$pdf->Cell(80);
		$pdf->Cell(30,5,'Telp. 0812 8290 3430, 0877 8055 2501',0,1,'C');
		$pdf->ln(5);
		$pdf->Cell(190,0,'',1,0,'C');
		$pdf->ln(5);

		foreach($data as $key){
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(0,15,'Bukti Penerimaan Murid',0,1,'C');
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(0,5,'Nomor : '.$key->id_daftar,0,1,'C');
			$pdf->ln(10);

			$pdf->SetFont('Arial','B',13);
			$pdf->Cell(0,5,'Identitas Murid',0,0);
			$pdf->ln(10);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(50,7,'Nama',0,0);
			$pdf->Cell(50,7,': '.$key->nama_murid,0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'Tempat, Tanggal Lahir',0,0);
			$pdf->Cell(50,7,': '.date('d M Y', strtotime($key->tgl_lahir)),0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'Agama',0,0);
			$pdf->Cell(50,7,': '.$key->agama,0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'Jenis Kelamin',0,0);
			$pdf->Cell(50,7,': '.$key->jenis_kelamin,0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'Jalur',0,0);
			$pdf->Cell(50,7,': '.$key->jalur,0,0);
			$pdf->ln(20);

			$pdf->SetFont('Arial','B',13);
			$pdf->Cell(0,5,'Identitas Wali',0,0);
			$pdf->ln(10);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(50,7,'Nama Wali',0,0);
			$pdf->Cell(50,7,': '.$key->nama_wali,0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'No KTP',0,0);
			$pdf->Cell(50,7,': '.$key->no_ktp,0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'Email',0,0);
			$pdf->Cell(50,7,': '.$key->email,0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'Telepon',0,0);
			$pdf->Cell(50,7,': '.$key->telepon,0,0);
			$pdf->ln(5);
			$pdf->Cell(50,7,'Alamat',0,0);
			$pdf->Cell(50,7,': '.$key->alamat,0,0);
			$pdf->ln(20);

			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(60,7,'Wali Murid',1,0,'C');
			$pdf->Cell(60,7,'Administrasi',1,0,'C');
			$pdf->Cell(60,7,'Kepala PAUD',1,0,'C');
			$pdf->ln();
			$pdf->Cell(60,30,'',1,0,'C');
			$pdf->Cell(60,30,'',1,0,'C');
			$pdf->Cell(60,30,'',1,0,'C');
			$pdf->ln();
			$pdf->Cell(60,7,'('.$key->nama_wali.')',1,0,'C');
			$pdf->Cell(60,7,'( Rico )',1,0,'C');
			$pdf->Cell(60,7,'( Suryatin, S.Pd)',1,0,'C');

		}

		$pdf->Output();

		// $pdf->Output("Bukti_Penerimaan.pdf" ,'I');
	}



}
