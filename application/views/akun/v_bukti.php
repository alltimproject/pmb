<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Bukti Penerimaan</title>
  </head>
  <body>
    <table width="100%">
      <tr>
        <td style="width: 12%;">
          <img src="<?= base_url().'images/PAUD2.png' ?>" style="width: 150px; height: 120px;">
        </td>
        <td style="width: 3%;"></td>
        <td style="width: 85%;">
          <h3>PENDIDIKAN ANAK USIA DINI<br>BKB - PAUD MAWAR 015</h3>
          <p>Jl. Gang Pioneer RT. 003 / RW. 015<br>
          Kota Administrasi Jakarta Utara 14440<br>
          Telp. 0812 8290 3430, 0877 8055 2501</p>
        </td>
      </tr>
    </table>

    <hr style="height: 5px; margin-bottom: 0px;">
    <hr style="margin-top: 2px;">



    <?php foreach($data as $key): ?>

      <h3 style="text-align: center"><u>Bukti Penerimaan Murid</u></h3>
      <h5 style="text-align: center"><i>Nomer : <?= $key->id_daftar ?></i></h5>

    <div style="margin-left: 50px;">
      <h4>Identitas Murid</h4>
      <table style="width: 70%">
        <tr>
          <td style="width: 45%">Nama</td>
          <td style="width: 5%">:</td>
          <td style="width: 50%"><?= $key->nama_murid ?></td>
        </tr>
        <tr>
          <td>Tempat, Tanggal Lahir</td>
          <td>:</td>
          <td><?= $key->tempat_lahir ?>, <?= date('d M Y', strtotime($key->tgl_lahir)) ?></td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
          <td><?= $key->agama ?></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>:</td>
          <td><?= $key->jenis_kelamin ?></td>
        </tr>
        <tr>
          <td>Jalur</td>
          <td>:</td>
          <td><?= $key->jalur ?></td>
        </tr>
      </table>

      <h4>Identitas Wali</h4>
      <table style="width: 70%">
        <tr>
          <td style="width: 45%">Nama Wali</td>
          <td style="width: 5%">:</td>
          <td style="width: 50%"><?= $key->nama_wali ?></td>
        </tr>
        <tr>
          <td>No KTP</td>
          <td>:</td>
          <td><?= $key->no_ktp ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?= $key->email ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><?= $key->telepon ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $key->alamat ?></td>
        </tr>
      </table>

      <h4>Informasi Pendaftaran</h4>
      <table style="width: 70%">
        <tr>
          <td style="width: 45%">Tahun Ajaran</td>
          <td style="width: 5%">:</td>
          <td style="width: 50%"><?= $key->tahun_awal ?> - <?= $key->tahun_akhir ?></td>
        </tr>
        <tr>
          <td>Keterangan</td>
          <td>:</td>
          <td><?= $key->keterangan ?></td>
        </tr>
        <tr>
          <td>Tanggal Daftar</td>
          <td>:</td>
          <td><?= date('d M Y H:i:s', strtotime($key->tanggal_daftar)) ?></td>
        </tr>
      </table><br><br><br>
    </div>

    <table style="width: 100%">
      <tr>
        <th style="width: 30%">Wali Murid</th>
        <th style="width: 5%"></th>
        <th style="width: 30%">Administrasi</th>
        <th style="width: 5%"></th>
        <th style="width: 30%">Kepala PAUD</th>
      </tr>
    </table>
    <br><br><br><br><br>
    <table style="width: 100%">
      <tr>
        <th style="width: 30%">( <?= $key->nama_wali ?> )</th>
        <th style="width: 5%"></th>
        <th style="width: 30%">( Rico )</th>
        <th style="width: 5%"></th>
        <th style="width: 30%">( Suryatin, S.Pd )</th>
      </tr>
    </table>


  <?php endforeach ?>



  </body>
</html>
