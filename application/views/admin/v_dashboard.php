<div class="row" id="welcome">
  <div class="col-md-12">
    <div class="alert alert-info alert-with-icon alert-dismissible fade show animated slideInRight" data-notify="container">
      <span data-notify="icon" class="fa fa-info"></span>
      <span data-notify="message">
        <b>Selamat datang, <?= $this->session->userdata('nama') ?></b> <br/> Anda login sebagai <?= $this->session->userdata('level') ?>
      </span>
    </div>
  </div>
</div>

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
                      <p class="card-category">PENDAFTAR</p>
                      <p class="card-title" id="count-pendaftar">0</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="#pendaftar" class="text-warning"><i class="fa fa-eye"></i> View Detail</a>
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
                      <p class="card-category">AKUN WALI</p>
                      <p class="card-title" id="count-wali">0</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="#wali" class="text-success"><i class="fa fa-eye"></i> View Detail</a>
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
                      <p class="card-category">MURID</p>
                      <p class="card-title" id="count-murid">0</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="#murid" class="text-danger"><i class="fa fa-eye"></i> View Detail</a>
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
                      <p class="card-category">KELAS</p>
                      <p class="card-title" id="count-kelas">0</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <a href="#kelas"><i class="fa fa-eye"></i> View Detail</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-8">
            <div class="card animated fadeIn">
              <div class="card-header">
                <h6 class="card-title">Pendaftaran</h6>
              </div>
              <div class="card-body">
                <table class="table table-hover table-striped" id="tabel-pendaftaran" style="font-size: 13px;">
                  <thead class="text-warning">
                    <th>Periode</th>
                    <th>Keterangan</th>
                    <th>Syarat</th>
                    <th>Tanggal</th>
                    <th>Kuota</th>
                    <th>
                      <button type="button" class="btn btn-sm btn-outline-info btn-round btn-icon" id="add-pendaftaran">
                        +
                      </button>
                  </th>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card animated fadeIn">
              <div class="card-header">
                <h6 class="card-title"> Tahun Ajaran</h6>
              </div>
              <div class="card-body">
                <table class="table table-hover table-striped" id="tabel-tahun">
                  <thead class="text-warning">
                    <th style="width: 90%">Periode</th>
                    <th style="width: 10%">
                      <button type="button" class="btn btn-sm btn-outline-info btn-round btn-icon" id="add-tahun">
                        +
                      </button>
                    </th>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="modal-tahun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="form-tahun">
                      <div class="modal-body">
                        <div class="form-group">
                          <label>Tahun Awal</label>
                          <input type="hidden" name="id_tahun_ajar" id="id_tahun_ajar">
                          <input type="text" name="tahun_awal" class="form-control" id="tahun_awal" maxlength="4">
                        </div>
                        <div class="form-group">
                          <label>Tahun Akhir</label>
                          <input type="text" name="tahun_akhir" class="form-control" id="tahun_akhir" maxlength="4">
                        </div>
                      </div>
                      <div class="modal-footer">
                          <div class="left-side">
                              <button type="submit" class="btn btn-info btn-link" id="submit"></button>
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

          <div class="modal fade" id="modal-pendaftaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form class="form-pendaftaran">
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                          </div>
                          <div class="form-group">
                            <label>Syarat Pendaftaran</label>
                            <input type="hidden" name="id_persyaratan" id="id_persyaratan">
                            <textarea name="syarat_pendaftaran" id="syarat_pendaftaran" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Mulai</label>
                            <input type="date" name="tanggal_mulai" class="form-control" id="tanggal_mulai">
                          </div>
                          <div class="form-group">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir">
                          </div>
                          <div class="form-group">
                            <label>Kuota</label>
                            <input type="number" name="kuota_murid" class="form-control" id="kuota_murid">
                          </div>
                          <div class="form-group">
                            <label>Tahun Ajaran</label>
                            <select class="form-control" name="id_tahun_ajar" id="select"></select>
                          </div>
                        </div>
                        <div class="modal-footer">
                            <div class="left-side">
                                <button type="submit" class="btn btn-info btn-link" id="submit"></button>
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

