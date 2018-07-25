<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>

      #invoice_body
      {
          height: auto;
      }

      #invoice_body , #invoice_total
      {
          width:100%;
      }
      #invoice_body table , #invoice_total table
      {
          width:100%;
          border-left: 1px solid #ccc;
          border-top: 1px solid #ccc;

          border-spacing:0;
          border-collapse: collapse;

          margin-top:5mm;
      }

      #invoice_body table td , #invoice_total table td
      {
          text-align:center;
          font-size:8pt;
          border-right: 1px solid black;
          border-bottom: 1px solid black;
          padding:2mm 0;
      }

      #invoice_body table td.mono  , #invoice_total table td.mono
      {
          text-align:right;
          padding-right:3mm;
          font-size:8pt;
      }

    </style>
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

    <h3>Data Murid</h3>

    <div id="invoice_body">
      <table border="1">
        <tr>
          <td>NIM</td>
          <td>Nama</td>
          <td>TTL</td>
          <td>Jenis Kelamin</td>
          <td>Tanggal Terima</td>
          <td>Kelas</td>
        </tr>

        <?php foreach ($data as $key): ?>
          <tr>
            <td><?= $key->nim ?></td>
            <td><?= $key->nama_murid ?></td>
            <td><?= $key->tempat_lahir_murid ?>, <?= $key->tgl_lahir_murid ?></td>
            <td><?= $key->jenis_kelamin ?></td>
            <td><?= date('d M Y H:i:s', strtotime($key->tanggal_terima)) ?></td>
            <td><?= $key->nama_kelas ?></td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>


  </body>
</html>
