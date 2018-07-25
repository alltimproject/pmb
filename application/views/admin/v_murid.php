
<div class="row">
  <div class="col-md-12">
    <div class="card animated fadeInRight">
      <div class="card-header">
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4">
            <div class="input-group no-border">
              <input type="text" class="form-control" placeholder="Cari Nama Murid..." id="cari-murid">
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
          <table class="table table-hover table-striped" id="table-murid">
            <thead class="text-primary">
              <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>TTL</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
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

    function load_murid(cari)
    {
      $.ajax({
        url: '<?= base_url().'admin/json_murid' ?>',
        type: 'POST',
        dataType: 'JSON',
        data: {cari: cari},
        success: function(data){
          var html = '';
          var no = 0;

          $.each(data.murid, function(k,v){
            no++
            html += `<tr>`;
            html += `<td>${no}</td>`;
            html += `<td>${v.nim}</td>`;
            html += `<td>${v.nama_murid}</td>`;
            html += `<td>${v.tempat_lahir_murid}, ${v.tgl_lahir_murid}</td>`;
            html += `<td>${v.jenis_kelamin}</td>`;
            html += `<td>${v.nama_kelas}</td>`;
            html += `</tr>`;
          });

          $('#table-murid tbody').html(html);
        }
      });
    }

    load_murid();

    $('#cari-murid').on('keyup', function(){
      if($(this).val() == ''){
        load_murid();
      } else {
        cari = $(this).val();
        load_murid(cari);
      }
    });
  });
</script>
