<div class="row">
  <div class="col-md-12">
    <div class="alert alert-primary alert-with-icon alert-dismissible fade show animated flipInX" data-notify="container">
      <span data-notify="icon" class="nc-icon nc-bell-55"></span>
      <span data-notify="message">
          <table>
            <tr>
              <td style="width: 2%" valign="top">-</td>
              <td>Kami akan memberikan informasi penerimaan melalui email yang anda gunakan untuk Login</td>
            </tr>
            <tr>
              <td valign="top">-</td>
              <td>Apabila email tidak diterima. Silahkan cek kolom "Status" pada tabel pendaftaran. Jika pendaftaran diterima, maka akan muncul tombol <b>"Print"</b></td>
            </tr>
            <tr>
              <td valign="top">-</td>
              <td>Cetak Bukti Penerimaan, lalu segera kunjungi PAUD Mawar 015 untuk melakukan Verifikasi dengan membawa Bukti Penerimaan, KTP, KK dan Akta Kelahiran.</td>
            </tr>
          </table>
      </span>
    </div>
    <div class="card animated fadeIn">
      <div class="card-header"></div>
      <div class="card-body">
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

    function load_pendaftar()
    {
      $.ajax({
        url: '<?= base_url().'akun/json_pendaftar' ?>',
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
          var html = '';
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
              html += `<td class="text-info">Menunggu Konfirmasi <i class="fa fa-clock-o"></i></td>`;
            } else {
              if(v.nim == null){
                html += `<td>`;
                html += `<a href="<?= base_url().'main/bukti/' ?>${v.id_daftar}" target="_blank" class="btn btn-sm btn-default">Print <i class="fa fa-print"></i></button> `;
                html += `</td>`;
              } else {
                html += `<td class="text-primary">${v.nim} <i class="fa fa-check"></i></td>`;
              }
            }

            html += `</tr>`;
          });

          $('#tabel-pendaftar tbody').html(html);
        }
      });
    }

    load_pendaftar();

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


  });
</script>
