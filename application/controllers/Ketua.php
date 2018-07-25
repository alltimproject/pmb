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
		$data['title'] = 'Data Pendaftar';
    $data['header'] = 'Data Pendaftar';
		$data['data'] = $this->m_main->show_pendaftaran(null, $where)->result();
    $data['jumlah'] = $this->m_main->show_pendaftaran(null, $where)->num_rows();
		$html = $this->load->view('ketua/v_export', $data, TRUE);

		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetProtection(array('print'));
		$pdf->SetDisplayMode('fullpage');
		$pdf->WriteHTML($html);
		$pdf->Output("Data_Pendaftar_$id_tahun.pdf" ,'I');
  }

  function export_terima($id_tahun)
  {
    $where = array(
      'a.status' => 'Terima',
      'd.id_tahun_ajar' => $id_tahun
    );
		$data['title'] = 'Data Pendaftar Diterima';
    $data['header'] = 'Data Pendaftar Diterima';
		$data['data'] = $this->m_main->show_pendaftaran(null, $where)->result();
    $data['jumlah'] = $this->m_main->show_pendaftaran(null, $where)->num_rows();
		$html = $this->load->view('ketua/v_export', $data, TRUE);

		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetProtection(array('print'));
		$pdf->SetDisplayMode('fullpage');
		$pdf->WriteHTML($html);
		$pdf->Output("Data_Diterima_$id_tahun.pdf" ,'I');
  }

  function export_tolak($id_tahun)
  {
    $where = array(
      'a.status' => 'Tolak',
      'd.id_tahun_ajar' => $id_tahun
    );
		$data['title'] = 'Data Pendaftar Ditolak';
    $data['header'] = 'Data Pendaftar Ditolak';
		$data['data'] = $this->m_main->show_pendaftaran(null, $where)->result();
    $data['jumlah'] = $this->m_main->show_pendaftaran(null, $where)->num_rows();
		$html = $this->load->view('ketua/v_export', $data, TRUE);

		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetProtection(array('print'));
		$pdf->SetDisplayMode('fullpage');
		$pdf->WriteHTML($html);
		$pdf->Output("Data_Ditolak_$id_tahun.pdf" ,'I');
  }

  function export_murid($id_tahun)
  {
    $where = array(
      'e.id_tahun_ajar' => $id_tahun
    );
		$data['title'] = 'Data Murid';
		$data['data'] = $this->m_main->show_lapmurid($where)->result();
    $data['jumlah'] = $this->m_main->show_lapmurid($where)->num_rows();
		$html = $this->load->view('ketua/v_exmurid', $data, TRUE);

		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetProtection(array('print'));
		$pdf->SetDisplayMode('fullpage');
		$pdf->WriteHTML($html);
		$pdf->Output("Data_Murid_$id_tahun.pdf" ,'I');
  }





}

?>
