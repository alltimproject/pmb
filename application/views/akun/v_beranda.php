<div class="row" id="welcome">
  <div class="col-md-12">
    <div class="alert alert-info alert-with-icon alert-dismissible fade show animated flipInX" data-notify="container">
      <span data-notify="icon" class="fa fa-info"></span>
      <span data-notify="message">
        <b>Hi, <?= $this->session->userdata('nama_wali') ?></b> <br/> Selamat Datang di Website Penerimaan Murid Baru PAUD Mawar 015
      </span>
    </div>

    <div class="card animated slideInRight">
      <div class="card-header"></div>
      <div class="card-body">
        <div id="content-pendaftaran"></div>
      </div>
    </div>
  </div>
</div>

<div class="content-form">
  <form class="form-daftar" enctype="multipart/form-data">
    <h4 class="text-center"><u>Formulir Pendaftaran</u></h4>
    <div class="row">

      <div class="col-md-8">
        <div class="card animated bounceInLeft">
          <div class="card-header"><h4 class="card-title">Data Anak</h4></div>
          <div class="card-body">
            <div class="form-group">
              <label>Nama Murid</label>
              <input type="text" name="nama_murid" id="nama_murid" class="form-control">
            </div>
            <div class="form-group">
              <label>Tempat Lahir</label>
              <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir</label>
              <input type="date" name="tgl_lahir" id="tanggal_lahir" class="form-control">
            </div>
            <div class="form-group">
              <label>Agama</label>
              <select name="agama" id="agama" class="form-control">
                <option value="">-- Pilih Agama --</option>
                <option value="Islam">Islam</option>
                <option value="Protestan">Protestan</option>
                <option value="Katholik">Katholik</option>
                <option value="Budha">Budha</option>
                <option value="Hindu">Hindu</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Kelamin</label>
              <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jalur</label>
              <select name="jalur" id="jalur" class="form-control">
                <option value="">-- Pilih Jalur --</option>
                <option value="Lokal">Lokal</option>
                <option value="Umum">Umum</option>
              </select>
            </div><br/>
            <div class="">
              <label>Pas Foto 4x6</label>
              <input type="file" name="pas_foto" id="pas_foto">
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card animated bounceInRight">
          <div class="card-header"><h4 class="card-title">Data Wali</h4></div>
          <div class="card-body">
            <div class="form-group">
              <label>ID Wali</label>
              <input type="text" name="id_wali" id="id_wali" value="<?= $this->session->userdata('id_wali') ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label>Nama Wali</label>
              <input type="text" name="nama_wali" id="nama_wali" value="<?= $this->session->userdata('nama_wali') ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label>No KTP</label>
              <input type="text" name="no_ktp" id="no_ktp" value="<?= $this->session->userdata('no_ktp') ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="text" name="email" id="email" value="<?= $this->session->userdata('email') ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label>Telepon</label>
              <input type="text" name="telepon" id="telepon" value="<?= $this->session->userdata('telepon') ?>" class="form-control" readonly>
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" id="alamat" class="form-control" rows="8" cols="80" readonly><?= $this->session->userdata('alamat') ?></textarea>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="animated bounceInUp">
          <center>
            <input type="hidden" name="id_persyaratan" id="id_persyaratan">
            <button type="submit" class="btn btn-md btn-info col-md-4" id="submit"> Daftar </button>
            <button type="button" class="btn btn-md btn-default col-md-4" id="batal"> Batal </button>
          </center>
        </div>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    function load_data()
    {
      $.ajax({
        url: '<?= base_url().'akun/json_daftar' ?>',
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
          var html = '';

          if(data.pendaftaran.length > 0)
          {
            $.each(data.pendaftaran, function(k,v){
              var sisa = v.kuota_murid - v.diterima;
              html += `<div class="jumbotron">`;
              html += `<h3>PENDAFTARAN MURID BARU TAHUN AJARAN ${v.tahun_awal} - ${v.tahun_akhir}</h3>`;
              html += `<table>`;
                html += `<tr>`;
                  html += `<td><h6>Periode</h6></td>`;
                  html += `<td><h6>: ${v.tanggal_mulai} s/d ${v.tanggal_akhir}</h6></td>`;
                html += `</tr>`;
                html += `<tr>`;
                  html += `<td>Persyaratan</td>`;
                  html += `<td>: ${v.syarat_pendaftaran}</td>`;
                html += `</tr>`;
                html += `<tr>`;
                  html += `<td>Kuota</td>`;
                  html += `<td>: ${v.kuota_murid} Murid</td>`;
                html += `</tr>`;
              html += `</table>`;
              html += `<button type="button" id="daftar" class="btn btn-danger btn-lg btn-round" data-id_persyaratan="${v.id_persyaratan}">DAFTAR</button><br></br>`;
              html += `<h5 style="float: right">Sisa Kuota : ${sisa}</h5>`;
              html += `</div>`;
            });
          } else {
            html += `<p>Belum ada Pendaftaran yang dibuka...</p>`;
          }
          $('#content-pendaftaran').html(html);
        }
      });
    }

    load_data();
    $('.content-form').hide();

    $(document).on('click', '#daftar', function(){
      $('#id_persyaratan').val($(this).data('id_persyaratan'));
      $('#welcome').hide(function(){
        $('.content-form').show();
      });
    });

    $('#tanggal_lahir').on('change', function(){
      var tgl = $(this).val();
      var tgl_sekarang = new Date();
      var tgl_lahir = new Date(tgl);
      var jam = 24*60*60*1000*365;
      var umur = parseFloat(parseFloat(tgl_sekarang - tgl_lahir)/jam);

      if(umur <= 4)
      {
        toastr.error('Umur tidak memenuhi persyaratan', 'Error');
        $(this).val('');
      } else if(umur >= 5)
      {
        toastr.error('Umur melebihi persyaratan', 'Error');
        $(this).val('');
      } else {
        toastr.success('Umur memenuhi persyaratan', 'Success');
      }

      // alert(umur);

    });

    $('#batal').on('click', function(){
      $('#nama_murid').val('');
      $('#tempat_lahir').val('');
      $('#tanggal_lahir').val('');
      $('#agama').val('');
      $('#jenis_kelamin').val('');
      $('#jalur').val('');
      $('#pas_foto').val('');
      $('.content-form').hide(function(){
        $('#welcome').show();
      });
    });

    $('#pas_foto').change(function() {
        var file = $(this)[0].files[0];
        var type = file.type;
        var name = file.name;
        var match_type = ["image/png", "image/jpeg"];
        if (!((type == match_type[0]) || (type == match_type[1]))) {
            toastr.warning('Format yang diperbolehkan hanya .png atau .jpg', 'Warning');
            $('#pas_foto').val('');
        }
    });

    $('.form-daftar').on('submit', function(){
      var submit = true;

      $(this).find('#nama_murid, #tempat_lahir, #tanggal_lahir, #agama, #jenis_kelamin, #jalur, #pas_foto').each(function(){
        if($(this).val() == ''){
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
            url: '<?= base_url().'akun/add_pendaftaran' ?>',
            type: 'POST',
            data: new FormData(this),
            cache: false,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data == "berhasil") {
                    toastr.success(`File berhasil diupload`, 'Success');
                    $('#nama_murid').val('');
                    $('#tempat_lahir').val('');
                    $('#tanggal_lahir').val('');
                    $('#agama').val('');
                    $('#jenis_kelamin').val('');
                    $('#jalur').val('');
                    $('#pas_foto').val('');
                    $('.content-form').hide(function(){
                      $('#welcome').show();
                    });
                    load_data();
                } else {
                    toastr.error(`File tidak berhasil diupload`, 'Error');
                }
            },
            error: function() {
                toastr.error('Tidak dapat memproses Data', 'Error');
            }
        });
      } else {
        toastr.warning('Silahkan isi formulir dengan lengkap', 'Warning');
      }

      return false;
    });


  });
</script>
