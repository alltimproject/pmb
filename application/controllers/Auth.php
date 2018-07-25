<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_main');
  }

  function registrasi()
  {
    $id_wali = $this->m_main->buatKode('tb_wali_murid', 'WL', 'id_wali', '5');
    $nama_wali = $this->input->post('nama_wali');
    $no_ktp = $this->input->post('no_ktp');
    $email = $this->input->post('email');
    $password = md5($this->input->post('password'));
    $telepon = $this->input->post('telepon');
    $alamat = $this->input->post('alamat');

    $data = array(
      'id_wali' => $id_wali,
      'nama_wali' => $nama_wali,
      'no_ktp' => $no_ktp,
      'email' => $email,
      'password' => $password,
      'telepon' => $telepon,
      'alamat' => $alamat
    );

    $cek = $this->m_main->add_data('tb_wali_murid', $data);
    if($cek){
      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function login_akun()
  {
    $where = array(
      'email' => $this->input->post('email'),
      'password' => md5($this->input->post('password'))
    );

    $cek = $this->m_main->select('tb_wali_murid', $where);
    if($cek->num_rows() == 1)
    {
      foreach($cek->result() as $key)
      {
        $id_wali = $key->id_wali;
        $nama_wali = $key->nama_wali;
        $email = $key->email;
        $ktp = $key->no_ktp;
        $tlp = $key->telepon;
        $alamat = $key->alamat;
      }

      $session = array(
        'id_wali' => $id_wali,
        'nama_wali' => $nama_wali,
        'email' => $email,
        'telepon' => $tlp,
        'no_ktp' => $ktp,
        'alamat' => $alamat,
        'login_akun' => true
      );
      $this->session->set_userdata($session);

      echo "berhasil";
    } else {
      echo "gagal";
    }
  }

  function login_admin()
  {
    $where = array(
      'email' => $this->input->post('email'),
      'password' => md5($this->input->post('password'))
    );

    $cek = $this->m_main->select('tb_user', $where);
    if($cek->num_rows() == 1)
    {
      foreach($cek->result() as $key)
      {
        $id_user = $key->id_user;
        $nama = $key->nama;
        $email = $key->email;
        $level = $key->level;
      }

      $session = array(
        'id_user' => $id_user,
        'nama' => $nama,
        'email' => $email,
        'level' => $level,
        'login_admin' => true
      );
      $this->session->set_userdata($session);

      echo $level;
    } else {
      echo "gagal";
    }
  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url().'');
  }


}

?>
