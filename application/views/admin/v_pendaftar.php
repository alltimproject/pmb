<div class="row">
    <div class="col-md-12">
      <div class="card animated fadeInRight">
        <div class="card-body">
          <div class="card-header">
            <div class="row">
              <div class="col-md-8"></div>
              <div class="col-md-4">
                <div class="input-group no-border">
                  <input type="text" class="form-control" placeholder="Cari Nama Pendaftar..." id="cari-pendaftar">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="nc-icon nc-zoom-split"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-hover table-striped" id="tabel-pendaftar">
              <thead class="text-primary">
                <tr>
                  <th>#</th>
                  <th>ID Daftar</th>
                  <th>Nama</th>
                  <th>Jalur</th>
                  <th>Nama Wali</th>
                  <th>Periode</th>
                  <th>Tanggal Daftar</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="modal fade" id="modalVerifikasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel">Verifikasi Penerimaan</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <form class="form-verifikasi">
            <div class="modal-body">
              <div class="form-group">
                <label>Pilih Kelas</label>
                <input type="hidden" name="nama_murid" id="nama_murid">
                <input type="hidden" name="tempat_lahir" id="tempat_lahir">
                <input type="hidden" name="tanggal_lahir" id="tanggal_lahir">
                <input type="hidden" name="jenis_kelamin" id="jenis_kelamin">
                <input type="hidden" name="id_daftar" id="id_daftar">
                <input type="hidden" name="pas_foto" id="pas_foto">
                <select class="form-control" name="id_kelas" id="id_kelas"></select>
              </div>
            </div>
            <div class="modal-footer">
                <div class="left-side">
                    <button type="submit" class="btn btn-info btn-link" id="submit">Verifikasi</button>
                </div>
                <div class="divider"></div>
                <div class="right-side">
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Batal</button>
                </div>
            </div>
          </form>
      </div>
  </div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <center><img src="" class="img-thumbnail img-responsive" alt="Rounded Image" id="detail-foto" style="width: 150px; height: 150px;"></center><br><br>
            <h6>Data Pendaftar</h6>
            <table style="width: 100%">
              <tr>
                <th style="width: 40%">Nama</th>
                <td>:</td>
                <td class="nama"></td>
              </tr>
              <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>:</td>
                <td class="ttl"></td>
              </tr>
              <tr>
                <th>Agama</th>
                <td>:</td>
                <td class="agama"></td>
              </tr>
              <tr>
                <th>Jenis Kelamin</th>
                <td>:</td>
                <td class="jk"></td>
              </tr>
              <tr>
                <th>Jalur</th>
                <td>:</td>
                <td class="jalur"></td>
              </tr>
            </table><br>

            <h6>Data Wali</h6>
            <table style="width: 100%">
              <tr>
                <th style="width: 40%">Nama Wali</th>
                <td>:</td>
                <td class="nama_wali"></td>
              </tr>
              <tr>
                <th>No KTP</th>
                <td>:</td>
                <td class="ktp"></td>
              </tr>
              <tr>
                <th>Email</th>
                <td>:</td>
                <td class="email"></td>
              </tr>
              <tr>
                <th>Telepon</th>
                <td>:</td>
                <td class="tlp"></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>:</td>
                <td class="alamat"></td>
              </tr>
            </table><br>

            <h6>Info Pendaftaran</h6>
            <table style="width: 100%">
              <tr>
                <th style="width: 40%">Tahun Ajaran</th>
                <td>:</td>
                <td class="tahun"></td>
              </tr>
              <tr>
                <th>Keterangan</th>
                <td>:</td>
                <td class="keterangan"></td>
              </tr>
              <tr>
                <th>Tanggal Daftar</th>
                <td>:</td>
                <td class="tgl_daftar"></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
              <div class="right-side">
                  <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Tutup</button>
              </div>
          </div>
      </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function(){

    function load_pendaftar(cari)
    {
      $.ajax({
        url: '<?= base_url().'admin/json_pendaftar' ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {cari: cari},
        success: function(data){
          var html = '';
          var select_kelas = '<option value="">-- Pilih Kelas --</option>';
          var no = 0;

          $.each(data.pendaftar, function(k,v){
            no++
            html += `<tr>`;
            html += `<td>${no}</td>`;
              html += `<td>`;
                html += `<a class="text-info" id="detail" data-tgl_daftar="${v.tanggal_daftar}" data-thn_awal="${v.tahun_awal}" data-thn_akhir="${v.tahun_akhir}" data-keterangan="${v.keterangan}" data-id_daftar="${v.id_daftar}" data-nama_wali="${v.nama_wali}" data-ktp="${v.no_ktp}" data-email="${v.email}" data-telepon="${v.telepon}" data-alamat="${v.alamat}" data-nama="${v.nama_murid}" data-tempat="${v.tempat_lahir}" data-tgl="${v.tgl_lahir}" data-jk="${v.jenis_kelamin}" data-foto="${v.pas_foto}" data-agama="${v.agama}" data-jalur="${v.jalur}"><u>${v.id_daftar}</u></a>`;
              html += `</td>`;
            html += `<td>${v.nama_murid}</td>`;
            html += `<td>${v.jalur}</td>`;
            html += `<td>${v.nama_wali}</td>`;
            html += `<td>${v.tahun_awal} - ${v.tahun_akhir}</td>`;
            html += `<td>${v.tanggal_daftar}</td>`;

            if(v.status == 'Tolak'){
              html += `<td class="text-danger">Ditolak</td>`;
            } else if(v.status == 'Proses') {
              html += `<td>`;
              html += `<button type="button" class="btn btn-sm btn-success btn-aksi" data-id_daftar="${v.id_daftar}" data-email="${v.email}" data-status="Terima" data-nama_murid="${v.nama_murid}" data-nama_wali="${v.nama_wali}">Terima</button> `;
              html += `<button type="button" class="btn btn-sm btn-danger btn-aksi" data-id_daftar="${v.id_daftar}" data-email="${v.email}" data-status="Tolak" data-nama_murid="${v.nama_murid}" data-nama_wali="${v.nama_wali}">Tolak</button>`;
              html += `</td>`;
            } else {
              if(v.nim == null){
                html += `<td>`;
                html += `<button type="button" class="btn btn-sm btn-info" id="verifikasi" data-id_daftar="${v.id_daftar}" data-nama="${v.nama_murid}" data-tempat="${v.tempat_lahir}" data-tgl="${v.tgl_lahir}" data-jk="${v.jenis_kelamin}" data-foto="${v.pas_foto}">Verifikasi</button> `;
                html += `</td>`;
              } else {
                html += `<td class="text-primary">${v.nim} <i class="fa fa-check"></i></td>`;
              }
            }

            html += `</tr>`;
          });

          $.each(data.kelas, function(k, v){
            select_kelas += `<option value="${v.id_kelas}">${v.nama_kelas}</option>`;
          });

          $('#tabel-pendaftar tbody').html(html);
          $('#modalVerifikasi #id_kelas').html(select_kelas);
        }
      });
    }

    load_pendaftar();

    $('#cari-pendaftar').on('keyup', function(){
      if($(this).val() == ''){
        load_pendaftar();
      } else {
        cari = $(this).val();
        load_pendaftar(cari);
      }
    });

    $(document).on('click', '.btn-aksi', function(){
      var id_daftar = $(this).data('id_daftar');
      var status = $(this).data('status');
      var email = $(this).data('email');
      var nama_murid = $(this).data('nama_murid');
      var nama_wali = $(this).data('nama_wali');

      $.ajax({
        url: '<?= base_url().'admin/validasi_proses' ?>',
        type: 'POST',
        data: {id_daftar: id_daftar, status: status, email: email, nama_murid: nama_murid, nama_wali: nama_wali},
        success: function(data){
          if(data == 'berhasil'){
            toastr.success('Berhasil validasi pendaftaran', 'Success');
          } else {
            toastr.error('Gagal validasi pendaftaran', 'Error');
          }
          load_pendaftar();
        }
      });
    });

    $(document).on('click', '#verifikasi', function(){
      $('#nama_murid').val($(this).data('nama'));
      $('#tempat_lahir').val($(this).data('tempat'));
      $('#tanggal_lahir').val($(this).data('tgl'));
      $('#jenis_kelamin').val($(this).data('jk'));
      $('#pas_foto').val($(this).data('foto'));
      $('#id_daftar').val($(this).data('id_daftar'));
      $('#modalVerifikasi').modal('show');
    });

    $(document).on('click', '#detail', function(){
      $('#modalDetail .modal-title').text($(this).data('id_daftar'));
      $('#detail-foto').attr('src', '<?= base_url().'images/pendaftar/' ?>'+$(this).data('foto'));
      $('.nama').text($(this).data('nama'));
      $('.ttl').text($(this).data('tempat')+', '+$(this).data('tgl'));
      $('.agama').text($(this).data('agama'));
      $('.jk').text($(this).data('jk'));
      $('.jalur').text($(this).data('jalur'));

      $('.nama_wali').text($(this).data('nama_wali'));
      $('.ktp').text($(this).data('ktp'));
      $('.email').text($(this).data('email'));
      $('.tlp').text($(this).data('telepon'));
      $('.alamat').text($(this).data('alamat'));

      $('.tahun').text($(this).data('thn_awal')+ ' - '+$(this).data('thn_akhir'));
      $('.keterangan').text($(this).data('keterangan'));
      $('.tgl_daftar').text($(this).data('tgl_daftar'));

      $('#modalDetail').modal('show');
    });

    $('.form-verifikasi').on('submit', function(){
      var submit = true;

      if($('#id_kelas').val() == ''){
        submit = false;
      }

      if(submit == true){
        $.ajax({
          url: '<?= base_url().'admin/add_murid' ?>',
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success('Berhasil menambah Murid', 'Success');
              $('#modalVerifikasi').modal('hide');
              $('.form-verifikasi')[0].reset();
            } else {
              toastr.error('Gagal menambah Murid', 'Error');
            }
            load_pendaftar();
          }
        });
      } else {
        toastr.warning('Silahkan pilih kelas', 'Warning');
      }

      return false;
    });
  });
</script>
