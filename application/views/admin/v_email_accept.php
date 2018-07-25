<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" content="text/html">
    <title></title>
  </head>
  <body>
    <h3>Hi, <?= $nama_wali ?></h3>
    <p>Selamat!!! Murid atas nama <b><?= $nama_murid ?></b> sudah diterima di PAUD MAWAR 015.</p>
    <p>Segera kunjungi PAUD MAWAR 015 untuk melakukan Verifikasi dengan membawa Persyaratan sebagai berikut : </p>
    <ul>
      <li>Bukti Penerimaan</li>
      <li>KTP Wali</li>
      <li>Kartu Keluarga</li>
      <li>Akta Kelahiran</li>
    </ul>

    <p>Klik link <a target="_blank" href="<?= base_url().'main/bukti/'.$id_daftar ?>"><?= base_url().'main/bukti/'.$id_daftar ?></a> untuk mencetak Bukti Penerimaan.</p><br/><br/>

    <p> Warm Regards </p>
    <p>PAUD MAWAR 015</p>

  </body>
</html>
