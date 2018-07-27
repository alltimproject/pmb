<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
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

  /* ----------------------- Load Content ------------------------- */
  function index()
  {
    $this->load->view('admin/v_main');
  }

  function dashboard()
  {
    $this->load->view('admin/v_dashboard');
  }

  function wali()
  {
    $this->load->view('admin/v_wali');
  }

  function pendaftar()
  {
    $this->load->view('admin/v_pendaftar');
  }

  function murid()
  {
    $this->load->view('admin/v_murid');
  }

  function kelas()
  {
    $this->load->view('admin/v_kelas');
  }

  /* --------------------- AJAX REST API --------------------------- */
  function json_wali()
  {
    $cari = $this->input->post('cari');

    if(isset($cari)){
      $like = $cari;
    } else {
      $like = null;
    }

    $data['wali'] = $this->m_main->show_wali($like)->result();
    echo json_encode($data);
  }

  function json_kelas()
  {
    $cari = $this->input->post('cari');

    if(isset($cari)){
      $like = $cari;
    } else {
      $like = null;
    }

    $data['kelas'] = $this->m_main->show_kelas($like)->result();
    echo json_encode($data);
  }

  function json_dashboard()
  {
    $data['jumlah_wali'] = $this->m_main->show_wali()->num_rows();
    $data['jumlah_kelas'] = $this->m_main->show_kelas()->num_rows();
    $data['jumlah_pendaftar'] = $this->m_main->show_pendaftaran()->num_rows();
    $data['jumlah_murid'] = $this->m_main->show_murid()->num_rows();

    echo json_encode($data);
  }

  function json_pendaftaran()
  {
    $data['persyaratan'] = $this->m_main->show_persyaratan()->result();
    $data['tahun'] = $this->m_main->show_tahun()->result();

    echo json_encode($data);
  }

  function json_pendaftar()
  {
    $cari = $this->input->post('cari');

    if(isset($cari)){
      $like = $cari;
    } else {
      $like = null;
    }

    $data['pendaftar'] = $this->m_main->show_pendaftaran($like, null)->result();
    $data['kelas'] = $this->m_main->show_kelas(null)->result();
    echo json_encode($data);
  }

  function json_murid()
  {
    $cari = $this->input->post('cari');

    if(isset($cari)){
      $like = $cari;
    } else {
      $like = null;
    }

    $data['murid'] = $this->m_main->show_murid($like)->result();
    echo json_encode($data);
  }


  /* --------------------- AJAX RESPONSE ----------------------- */
  function add_tahun()
  {
    $tahun = 'TA'.date('Y').'-';

    $data = array(
      'id_tahun_ajar' => $this->m_main->buatKode('tb_tahun_ajaran', $tahun, 'id_tahun_ajar', '1'),
      'tahun_awal' => $this->input->post('tahun_awal'),
      'tahun_akhir' => $this->input->post('tahun_akhir')
    );

    $cek = $this->m_main->add_data('tb_tahun_ajaran', $data);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function update_tahun()
  {
    $where = array(
      'id_tahun_ajar' => $this->input->post('id_tahun_ajar')
    );

    $data = array(
      'tahun_awal' => $this->input->post('tahun_awal'),
      'tahun_akhir' => $this->input->post('tahun_akhir')
    );

    $cek = $this->m_main->edit_data('tb_tahun_ajaran', $data, $where);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function add_pendaftaran()
  {
    $gelombang = 'GL'.date('y');

    $data = array(
      'id_persyaratan' => $this->m_main->buatKode('tb_persyaratan', $gelombang, 'id_persyaratan', '2'),
      'keterangan' => $this->input->post('keterangan'),
      'syarat_pendaftaran' => $this->input->post('syarat_pendaftaran'),
      'tanggal_mulai' => $this->input->post('tanggal_mulai'),
      'tanggal_akhir' => $this->input->post('tanggal_akhir'),
      'kuota_murid' => $this->input->post('kuota_murid'),
      'id_tahun_ajar' => $this->input->post('id_tahun_ajar')
    );

    $cek = $this->m_main->add_data('tb_persyaratan', $data);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function update_pendaftaran()
  {
    $where = array(
      'id_persyaratan' => $this->input->post('id_persyaratan')
    );

    $data = array(
      'keterangan' => $this->input->post('keterangan'),
      'syarat_pendaftaran' => $this->input->post('syarat_pendaftaran'),
      'tanggal_mulai' => $this->input->post('tanggal_mulai'),
      'tanggal_akhir' => $this->input->post('tanggal_akhir'),
      'kuota_murid' => $this->input->post('kuota_murid'),
      'id_tahun_ajar' => $this->input->post('id_tahun_ajar')
    );

    $cek = $this->m_main->edit_data('tb_persyaratan', $data, $where);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function add_kelas()
  {
    $data = array(
      'id_kelas' => $this->m_main->buatKode('tb_kelas', 'K', 'id_kelas', '2'),
      'nama_kelas' => $this->input->post('nama_kelas'),
      'keterangan_waktu' => $this->input->post('keterangan_waktu')
    );

    $cek = $this->m_main->add_data('tb_kelas', $data);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function update_kelas()
  {
    $where = array(
      'id_kelas' => $this->input->post('id_kelas')
    );

    $data = array(
      'nama_kelas' => $this->input->post('nama_kelas'),
      'keterangan_waktu' => $this->input->post('keterangan_waktu')
    );

    $cek = $this->m_main->edit_data('tb_kelas', $data, $where);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function validasi_proses()
  {
    $id_daftar = $this->input->post('id_daftar');
    $status = $this->input->post('status');
    $email = $this->input->post('email');

    $maildata['id_daftar'] = $this->input->post('id_daftar');
    $maildata['nama_wali'] = $this->input->post('nama_wali');
    $maildata['nama_murid'] = $this->input->post('nama_murid');

    if($status == 'Terima'){
      $message = $this->load->view('admin/v_email_accept', $maildata,  TRUE);
    } else {
      $message = $this->load->view('admin/v_email_reject', $maildata,  TRUE);
    }


    $config = [
          'useragent' => 'CodeIgniter',
          'protocol'  => 'smtp',
          'mailpath'  => '/usr/sbin/sendmail',
          'smtp_host' => 'ssl://smtp.gmail.com',
          'smtp_user' => 'mawarpaud15@gmail.com',   // Ganti dengan email gmail Anda.
          'smtp_pass' => 'paudmawar015',             // Password gmail Anda.
          'smtp_port' => 465,
          'smtp_keepalive' => TRUE,
          'smtp_crypto' => 'SSL',
          'wordwrap'  => TRUE,
          'wrapchars' => 80,
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'validate'  => TRUE,
          'crlf'      => "\r\n",
          'newline'   => "\r\n",
      ];
    $config['mailtype'] = 'html';

    $this->email->initialize($config);
    $this->email->from('mawarpaud15@gmail.com','PAUD MAWAR 015');
    $this->email->to($email);
    $this->email->subject('Hasil Penerimaan Murid PAUD 015');
    $this->email->message($message);

    $where = array(
      'id_daftar' => $id_daftar
    );

    $data = array(
      'status' => $status
    );

    $cek = $this->m_main->edit_data('tb_pendaftaran', $data, $where);
    if($cek){
      echo "berhasil";
      $this->email->send();
    } else {
      echo "gagal";
    }

  }

  function add_murid()
  {
    $tahun = 'MR'.date('Y');
    $data = array(
      'nim' => $this->m_main->buatKode('tb_murid', $tahun, 'nim', '3'),
      'nama_murid' => $this->input->post('nama_murid'),
      'tempat_lahir_murid' => $this->input->post('tempat_lahir'),
      'tgl_lahir_murid' => $this->input->post('tanggal_lahir'),
      'jenis_kelamin' => $this->input->post('jenis_kelamin'),
      'foto_murid' => $this->input->post('pas_foto'),
      'id_daftar' => $this->input->post('id_daftar'),
      'id_kelas' => $this->input->post('id_kelas')
    );

    $cek = $this->m_main->add_data('tb_murid', $data);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }




}

?>
