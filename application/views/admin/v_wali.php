<div class="row">
  <div class="col-md-12">
    <div class="card animated fadeInRight">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4">
            <div class="input-group no-border">
              <input type="text" class="form-control" placeholder="Cari Nama Wali..." id="cari-wali">
              <div class="input-group-append">
                <div class="input-group-text">
                  <i class="nc-icon nc-zoom-split"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body ">
        <div class="table-responsive">
          <table class="table table-hover table-striped" id="table-wali">
            <thead class="text-primary">
              <tr>
                <th>#</th>
                <th>ID Wali</th>
                <th>Nama Wali</th>
                <th>No KTP</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Alamat</th>
                <th>Tanggal Registasi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    function load_wali(cari)
    {
      $.ajax({
        url: '<?= base_url().'admin/json_wali' ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {cari: cari},
        success: function(data){
          var html = '';
          var no = 0;

          $.each(data.wali, function(k,v){
            no++
            html += `<tr>`;
            html += `<td>${no}</td>`;
            html += `<td>${v.id_wali}</td>`;
            html += `<td>${v.nama_wali}</td>`;
            html += `<td>${v.no_ktp}</td>`;
            html += `<td>${v.email}</td>`;
            html += `<td>${v.telepon}</td>`;
            html += `<td>${v.alamat}</td>`;
            html += `<td>${v.tgl_registrasi}</td>`;
            html += `</tr>`;
          });

          $('#table-wali tbody').html(html);
        }
      });
    }

    load_wali();

    $('#cari-wali').on('keyup', function(){
      if($(this).val() == ''){
        load_wali();
      } else {
        cari = $(this).val();
        load_wali(cari);
      }
    });

  });
</script>
