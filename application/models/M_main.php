<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class M_main extends CI_Model
  {

    function buatKode($tabel, $inisial, $field, $panjang)
    {
      $sql = "SELECT MAX(RIGHT(".$field.", ".$panjang.")) as kd_max FROM $tabel";
      $q = $this->db->query($sql);

      if($q->num_rows() > 0){
        foreach ($q->result() as $key) {
          $tmp = ((int)$key->kd_max)+1;
          $kd = sprintf("%0".$panjang."s", $tmp);
        }
      } else {
        $kd = sprintf("%0".$panjang."s", $tmp);
      }

      $new_kode = $inisial.$kd;
      return $new_kode;
    }

    function select($table, $where)
    {
      return $this->db->get_where($table, $where);
    }

    function add_data($table, $data)
    {
      return $this->db->insert($table, $data);
    }

    function edit_data($table, $data, $where)
    {
      $this->db->where($where);
      return $this->db->update($table, $data);
    }

    function show_wali($like = null)
    {
      $this->db->select('*');
      $this->db->from('tb_wali_murid');

      if($like != null){
        $this->db->like('nama_wali', $like);
      }

      $this->db->order_by('tgl_registrasi', 'DESC');
      return $this->db->get();
    }

    function show_kelas($like = null)
    {
      $this->db->select('*');
      $this->db->from('tb_kelas');

      if($like != null){
        $this->db->like('id_kelas', $like);
        // $this->db->like('id_kelas', $like);
      }

      return $this->db->get();
    }

    function show_tahun()
    {
      $this->db->select('*');
      $this->db->from('tb_tahun_ajaran');

      return $this->db->get();
    }

    function show_persyaratan()
    {
      $this->db->select('*');
      $this->db->from('tb_persyaratan');
      $this->db->join('tb_tahun_ajaran', 'tb_tahun_ajaran.id_tahun_ajar = tb_persyaratan.id_tahun_ajar', 'left');

      return $this->db->get();
    }

    function show_pendaftaran($like = null, $where = null)
    {
      $this->db->select('a.*, b.*, c.*, d.*, e.nim');
      $this->db->from('tb_pendaftaran a');
      $this->db->join('tb_wali_murid b', 'b.id_wali = a.id_wali', 'left');
      $this->db->join('tb_persyaratan c', 'c.id_persyaratan = a.id_persyaratan', 'left');
      $this->db->join('tb_tahun_ajaran d', 'd.id_tahun_ajar = c.id_tahun_ajar', 'left');
      $this->db->join('tb_murid e', 'e.id_daftar = a.id_daftar', 'left');

      if($like != null){
        $this->db->like('a.nama_murid', $like);
      }

      if($where != null){
        $this->db->where($where);
      }

      $this->db->order_by('a.id_daftar', 'DESC');
      return $this->db->get();
    }

    function show_murid($like = null)
    {
      $this->db->select('*');
      $this->db->from('tb_murid');
      $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_murid.id_kelas', 'left');

      if($like != null){
        $this->db->like('nama_murid', $like);
      }

      return $this->db->get();
    }

    function show_lapmurid($where)
    {
      $this->db->select('*');
      $this->db->from('tb_murid a');
      $this->db->join('tb_kelas b', 'b.id_kelas = a.id_kelas', 'left');
      $this->db->join('tb_pendaftaran c', 'c.id_daftar = a.id_daftar', 'left');
      $this->db->join('tb_persyaratan d', 'd.id_persyaratan = c.id_persyaratan', 'left');
      $this->db->join('tb_tahun_ajaran e', 'e.id_tahun_ajar = d.id_tahun_ajar', 'left');

      $this->db->where($where);
      return $this->db->get();
    }

    function show_pendaftar_murid()
    {
      $this->db->select('*');
      $this->db->select('(select count(nim) from tb_murid, tb_pendaftaran, tb_persyaratan where tb_murid.id_daftar = tb_pendaftaran.id_daftar and tb_pendaftaran.id_persyaratan = tb_persyaratan.id_persyaratan) as diterima');
      $this->db->from("tb_persyaratan a");
      $this->db->join('tb_tahun_ajaran b', 'b.id_tahun_ajar = a.id_tahun_ajar', 'left');
      $this->db->where('tanggal_mulai <= NOW() AND tanggal_akhir >= NOW()');

      return $this->db->get();
    }

    function upload($id)
		{
			$nama_file = 'foto_'.$id;
			$config['upload_path']   = './images/pendaftar/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']      = '3048';
			$config['remove_space']  = TRUE;
			$config['file_name'] = $nama_file;

			$this->load->library('upload', $config);

			if($this->upload->do_upload('pas_foto') ){
			     $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			     return $return;
			} else {
      		$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
		  		return $return;
			}
		}


  }

?>
