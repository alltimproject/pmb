<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');

    if($this->session->userdata('login_akun') != true)
    {
      redirect('main');
    }
  }

  function index()
  {
    $this->load->view('akun/v_main');
  }

  function beranda()
  {
    $this->load->view('akun/v_beranda');
  }

  function pengumuman()
  {
    $this->load->view('akun/v_pengumuman');
  }

  function json_pendaftar()
  {
    $where = array(
      'b.id_wali' => $this->session->userdata('id_wali')
    );

    $data['pendaftar'] = $this->m_main->show_pendaftaran(null, $where)->result();
    echo json_encode($data);
  }

  function json_daftar()
  {
    $data['pendaftaran'] = $this->m_main->show_pendaftar_murid()->result();
    echo json_encode($data);
  }

  function add_pendaftaran()
  {
    $tahun = 'PD'.date('Y');
    $id_daftar = $this->m_main->buatKode('tb_pendaftaran', $tahun, 'id_daftar', '3');
    $upload = $this->m_main->upload($id_daftar);

    if($upload['result'] == "success"){

      $data = array(
        'id_daftar' => $id_daftar,
        'nama_murid' => $this->input->post('nama_murid'),
        'tempat_lahir' => $this->input->post('tempat_lahir'),
        'tgl_lahir' => $this->input->post('tgl_lahir'),
        'agama' => $this->input->post('agama'),
        'jenis_kelamin' => $this->input->post('jenis_kelamin'),
        'pas_foto' => $upload['file']['file_name'],
        'jalur' => $this->input->post('jalur'),
        'id_wali' => $this->input->post('id_wali'),
        'id_persyaratan' => $this->input->post('id_persyaratan'),
        'status' => 'Proses'
      );

      $cek = $this->m_main->add_data('tb_pendaftaran', $data);
      if($cek){
        echo "berhasil";
      } else {
        echo "gagal";
      }
    } else {
      echo "gagal upload";
    }
  }

}

?>
