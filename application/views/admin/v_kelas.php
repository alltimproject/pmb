<div class="row">
  <div class="col-md-12">
    <div class="card animated fadeInRight">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4">
            <div class="input-group no-border">
              <input type="text" class="form-control" placeholder="Cari Kode Kelas..." id="cari-kelas">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="nc-icon nc-zoom-split"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-striped" id="table-kelas">
            <thead class="text-primary">
              <tr>
                <th>#</th>
                <th>ID Kelas</th>
                <th>Nama Kelas</th>
                <th>Keterangan</th>
                <th><button type="button" class="btn btn-sm btn-outline-primary btn-round btn-icon" id="add-kelas"> + </button></th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

  <div class="modal fade" id="modal-kelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-kelas">
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="hidden" name="id_kelas" id="id_kelas">
                  <input type="text" name="nama_kelas" class="form-control" id="nama_kelas">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <textarea name="keterangan_waktu" id="keterangan_waktu" class="form-control"></textarea>
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

    function load_kelas(cari)
    {
      $.ajax({
        url: '<?= base_url().'admin/json_kelas' ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {cari: cari},
        success: function(data){
          var html = '';
          var no = 0;

          $.each(data.kelas, function(k,v){
            no++
            html += `<tr>`;
            html += `<td>${no}</td>`;
            html += `<td>${v.id_kelas}</td>`;
            html += `<td>${v.nama_kelas}</td>`;
            html += `<td>${v.keterangan_waktu}</td>`;
            html += `<td><button type="button" class="btn btn-sm btn-outline-success btn-round btn-icon" id="edit-kelas"  data-id_kelas="${v.id_kelas}" data-nama_kelas="${v.nama_kelas}" data-keterangan="${v.keterangan_waktu}"><i class="fa fa-pencil"></i></button></td>`;
            html += `</tr>`;
          });

          $('#table-kelas tbody').html(html);
        }
      });
    }

    load_kelas();

    $('#cari-kelas').on('keyup', function(){
      if($(this).val() == ''){
        load_kelas();
      } else {
        var cari = $(this).val();
        load_kelas(cari);
      }
    });

    $('#add-kelas').on('click', function(){
      save_method = 'simpan';

      $('.form-kelas')[0].reset();
      $('#modal-kelas .modal-title').text('Tambah Kelas');
      $('#modal-kelas #submit').text('Simpan');
      $('#modal-kelas').modal('show');

      // alert('Success');
    });

    $(document).on('click', '#edit-kelas', function(){
      save_method = 'update';

      $('#id_kelas').val($(this).data('id_kelas'));
      $('#nama_kelas').val($(this).data('nama_kelas'));
      $('#keterangan_waktu').val($(this).data('keterangan'));

      $('#modal-kelas .modal-title').text('Update Kelas');
      $('#modal-kelas #submit').text('Update');
      $('#modal-kelas').modal('show');
    });

    $('.form-kelas').on('submit', function(){
      var submit = true;

      if(save_method == 'simpan'){
        var link = '<?= base_url().'admin/add_kelas' ?>';
      } else {
        var link = '<?= base_url().'admin/update_kelas' ?>';
      }

      $(this).find('#nama_kelas, #keterangan_waktu').each(function(){
        if($(this).val() == ''){
          submit = false;
        }
      });

      if(submit == true)
      {
        $.ajax({
          url: link,
          type: 'POST',
          data: $(this).serialize(),
          success: function(data){
            if(data == 'berhasil'){
              toastr.success(`Kelas berhasil di${save_method}`, 'Success');
              load_kelas();
              $('#modal-kelas').modal('hide');
            } else {
              toastr.error(`Kelas tidak berhasil di${save_method}`, 'Error');
            }
          }
        });
      } else {
        toastr.warning('Field tidak boleh kosong', 'Warning');
      }

      return false;
    });
  });
</script>