<script type="text/javascript">
  $(document).ready(function(){
    var save_method;
    var save_type;

    function load_dashboard()
    {
      $.ajax({
        url: '<?= base_url().'admin/json_dashboard' ?>',
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
          $('#count-wali').text(data.jumlah_wali);
          $('#count-kelas').text(data.jumlah_kelas);
          $('#count-pendaftar').text(data.jumlah_pendaftar);
          $('#count-murid').text(data.jumlah_murid);
        }
      });
    }

    function load_pendaftaran(cari)
    {
      $.ajax({
        url: '<?= base_url().'admin/json_pendaftaran' ?>',
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
          var html_tahun = '';
          var html_daftar = '';
          var select_tahun = '<option value="">-- Pilih Tahun --</option>';

          $.each(data.tahun, function(k, v){
            html_tahun += `<tr>`;
            html_tahun += `<td>${v.tahun_awal} - ${v.tahun_akhir}</td>`;
            html_tahun += `<td><button type="button" id="edit-tahun" class="btn btn-sm btn-outline-success btn-round btn-icon" data-id_tahun="${v.id_tahun_ajar}" data-tahun_awal="${v.tahun_awal}" data-tahun_akhir="${v.tahun_akhir}"><i class="fa fa-pencil"></i></button></td>`;
            html_tahun += `</tr>`;

            select_tahun += `<option value="${v.id_tahun_ajar}">${v.tahun_awal} - ${v.tahun_akhir}</option>`;
          });

          $.each(data.persyaratan, function(k1, v1){
            html_daftar += `<tr>`;
            html_daftar += `<td>${v1.tahun_awal} - ${v1.tahun_akhir}</td>`;
            html_daftar += `<td>${v1.keterangan}</td>`;
            html_daftar += `<td>${v1.syarat_pendaftaran}</td>`;
            html_daftar += `<td>${v1.tanggal_mulai} s/d ${v1.tanggal_akhir}</td>`;
            html_daftar += `<td>${v1.kuota_murid}</td>`;
            html_daftar += `<td><button type="button" id="edit-pendaftaran" class="btn btn-sm btn-outline-success btn-round btn-icon" data-id_persyaratan="${v1.id_persyaratan}" data-syarat="${v1.syarat_pendaftaran}" data-tanggal_mulai="${v1.tanggal_mulai}" data-tanggal_akhir="${v1.tanggal_akhir}" data-kuota="${v1.kuota_murid}" data-id_tahun="${v1.id_tahun_ajar}" data-keterangan="${v1.keterangan}"><i class="fa fa-pencil"></i></button></td>`;
            html_daftar += `</tr>`;
          });

          $('#tabel-tahun tbody').html(html_tahun);
          $('#tabel-pendaftaran tbody').html(html_daftar);
          $('.form-pendaftaran #select').html(select_tahun);
        }
      });
    }

    load_dashboard();
    load_pendaftaran();

    $('#add-tahun').on('click', function(){
      save_method = 'simpan';
      $('.form-tahun')[0].reset();
      $('#modal-tahun .modal-title').text('Tambah Tahun Ajaran');
      $('#modal-tahun #submit').text('Simpan');
      $('#modal-tahun').modal('show');
    });

    $(document).on('click', '#edit-tahun', function(){
      save_method = 'update';

      $('#id_tahun_ajar').val($(this).attr('data-id_tahun'));
      $('#tahun_awal').val($(this).attr('data-tahun_awal'));
      $('#tahun_akhir').val($(this).attr('data-tahun_akhir'));

      $('#modal-tahun .modal-title').text('Update Tahun Ajaran');
      $('#modal-tahun #submit').text('Update');
      $('#modal-tahun').modal('show');
    });

    $('#add-pendaftaran').on('click', function(){
      save_method = 'simpan';
      $('.form-pendaftaran')[0].reset();
      $('#modal-pendaftaran .modal-title').text('Tambah Pendaftaran');
      $('#modal-pendaftaran #submit').text('Simpan');
      $('#modal-pendaftaran').modal('show');
    });

    $(document).on('click', '#edit-pendaftaran', function(){
      save_method = 'update';

      $('#id_persyaratan').val($(this).attr('data-id_persyaratan'));
      $('#syarat_pendaftaran').val($(this).attr('data-syarat'));
      $('#tanggal_mulai').val($(this).attr('data-tanggal_mulai'));
      $('#tanggal_akhir').val($(this).attr('data-tanggal_akhir'));
      $('#kuota_murid').val($(this).attr('data-kuota'));
      $('#keterangan').val($(this).attr('data-keterangan'));
      $('#select').val($(this).attr('data-id_tahun'));

      $('#modal-pendaftaran .modal-title').text('Update Pendaftaran');
      $('#modal-pendaftaran #submit').text('Update');
      $('#modal-pendaftaran').modal('show');
    });

    $('.form-tahun').on('submit', function(){
      var submit = true;

      if(save_method == 'simpan'){
        var link = '<?= base_url().'admin/add_tahun' ?>';
      } else {
        var link = '<?= base_url().'admin/update_tahun' ?>';
      }

      $(this).find('#tahun_awal, #tahun_awal').each(function(){
        if($(this).val() == ''){
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
          url: link,
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Tahun Ajaran baru berhasil di${save_method}`, 'Success');
              $('#modal-tahun').modal('hide');
              load_pendaftaran();
            } else {
              toastr.error(`Tahun Ajaran baru gagal di${save_method}`, 'Error');
            }
          }
        });

      } else {
        toastr.warning(`Field tidak boleh kosong`, 'Warning');
      }

      return false;
    });


    $('.form-pendaftaran').on('submit', function(){
      var submit = true;

      if(save_method == 'simpan'){
        var link = '<?= base_url().'admin/add_pendaftaran' ?>';
      } else {
        var link = '<?= base_url().'admin/update_pendaftaran' ?>';
      }

      $(this).find('#syarat_pendaftaran, #tanggal_mulai, #tanggal_selesai, #kuota_murid, #select, #keterangan').each(function(){
        if($(this).val() == ''){
          submit = false;
        }
      });

      if(submit == true){
        $.ajax({
          url: link,
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Pendataran baru berhasil di${save_method}`, 'Success');
              $('#modal-pendaftaran').modal('hide');
              load_pendaftaran();
            } else {
              toastr.error(`Pendaftaran baru gagal di${save_method}`, 'Error');
            }
          }
        });

      } else {
        toastr.warning(`Field tidak boleh kosong`, 'Warning');
      }

      return false;
    });

  });
</script>
