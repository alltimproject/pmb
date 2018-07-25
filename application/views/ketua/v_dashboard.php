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

<div class="row" id="content-tahun"></div>

<script type="text/javascript">
$(document).ready(function(){

    function load_tahun()
    {
      $.ajax({
        url: '<?= base_url().'ketua/json_tahun' ?>',
        type: 'POST',
        dataType: 'JSON',
        success: function(data){
          var html = '';

          $.each(data.tahun, function(k, v){
            html += '<div class="col-lg-6 col-md-6 col-sm-6">';
              html += '<div class="card card-stats animated flipInX">';
                html += '<div class="card-body">';
                  html += '<div class="row">';
                    html += '<div class="col-3 col-md-2">';
                      html += '<div class="icon-big text-center icon-default">';
                        html += '<i class="nc-icon nc-paper text-default"></i>';
                      html += '</div>';
                    html += '</div>';
                    html += '<div class="col-9 col-md-10">';
                      html += '<div class="numbers">';
                        html += '<p class="card-category">Tahun Ajaran</p>';
                        html += '<p class="card-title">'+v.tahun_awal+' - '+v.tahun_akhir+'</p>';
                      html += '</div>';
                    html += '</div>';
                  html += '</div>';
                html += '</div>';
                html += '<div class="card-footer ">';
                  html += '<hr>';
                  html += '<div class="stats">';
                    html += '<a href="#detail/'+v.id_tahun_ajar+'" class="text-default"><i class="fa fa-eye"></i> View Detail</a>';
                  html += '</div>';
                html += '</div>';
              html += '</div>';
            html += '</div>';
          });

          $('#content-tahun').html(html);
        }
      });
    }

    load_tahun();
});
</script>
