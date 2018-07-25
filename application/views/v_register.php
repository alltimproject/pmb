<div class="wrapper">
        <div class="page-header" style="background-image: url('<?= base_url().'images/PAUD.jpg' ?>');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="card card-register animated bounceInUp">
                                <h3 class="title">Daftar Akun</h3>
                                <form class="register-form" id="form-daftar">
                                    <label>Nama</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-circle-10"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Nama Wali" id="nama_wali" name="nama_wali">
                                    </div>

                                    <label>No KTP</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-paper"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="No KTP" id="no_ktp" name="no_ktp">
                                    </div>

                                    <label>Email</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                        <input type="email" class="form-control form-control-danger" placeholder="Email" id="email" name="email">
                                    </div>

                                    <label>Password</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-key-25"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    </div>

                                    <label>Telepon</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-tablet-2"></i>
                                        </span>
                                        <input type="number" class="form-control" placeholder="No Telepon" id="telepon" name="telepon">
                                    </div>

                                    <label>Alamat</label>
                                    <div class="input-group form-group-no-border">
                                        <textarea rows="8" cols="80" class="form-control" id="alamat" name="alamat"></textarea>
                                    </div>
                                    <button class="btn btn-danger btn-block btn-round">Daftar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="footer register-footer text-center" style="margin-top: 0px;">
          						<h6>Sudah punya akun? <a href="#login" class="btn btn-outline-danger btn-round">Login</a></h6>
          					</div><br><br>
                </div>
            </div>
        </div>

    <script type="text/javascript">
      $(document).ready(function(){

        $('#form-daftar').on('submit', function(){
          var submit = true;

          $(this).find('#nama_wali, #no_ktp, #email, #password, #telepon, #alamat').each(function(){
            if($(this).val() == ''){
              submit = false;
            }
          });

          if(submit == true)
          {
            $.ajax({
              url: '<?= base_url().'auth/registrasi' ?>',
              type: 'POST',
              data: $(this).serialize(),
              success: function(data){
                if(data == 'berhasil'){
                  $('#form-daftar')[0].reset();
                  toastr.success('Berhasil Registrasi', 'Success');
                } else {
                  toastr.error('Email sudah terdaftar, Silahkan gunakan email lain', 'Error');
                }
              }
            });
          } else {
            toastr.warning('Silahkan isi field dengan lengkap', 'Warning');
          }
          return false;
        });
      });
    </script>
