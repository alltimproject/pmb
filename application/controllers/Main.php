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
		$data['title'] = 'Bukti Penerimaan';
		$data['data'] = $this->m_main->show_pendaftaran(null, $where)->result();;
		$html = $this->load->view('akun/v_bukti', $data, TRUE);

		$this->load->library('pdf');
		$pdf = $this->pdf->load();
		$pdf->SetProtection(array('print'));
		$pdf->SetDisplayMode('fullpage');
		$pdf->WriteHTML($html);
		$pdf->Output("Bukti_Penerimaan.pdf" ,'I');
	}



}
