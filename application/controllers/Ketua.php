<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketua extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');

    if($this->session->userdata('login_admin') != true)
    {
      redirect('main');
    }
  }

  function index()
  {
    $this->load->view('ketua/v_main');
  }

  function dashboard()
  {
    $this->load->view('ketua/v_dashboard');
  }

  function detail($id_tahun)
  {
    $data['tahun'] = $id_tahun;
    $this->load->view('ketua/v_detail', $data);
  }


  function json_tahun()
  {
    $data['tahun'] = $this->m_main->show_tahun()->result();
    echo json_encode($data);
  }

  function json_laporan($id_tahun)
  {
    $where1= array(
      'd.id_tahun_ajar' => $id_tahun
    );
    $data['pendaftar'] = $this->m_main->show_pendaftaran(null, $where1)->result();

    $where2 = array(
      'a.status' => 'Terima',
      'd.id_tahun_ajar' => $id_tahun
    );
    $data['diterima'] = $this->m_main->show_pendaftaran(null, $where2)->result();

    $where3 = array(
      'a.status' => 'Tolak',
      'd.id_tahun_ajar' => $id_tahun
    );
    $data['ditolak'] = $this->m_main->show_pendaftaran(null, $where3)->result();

    $where4 = array(
      'e.id_tahun_ajar' => $id_tahun
    );
    $data['murid'] = $this->m_main->show_lapmurid($where4)->result();

    echo json_encode($data);
  }

  function export_daftar($id_tahun)
  {
    $where = array(
      'd.id_tahun_ajar' => $id_tahun
    );

		$data = $this->m_main->show_pendaftaran(null, $where);

    $this->load->library('pdf');
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();

		$pdf->Image('images/PAUD2.png',10,10,30,30);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(120);
		$pdf->Cell(30,15,'BKB - PAUD MAWAR 015',0,1,'C');

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Jl. Gang Pioneer RT. 003 / RW. 015',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Kota Administrasi Jakarta Utara 14440',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Telp. 0812 8290 3430, 0877 8055 2501',0,1,'C');
		$pdf->ln(5);
		$pdf->Cell(280,0,'',1,0,'C');
		$pdf->ln(5);

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(0,5,'Data Pendaftar',0,0);
    $pdf->ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(45,7,'ID Daftar',1,0,'C');
    $pdf->Cell(45,7,'Nama',1,0,'C');
    $pdf->Cell(45,7,'Jalur',1,0,'C');
    $pdf->Cell(45,7,'Nama Wali',1,0,'C');
    $pdf->Cell(45,7,'Periode',1,0,'C');
    $pdf->Cell(45,7,'Tanggal Daftar',1,0,'C');

    foreach($data->result() as $key){
      $pdf->SetFont('Arial','',10);
      $pdf->ln();
      $pdf->Cell(45,7,$key->id_daftar,1,0,'C');
      $pdf->Cell(45,7,$key->nama_murid,1,0,'C');
      $pdf->Cell(45,7,$key->jalur,1,0,'C');
      $pdf->Cell(45,7,$key->nama_wali,1,0,'C');
      $pdf->Cell(45,7,$key->tahun_awal.'-'.$key->tahun_akhir,1,0,'C');
      $pdf->Cell(45,7,date('d M Y H:i:s', strtotime($key->tanggal_daftar)),1,0,'C');
    }

    $pdf->ln(20);
    $pdf->Cell(230);
    $pdf->Cell(40, 7, 'Jumlah Pendaftar : '.$data->num_rows(),0,0);

    $pdf->Output();

  }

  function export_terima($id_tahun)
  {
    $where = array(
      'a.status' => 'Terima',
      'd.id_tahun_ajar' => $id_tahun
    );

		$data = $this->m_main->show_pendaftaran(null, $where);

    $this->load->library('pdf');
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();

		$pdf->Image('images/PAUD2.png',10,10,30,30);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(120);
		$pdf->Cell(30,15,'BKB - PAUD MAWAR 015',0,1,'C');

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Jl. Gang Pioneer RT. 003 / RW. 015',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Kota Administrasi Jakarta Utara 14440',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Telp. 0812 8290 3430, 0877 8055 2501',0,1,'C');
		$pdf->ln(5);
		$pdf->Cell(280,0,'',1,0,'C');
		$pdf->ln(5);

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(0,5,'Data Pendaftar Diterima',0,0);
    $pdf->ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(45,7,'ID Daftar',1,0,'C');
    $pdf->Cell(45,7,'Nama',1,0,'C');
    $pdf->Cell(45,7,'Jalur',1,0,'C');
    $pdf->Cell(45,7,'Nama Wali',1,0,'C');
    $pdf->Cell(45,7,'Periode',1,0,'C');
    $pdf->Cell(45,7,'Tanggal Daftar',1,0,'C');

    foreach($data->result() as $key){
      $pdf->SetFont('Arial','',10);
      $pdf->ln();
      $pdf->Cell(45,7,$key->id_daftar,1,0,'C');
      $pdf->Cell(45,7,$key->nama_murid,1,0,'C');
      $pdf->Cell(45,7,$key->jalur,1,0,'C');
      $pdf->Cell(45,7,$key->nama_wali,1,0,'C');
      $pdf->Cell(45,7,$key->tahun_awal.'-'.$key->tahun_akhir,1,0,'C');
      $pdf->Cell(45,7,date('d M Y H:i:s', strtotime($key->tanggal_daftar)),1,0,'C');
    }

    $pdf->ln(20);
    $pdf->Cell(230);
    $pdf->Cell(40, 7, 'Jumlah Diterima : '.$data->num_rows(),0,0);

    $pdf->Output();
  }

  function export_tolak($id_tahun)
  {
    $where = array(
      'a.status' => 'Tolak',
      'd.id_tahun_ajar' => $id_tahun
    );
		$data = $this->m_main->show_pendaftaran(null, $where);

    $this->load->library('pdf');
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();

		$pdf->Image('images/PAUD2.png',10,10,30,30);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(120);
		$pdf->Cell(30,15,'BKB - PAUD MAWAR 015',0,1,'C');

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Jl. Gang Pioneer RT. 003 / RW. 015',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Kota Administrasi Jakarta Utara 14440',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Telp. 0812 8290 3430, 0877 8055 2501',0,1,'C');
		$pdf->ln(5);
		$pdf->Cell(280,0,'',1,0,'C');
		$pdf->ln(5);

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(0,5,'Data Pendaftar Ditolak',0,0);
    $pdf->ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(45,7,'ID Daftar',1,0,'C');
    $pdf->Cell(45,7,'Nama',1,0,'C');
    $pdf->Cell(45,7,'Jalur',1,0,'C');
    $pdf->Cell(45,7,'Nama Wali',1,0,'C');
    $pdf->Cell(45,7,'Periode',1,0,'C');
    $pdf->Cell(45,7,'Tanggal Daftar',1,0,'C');

    foreach($data->result() as $key){
      $pdf->SetFont('Arial','',10);
      $pdf->ln();
      $pdf->Cell(45,7,$key->id_daftar,1,0,'C');
      $pdf->Cell(45,7,$key->nama_murid,1,0,'C');
      $pdf->Cell(45,7,$key->jalur,1,0,'C');
      $pdf->Cell(45,7,$key->nama_wali,1,0,'C');
      $pdf->Cell(45,7,$key->tahun_awal.'-'.$key->tahun_akhir,1,0,'C');
      $pdf->Cell(45,7,date('d M Y H:i:s', strtotime($key->tanggal_daftar)),1,0,'C');
    }

    $pdf->ln(20);
    $pdf->Cell(230);
    $pdf->Cell(40, 7, 'Jumlah Ditolak : '.$data->num_rows(),0,0);

    $pdf->Output();
  }

  function export_murid($id_tahun)
  {
    $where = array(
      'e.id_tahun_ajar' => $id_tahun
    );
		$data = $this->m_main->show_lapmurid($where);

    $this->load->library('pdf');
		$pdf = new FPDF('L','mm','A4');
		$pdf->AddPage();

		$pdf->Image('images/PAUD2.png',10,10,30,30);
		$pdf->SetFont('Arial','B',18);
		$pdf->Cell(120);
		$pdf->Cell(30,15,'BKB - PAUD MAWAR 015',0,1,'C');

		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Jl. Gang Pioneer RT. 003 / RW. 015',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Kota Administrasi Jakarta Utara 14440',0,1,'C');
		$pdf->Cell(120);
		$pdf->Cell(30,5,'Telp. 0812 8290 3430, 0877 8055 2501',0,1,'C');
		$pdf->ln(5);
		$pdf->Cell(280,0,'',1,0,'C');
		$pdf->ln(5);

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(0,5,'Data Murid',0,0);
    $pdf->ln(10);
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(45,7,'NIM',1,0,'C');
    $pdf->Cell(45,7,'Nama',1,0,'C');
    $pdf->Cell(45,7,'TTL',1,0,'C');
    $pdf->Cell(45,7,'Jenis Kelamin',1,0,'C');
    $pdf->Cell(45,7,'Kelas',1,0,'C');
    $pdf->Cell(45,7,'Tanggal Diterima',1,0,'C');

    foreach($data->result() as $key){
      $pdf->SetFont('Arial','',10);
      $pdf->ln();
      $pdf->Cell(45,7,$key->nim,1,0,'C');
      $pdf->Cell(45,7,$key->nama_murid,1,0,'C');
      $pdf->Cell(45,7,$key->tempat_lahir_murid.', '.$key->tgl_lahir_murid,1,0,'C');
      $pdf->Cell(45,7,$key->jenis_kelamin,1,0,'C');
      $pdf->Cell(45,7,$key->nama_kelas,1,0,'C');
      $pdf->Cell(45,7,date('d M Y H:i:s', strtotime($key->tanggal_terima)),1,0,'C');
    }

    $pdf->ln(20);
    $pdf->Cell(230);
    $pdf->Cell(40, 7, 'Jumlah Murid : '.$data->num_rows(),0,0);

    $pdf->Output();
  }





}

?>
