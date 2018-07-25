<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats animated flipInX">
        <div class="card-body">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-paper text-warning"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">TOTAL PENDAFTAR</p>
                <p class="card-title" id="count-pendaftar">0</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats text-right">
            <button type="button" class="btn btn-outline-default btn-sm btn-round btn-aksi" data-target="pendaftar"><i class="fa fa-eye"></i> View</button>
            <a target="__blank" href="<?= base_url().'ketua/export_daftar/'.$tahun ?>" class="btn btn-outline-default btn-sm btn-round"><i class="fa fa-print"></i> PDF</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats animated flipInY">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-single-02 text-success"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">TOTAL DITERIMA</p>
                <p class="card-title" id="count-diterima">0</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats text-right">
            <button type="button" class="btn btn-outline-default btn-sm btn-round btn-aksi" data-target="diterima"><i class="fa fa-eye"></i> View</button>
            <a target="__blank" href="<?= base_url().'ketua/export_terima/'.$tahun ?>" class="btn btn-outline-default btn-sm btn-round"><i class="fa fa-print"></i> PDF</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats animated flipInX">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-ruler-pencil text-danger"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">TOTAL DITOLAK</p>
                <p class="card-title" id="count-ditolak">0</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats text-right">
            <button type="button" class="btn btn-outline-default btn-sm btn-round btn-aksi" data-target="ditolak"><i class="fa fa-eye"></i> View</button>
            <a target="__blank" href="<?= base_url().'ketua/export_tolak/'.$tahun ?>" class="btn btn-outline-default btn-sm btn-round"><i class="fa fa-print"></i> PDF</a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats animated flipInY">
        <div class="card-body ">
          <div class="row">
            <div class="col-5 col-md-4">
              <div class="icon-big text-center icon-warning">
                <i class="nc-icon nc-shop text-primary"></i>
              </div>
            </div>
            <div class="col-7 col-md-8">
              <div class="numbers">
                <p class="card-category">TOTAL MURID</p>
                <p class="card-title" id="count-murid">0</p>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer ">
          <hr>
          <div class="stats text-right">
            <button type="button" class="btn btn-outline-default btn-sm btn-round btn-aksi" data-target="murid"><i class="fa fa-eye"></i> View</button>
            <a target="__blank" href="<?= base_url().'ketua/export_murid/'.$tahun ?>" class="btn btn-outline-default btn-sm btn-round"><i class="fa fa-print"></i> PDF</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card target animated bounceInUp" id="pendaftar">
    <div class="card-header">
      <h4 class="card-title">Pendaftar</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-striped" id="tb_pendaftar">
          <thead class="text-warning">
            <tr>
              <th>ID Daftar</th>
              <th>Nama</th>
              <th>Jalur</th>
              <th>Nama Wali</th>
              <th>Periode</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card target" id="diterima">
    <div class="card-header">
      <h4 class="card-title">Diterima</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-striped" id="tb_terima">
          <thead class="text-success">
            <tr>
              <th>ID Daftar</th>
              <th>Nama</th>
              <th>Jalur</th>
              <th>Nama Wali</th>
              <th>Periode</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card target" id="ditolak">
    <div class="card-header">
      <h4 class="card-title">Ditolak</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-striped" id="tb_tolak">
          <thead class="text-danger">
            <tr>
              <th>ID Daftar</th>
              <th>Nama</th>
              <th>Jalur</th>
              <th>Nama Wali</th>
              <th>Periode</th>
              <th>Tanggal Daftar</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="card target" id="murid">
    <div class="card-header">
      <h4 class="card-title">Murid</h4>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-striped" id="tb_murid">
          <thead class="text-info">
            <tr>
              <th>NIM</th>
              <th>Nama</th>
              <th>TTL</th>
              <th>Jenis Kelamin</th>
              <th>Kelas</th>
              <th>Tanggal Diterima</th>
            </tr>
          </thead>
          <tbody></tbody>
        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){

      function load_data()
      {
        $.ajax({
          url: '<?= base_url().'ketua/json_laporan/'.$tahun ?>',
          type: 'GET',
          dataType: 'JSON',
          success: function(data){
            var html_pendaftar = '';
            var html_diterima = '';
            var html_ditolak = '';
            var html_murid = '';

            $.each(data.pendaftar, function(k, v){
              html_pendaftar += `<tr>`;
              html_pendaftar += `<td>${v.id_daftar}</td>`;
              html_pendaftar += `<td>${v.nama_murid}</td>`;
              html_pendaftar += `<td>${v.jalur}</td>`;
              html_pendaftar += `<td>${v.nama_wali}</td>`;
              html_pendaftar += `<td>${v.tahun_awal} - ${v.tahun_akhir}</td>`;
              html_pendaftar += `<td>${v.tanggal_daftar}</td>`;
              html_pendaftar += `</tr>`;
            });

            $.each(data.diterima, function(k, v){
              html_diterima += `<tr>`;
              html_diterima += `<td>${v.id_daftar}</td>`;
              html_diterima += `<td>${v.nama_murid}</td>`;
              html_diterima += `<td>${v.jalur}</td>`;
              html_diterima += `<td>${v.nama_wali}</td>`;
              html_diterima += `<td>${v.tahun_awal} - ${v.tahun_akhir}</td>`;
              html_diterima += `<td>${v.tanggal_daftar}</td>`;
              html_diterima += `</tr>`;
            });

            $.each(data.ditolak, function(k, v){
              html_ditolak += `<tr>`;
              html_ditolak += `<td>${v.id_daftar}</td>`;
              html_ditolak += `<td>${v.nama_murid}</td>`;
              html_ditolak += `<td>${v.jalur}</td>`;
              html_ditolak += `<td>${v.nama_wali}</td>`;
              html_ditolak += `<td>${v.tahun_awal} - ${v.tahun_akhir}</td>`;
              html_ditolak += `<td>${v.tanggal_daftar}</td>`;
              html_ditolak += `</tr>`;
            });

            $.each(data.murid, function(k, v){
              html_murid += `<tr>`;
              html_murid += `<td>${v.nim}</td>`;
              html_murid += `<td>${v.nama_murid}</td>`;
              html_murid += `<td>${v.tempat_lahir_murid}, ${v.tgl_lahir_murid}</td>`;
              html_murid += `<td>${v.jenis_kelamin}</td>`;
              html_murid += `<td>${v.nama_kelas}</td>`;
              html_murid += `<td>${v.tanggal_terima}</td>`;
              html_murid += `</tr>`;
            });

            $('#count-pendaftar').text(data.pendaftar.length);
            $('#count-diterima').text(data.diterima.length);
            $('#count-ditolak').text(data.ditolak.length);
            $('#count-murid').text(data.murid.length);
            $('#tb_pendaftar tbody').html(html_pendaftar);
            $('#tb_terima tbody').html(html_diterima);
            $('#tb_tolak tbody').html(html_ditolak);
            $('#tb_murid tbody').html(html_murid);
          }
        });
      }

      load_data();

      $('#murid').hide();
      $('#diterima').hide();
      $('#ditolak').hide();

      $('.btn-aksi').on('click', function(){
        var target = $(this).data('target');
        $('.target').removeClass('bounceInUp').slideUp(function(){
          $('#'+target+'').addClass('animated bounceInUp').show();
        });
      });

    });
  </script>
