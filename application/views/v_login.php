<div class="wrapper">
        <div class="page-header" style="background-image: url('<?= base_url().'images/w-login.png' ?>');">
            <div class="filter"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 ml-auto mr-auto">
                            <div class="card card-register animated bounceIn">
                                <h3 class="title">Login Akun</h3>
                                <form class="register-form" id="form-login">
                                    <label>Email</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-email-85"></i>
                                        </span>
                                        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                                    </div>

                                    <label>Password</label>
                                    <div class="input-group form-group-no-border">
                                        <span class="input-group-addon">
                                            <i class="nc-icon nc-key-25"></i>
                                        </span>
                                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                                    </div>
                                    <button class="btn btn-danger btn-block btn-round">Login</button>
                                </form>
                                <div class="forgot">
                                  <div class="form-group">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" id="show">
                                            Show Password
                                            <span class="form-check-sign"></span>
                                        </label>
                                    </div>
                                  </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer register-footer text-center" style="margin-top: 0px;">
          						<h6>Belum punya akun? <a href="#register" class="btn btn-outline-danger btn-round">Daftar</a></h6>
          					</div><br><br>
                </div>
        </div>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){

        $('#show').click(function(){
          if($(this).is(':checked'))
          {
            $('#password').attr('type', 'text');
          } else {
            $('#password').attr('type', 'password');
          }
        });

        $('#form-login').on('submit', function(){
          var submit = true;

          $(this).find('#email, #password').each(function(){
            if($(this).val() == ''){
              submit = false;
            }
          });

          if(submit == true)
          {
            $.ajax({
              url: '<?= base_url().'auth/login_akun' ?>',
              type: 'POST',
              data: $(this).serialize(),
              success: function(data){
                if(data == 'berhasil'){
                  window.location = '<?= base_url().'akun/' ?>';
                } else {
                  toastr.error('Username atau Password salah', 'Error');
                }
              }
            });
          } else {
            toastr.warning('Silahkan isi Username atau Password', 'Warning');
          }

          return false;
        });
      });
    </script>
